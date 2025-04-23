<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komitmen extends Model
{
    protected $table = 'komitmens';

    protected $fillable = [
        'title',
        'content',
        'is_active',
    ];
}
