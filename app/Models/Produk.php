<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produk extends Model
{
    protected $table = 'produks';
    protected $fillable = [
        'kategori_id',
        'is_active',
        'nama',
        'image_path',
        'harga',
        'deskripsi',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function produk_urls()
    {
        return $this->hasMany(ProdukUrl::class);
    }

    protected $casts = [
        'image_path' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($produk) {
            if ($produk->isDirty('image_path') && $produk->getOriginal('image_path')) {
                Storage::disk('public')->delete($produk->getOriginal('image_path'));
            }
        });

        static::deleting(function ($produk) {
            Storage::disk('public')->delete($produk->image_path);
        });
    }
}
