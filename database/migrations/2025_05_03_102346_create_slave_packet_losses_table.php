<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlavePacketLossesTable extends Migration
{
    public function up()
    {
        Schema::create('slave_packet_losses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slave_id');  // ID slave yang menerima data
            $table->enum('slave_type', ['slave1', 'slave2'])->default('slave1'); // Kolom slave_type dengan enum
            $table->string('topic');       // Topik data (misal: sensor/slave1/lux)
            $table->decimal('packet_loss_percentage', 5, 2);  // Persentase packet loss
            $table->integer('total_packets');  // Total paket yang diterima
            $table->integer('lost_packets');  // Jumlah paket yang hilang
            $table->integer('sequence_number');  // Sequence number untuk tracking packet loss
            $table->timestamp('sent_at')->nullable();  // Waktu pengiriman data (publisher)
            $table->timestamp('received_at')->nullable();  // Waktu penerimaan data (subscriber)
            $table->timestamps();  // Waktu pencatatan data
        });
    }

    public function down()
    {
        Schema::dropIfExists('slave_packet_losses');
    }
}
