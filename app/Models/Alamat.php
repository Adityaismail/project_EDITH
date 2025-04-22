<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Alamat extends Model
{
    protected $table = 'alamats';

    protected $fillable = [
        'is_active',
        'user_id',
        'image_path',
        'nama_perusahaan',
        'email',
        'telepon',
        'alamat',
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

        static::updating(function ($alamat) {
            if ($alamat->isDirty('image_path') && $alamat->getOriginal('image_path')) {
                Storage::disk('public')->delete($alamat->getOriginal('image_path'));
            }
        });

        static::deleting(function ($alamat) {
            Storage::disk('public')->delete($alamat->image_path);
        });
    }
}