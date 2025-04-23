<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Story extends Model
{
    protected $table = 'stories';

    protected $fillable = [
        'is_active',
        'title',
        'image_path',
        'content',
    ];

    protected $casts = [
        'image_path' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($story) {
            if ($story->isDirty('image_path') && $story->getOriginal('image_path')) {
                Storage::disk('public')->delete($story->getOriginal('image_path'));
            }
        });

        static::deleting(function ($story) {
            Storage::disk('public')->delete($story->image_path);
        });
    }
}