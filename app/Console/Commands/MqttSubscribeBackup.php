<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Bluerhinos\phpMQTT;
use App\Models\Slave1;
use App\Models\Slave2;
use App\Models\SlaveDelay;
use App\Models\SlavePacketLoss;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class MqttSubscribe extends Command
{
    protected $signature = 'mqtt:subscribe';
    protected $description = 'Subscribe to MQTT Broker';

    protected $lux1 = null;
    protected $status1 = null;

    protected $lux2 = null;
    protected $status2 = null;

    public function handle()
    {
        $server = "192.168.255.15"; // Ganti sesuai IP broker
        $port = 1883;
        $client_id = "Laravel_Subscriber_" . uniqid();

        while (true) {
            $mqtt = new phpMQTT($server, $port, $client_id);

            if (!$mqtt->connect()) {
                $this->error("❌ Gagal terhubung ke MQTT Broker! Coba lagi dalam 5 detik...");
                Log::warning("MQTT: Gagal terhubung ke broker.");
                sleep(5);
                continue;
            }

            $this->info("✅ Terhubung ke MQTT Broker!");
            Log::info("MQTT: Berhasil terhubung ke broker.");

            $topics = [
                "sensor/slave1/lux" => ["qos" => 0, "function" => [$this, "saveLux1"]],
                "sensor/slave1/status" => ["qos" => 0, "function" => [$this, "saveStatus1"]],
                "sensor/slave2/lux" => ["qos" => 0, "function" => [$this, "saveLux2"]],
                "sensor/slave2/status" => ["qos" => 0, "function" => [$this, "saveStatus2"]],
            ];

            $mqtt->subscribe($topics, 0);

            while ($mqtt->proc()) {
                usleep(100000); // 100ms
            }

            $this->warn("⚠️ MQTT Terputus! Reconnecting dalam 2 detik...");
            Log::warning("MQTT: Koneksi terputus. Mencoba reconnect...");
            $mqtt->close();
            sleep(2);
        }
    }

    public function saveLux1($topic, $msg)
    {
        $data = json_decode($msg, true);

        if (json_last_error() !== JSON_ERROR_NONE || !isset($data['lux'])) {
            $this->error("❌ Gagal decode JSON atau 'lux' tidak ditemukan: $msg");
            return;
        }

        $this->lux1 = floatval($data['lux']);
        $this->info("📥 Slave1 Lux: {$this->lux1}");

        $this->processDelayAndPacketLoss($topic, $data, 1); // Process delay and packet loss for Slave1
        $this->insertIfReady1();
    }

    public function saveStatus1($topic, $msg)
    {
        $this->status1 = trim($msg);
        $this->info("📥 Slave1 Status: {$this->status1}");

        $this->insertIfReady1();
    }

    public function insertIfReady1()
    {
        if (!is_null($this->lux1) && !is_null($this->status1)) {
            Slave1::create([
                'waktu' => Carbon::now(),
                'value' => $this->lux1,
                'status' => $this->status1,
            ]);

            $this->info("✅ Slave1 Tersimpan: {$this->lux1}, {$this->status1}");

            $this->lux1 = null;
            $this->status1 = null;
        }
    }

    public function saveLux2($topic, $msg)
    {
        $data = json_decode($msg, true);

        if (json_last_error() !== JSON_ERROR_NONE || !isset($data['lux'])) {
            $this->error("❌ Gagal decode JSON atau 'lux' tidak ditemukan: $msg");
            return;
        }

        $this->lux2 = floatval($data['lux']);
        $this->info("📥 Slave2 Lux: {$this->lux2}");

        $this->processDelayAndPacketLoss($topic, $data, 2); // Process delay and packet loss for Slave2
        $this->insertIfReady2();
    }

    public function saveStatus2($topic, $msg)
    {
        $this->status2 = trim($msg);
        $this->info("📥 Slave2 Status: {$this->status2}");

        $this->insertIfReady2();
    }

    public function insertIfReady2()
    {
        if (!is_null($this->lux2) && !is_null($this->status2)) {
            Slave2::create([
                'waktu' => Carbon::now(),
                'value' => $this->lux2,
                'status' => $this->status2,
            ]);

            $this->info("✅ Slave2 Tersimpan: {$this->lux2}, {$this->status2}");

            $this->lux2 = null;
            $this->status2 = null;
        }
    }

    public function processDelayAndPacketLoss($topic, $data, $slaveId)
    {
        // Mengambil sent_at dari data, jika ada
        $sent_at = isset($data['timestamp']) ? Carbon::createFromTimestamp($data['timestamp']) : null;

        // Mendefinisikan received_at
        $received_at = Carbon::now(); // Mendapatkan waktu saat data diterima

        // Cek apakah sent_at ada
        if ($sent_at) {
            // Menghitung delay hanya jika sent_at ada
            $delay = $received_at->diffInMilliseconds($sent_at);
            $this->info("📥 Delay untuk Slave{$slaveId}: {$delay} ms");

            // Simpan delay ke database
            SlaveDelay::create([
                'slave_id' => $slaveId,
                'slave_type' => 'slave' . $slaveId,
                'topic' => $topic,
                'delay' => $delay,
                'sent_at' => $sent_at,
                'received_at' => $received_at,
            ]);

            // Menghitung packet loss jika sent_at ada (asumsi tidak ada packet loss jika data diterima dengan sent_at)
            $packetLossPercentage = 0;  // Tidak ada packet loss jika sent_at ada
            $this->info("📥 Packet Loss untuk Slave{$slaveId}: {$packetLossPercentage}%");
        } else {
            // Jika sent_at tidak ada, beri nilai NULL atau 0 untuk delay
            $this->warn("⚠️ Tidak ada informasi waktu pengiriman (sent_at) di data!");

            // Simpan nilai default untuk delay
            SlaveDelay::create([
                'slave_id' => $slaveId,
                'slave_type' => 'slave' . $slaveId,
                'topic' => $topic,
                'delay' => 0,  // Menggunakan nilai default untuk delay
                'sent_at' => null,
                'received_at' => $received_at,
            ]);

            // Jika tidak ada sent_at, anggap ada packet loss
            $packetLossPercentage = 100; // Anggap terjadi packet loss jika sent_at tidak ada
            $this->info("📥 Packet Loss untuk Slave{$slaveId}: {$packetLossPercentage}%");
        }

        // Simpan packet loss ke database
        SlavePacketLoss::create([
            'slave_id' => $slaveId,
            'slave_type' => 'slave' . $slaveId,
            'topic' => $topic,
            'packet_loss_percentage' => $packetLossPercentage,
            'total_packets' => 1,  // Anda dapat mengganti dengan logika yang sesuai untuk total packets
            'lost_packets' => ($packetLossPercentage == 100) ? 1 : 0,
            'sequence_number' => 1,  // Anda dapat mengganti dengan logika yang sesuai untuk sequence number
            'sent_at' => $sent_at,
            'received_at' => $received_at,
        ]);
    }
}
