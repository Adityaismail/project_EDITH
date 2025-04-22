<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderProduk extends Model
{
    protected $table = 'header_produks';

    protected $fillable = [
        'is_active',
        'header',
        'subheader',
    ];
}
