<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Footer extends Model
{
    protected $table = 'footers';
    protected $fillable = ['image_path', 'content', 'copyright', 'is_active'];

    protected $casts = [
        'image_path' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($footer) {
            if ($footer->isDirty('image_path') && $footer->getOriginal('image_path')) {
                Storage::disk('public')->delete($footer->getOriginal('image_path'));
            }
        });

        static::deleting(function ($footer) {
            Storage::disk('public')->delete($footer->image_path);
        });
    }
}
