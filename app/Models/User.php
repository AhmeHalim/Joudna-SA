<?php

namespace app\Models;

use app\Factories\MessageSender\MessageSenderFactory;
use app\Helper\WebsiteHelper;
use app\Models\Dashboard\Setting\WebsiteDesign;
use app\Traits\HandlesTranslationsAndMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HandlesTranslationsAndMedia, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    use HasRoles;

    const JOBRoles = [
        // super admin will not render value is empty
        'super_admin' => 'super_admin',
        'admin' => 'admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = ['password', 'remember_token'];

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

    public function getNameAttribute(): string
    {
        return $this->f_name . ' ' . $this->l_name;
    }
    public function getUserImageAttribute()
    {
        if ($this->image) {
            return asset('uploads/users/' . $this->image);
        }
        $website = WebsiteDesign::where('name', 'Ipa')->where('is_active', 1)->first();
        if (isset($website)) {
            return WebsiteHelper::getAsset('img/user/default.jpeg');
        } else {
            // If no custom image, return gender-based default avatar
            if ($this->gender === 'male') {
                return WebsiteHelper::getAsset('img/user/male.jpeg');
            } elseif ($this->gender === 'female') {
                return WebsiteHelper::getAsset('img/user/female.jpeg');
            }
        }
        // Fallback generic avatar
        return WebsiteHelper::getAsset('img/user/male.jpeg');
    }

    public function isSuperAdmin(): bool
    {
        return $this->job_role === 'super_admin';
    }

    public function isAdmin(): bool
    {
        return $this->is_admin === 1;
    }
}
