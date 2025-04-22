<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $fillable = [
        'is_active',
        'information',
        'image_path',
        'location',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'image_path' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($gallery) {
            if ($gallery->isDirty('image_path') && $gallery->getOriginal('image_path')) {
                Storage::disk('public')->delete($gallery->getOriginal('image_path'));
            }
        });

        static::deleting(function ($gallery) {
            Storage::disk('public')->delete($gallery->image_path);
        });
    }
}
