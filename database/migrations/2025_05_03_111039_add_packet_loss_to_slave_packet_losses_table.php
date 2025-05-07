<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPacketLossToSlavePacketLossesTable extends Migration
{
    public function up()
    {
        Schema::table('slave_packet_losses', function (Blueprint $table) {
            // Menambahkan kolom packet_loss
            $table->boolean('packet_loss')->default(0);  // 0 = tidak ada packet loss, 1 = ada packet loss
        });
    }

    public function down()
    {
        Schema::table('slave_packet_losses', function (Blueprint $table) {
            // Menghapus kolom packet_loss jika migration dibatalkan
            $table->dropColumn('packet_loss');
        });
    }
}
