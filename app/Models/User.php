<?php

namespace App\Models;

use App\Models\Traits\HasProfilePhoto;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable implements HasMedia
{
    use HasMediaTrait;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'full_name', 'role_name', 'profile_photo_url'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'active',
        'address',
        'industry_id',
        'profession_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getRoleNameAttribute()
    {
        if ($this->roles()->exists())
            return $this->roles()->first()->name;
        else
            return 0;
    }
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function industries()
    {
         return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function professions()
    {
         return $this->belongsTo(Profession::class, 'profession_id');
    }
    public function invitation()
    {
        return $this->hasMany(Invitation::class);
    }
    public function inviter()
    {
        return $this->hasMany(Invitation::class);
    }
}
