<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Slider extends Model
{
    protected $fillable = [
        'is_active',
        'crumb',
        'judul',
        'subjudul',
        'nama_produk',
        'image_path',
    ];

    public function sales()
    {
        return $this->hasMany(Sales::class);
    }

    protected $casts = [
        'image_path' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($slider) {
            if ($slider->isDirty('image_path') && $slider->getOriginal('image_path')) {
                Storage::disk('public')->delete($slider->getOriginal('image_path'));
            }
        });

        static::deleting(function ($slider) {
            Storage::disk('public')->delete($slider->image_path);
        });
    }
}
