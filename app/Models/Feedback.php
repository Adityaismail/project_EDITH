<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Feedback extends Model
{
    protected $table = 'feedback';
    protected $fillable = [
        'is_active',
        'nama',
        'email',
        'phone',
        'message',
        'rating',
        'image_path',
    ];

    protected $casts = [
        'image_path' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($feedback) {
            if ($feedback->isDirty('image_path') && $feedback->getOriginal('image_path')) {
                Storage::disk('public')->delete($feedback->getOriginal('image_path'));
            }
        });

        static::deleting(function ($feedback) {
            Storage::disk('public')->delete($feedback->image_path);
        });
    }
}
