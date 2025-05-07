<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlavePacketLoss extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika diperlukan
    protected $table = 'slave_packet_losses';

    // Tentukan kolom-kolom yang bisa diisi
    protected $fillable = ['slave_id', 'slave_type', 'topic', 'packet_loss_percentage', 'total_packets', 'lost_packets', 'sequence_number', 'sent_at', 'received_at', 'packet_loss'];

    // Tentukan relasi polymorphic ke slave1 atau slave2
    public function slave()
    {
        return $this->morphTo('slave', 'slave_type', 'slave_id');  // Relasi polymorphic ke Slave1 atau Slave2
    }
}
