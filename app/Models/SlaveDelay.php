<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlaveDelay extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika diperlukan
    protected $table = 'slave_delays';

    // Tentukan kolom-kolom yang bisa diisi
    protected $fillable = ['slave_id', 'slave_type', 'topic', 'delay', 'sent_at', 'received_at'];

    // Tentukan relasi polymorphic ke slave1 atau slave2
    public function slave()
    {
        return $this->morphTo('slave', 'slave_type', 'slave_id');  // Relasi polymorphic ke Slave1 atau Slave2
    }
}
