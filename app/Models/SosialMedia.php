<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SosialMedia extends Model
{
    protected $guarded = [];

    protected $casts = [
        'image_path' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($sosialMedia) {
            if ($sosialMedia->isDirty('image_path') && $sosialMedia->getOriginal('image_path')) {
                Storage::disk('public')->delete($sosialMedia->getOriginal('image_path'));
            }
        });

        static::deleting(function ($sosialMedia) {
            Storage::disk('public')->delete($sosialMedia->image_path);
        });
    }
}
