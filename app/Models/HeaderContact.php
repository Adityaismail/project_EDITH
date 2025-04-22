<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderContact extends Model
{
    protected $table = 'header_contacts';

    protected $fillable = [
        'is_active',
        'header',
        'subheader',
    ];
}
