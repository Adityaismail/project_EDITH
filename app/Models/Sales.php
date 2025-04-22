<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sales extends Model
{
    protected $fillable = [
        'is_active',
        'slider_id',
        'nama',
        'image_path',
    ];

    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }

    protected $casts = [
        'image_path' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($sale) {
            if ($sale->isDirty('image_path') && $sale->getOriginal('image_path')) {
                Storage::disk('public')->delete($sale->getOriginal('image_path'));
            }
        });

        static::deleting(function ($sale) {
            Storage::disk('public')->delete($sale->image_path);
        });
    }
}
