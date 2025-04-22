<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Promotion extends Model
{
    protected $fillable = [
        'is_active',
        'judul',
        'subjudul',
        'image_path',
    ];

    protected $casts = [
        'image_path' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($promotion) {
            if ($promotion->isDirty('image_path') && $promotion->getOriginal('image_path')) {
                Storage::disk('public')->delete($promotion->getOriginal('image_path'));
            }
        });

        static::deleting(function ($promotion) {
            Storage::disk('public')->delete($promotion->image_path);
        });
    }
}
