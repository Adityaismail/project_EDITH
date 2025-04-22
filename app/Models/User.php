<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'role',
        'avatar_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@gmail.com') && $this->hasVerifiedEmail();
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return Storage::url($this->avatar_url);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($user) {
            // Jika avatar berubah dan ada avatar lama
            if ($user->isDirty('avatar_url') && $user->getOriginal('avatar_url')) {
                // Hapus file avatar lama
                Storage::disk('public')->delete($user->getOriginal('avatar_url'));
            }
        });

        static::deleting(function ($user) {
            // Hapus file avatar ketika user dihapus
            if ($user->avatar_url) {
                Storage::disk('public')->delete($user->avatar_url);
            }
        });
    }

}
