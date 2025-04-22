<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderGallery extends Model
{
    protected $table = 'header_galleries';

    protected $fillable = [
        'is_active',
        'header',
        'subheader',
    ];
}
