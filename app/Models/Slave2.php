<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slave2 extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi
    protected $fillable = ['waktu', 'value', 'status'];

    // Tentukan relasi polymorphic ke slave_packet_losses
    public function slavePacketLosses()
    {
        return $this->morphMany(SlavePacketLoss::class, 'slave');
    }

    // Tentukan relasi polymorphic ke slave_delays
    public function slaveDelays()
    {
        return $this->morphMany(SlaveDelay::class, 'slave');
    }
}
