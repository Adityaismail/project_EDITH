<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class OwnerContent extends Model
{
    protected $table = 'owner_contents';

    protected $fillable = [
        'is_active',
        'image_path',
        'name',
        'content',
    ];

    protected $casts = [
        'image_path' => 'array',
    ];
    
    protected static function boot()
    {
        parent::boot();

        static::updating(function ($ownerContent) {
            if ($ownerContent->isDirty('image_path') && $ownerContent->getOriginal('image_path')) {
                Storage::disk('public')->delete($ownerContent->getOriginal('image_path'));
            }
        });

        static::deleting(function ($ownerContent) {
            Storage::disk('public')->delete($ownerContent->image_path);
        });
    }
}
