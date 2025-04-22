<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukUrl extends Model
{
    protected $table = 'produk_urls';
    
    protected $fillable = [
        'produk_id',
        'name',
        'url',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
