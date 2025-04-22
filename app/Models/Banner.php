<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'is_active',
        'text',
        'header',
        'subheader',
        'image_path',
    ];

    protected $casts = [
        'image_path' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($banner) {
            if ($banner->isDirty('image_path') && $banner->getOriginal('image_path')) {
                Storage::disk('public')->delete($banner->getOriginal('image_path'));
            }
        });

        static::deleting(function ($banner) {
            Storage::disk('public')->delete($banner->image_path);
        });
    }
}
