<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderTentangKami extends Model
{
    protected $table = 'header_tentang_kamis';

    protected $fillable = [
        'is_active',
        'header',
        'subheader',
    ];
}
