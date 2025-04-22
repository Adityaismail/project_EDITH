<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operasional extends Model
{
    protected $table = 'operasionals';

    protected $fillable = [
        'is_active',
        'alamat_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'deskripsi',
    ];

    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }
}