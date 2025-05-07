<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlaveDelaysTable extends Migration
{
    public function up()
    {
        Schema::create('slave_delays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slave_id');  // ID slave yang menerima data
            $table->enum('slave_type', ['slave1', 'slave2'])->default('slave1'); // Kolom slave_type dengan enum
            $table->string('topic');       // Topik data (misal: sensor/slave1/lux)
            $table->integer('delay');      // Delay dalam milidetik (ms)
            $table->timestamp('sent_at')->nullable();  // Waktu pengiriman data (publisher)
            $table->timestamp('received_at')->nullable();  // Waktu penerimaan data (subscriber)
            $table->timestamps();  // Waktu pencatatan data
        });
    }

    public function down()
    {
        Schema::dropIfExists('slave_delays');
    }
}
