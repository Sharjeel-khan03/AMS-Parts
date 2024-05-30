<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'user_name',
        'contact',
        'address',
        'country',
        'city',
        'state',
        'zipcode',
        'role_id',
        'file',
        'status',
        'last_login_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // public function organization()
    // {
    //     return $this->belongsToMany(Organization::class, 'organization_users', 'user_id', 'organization_id');
    // }

    // public function organizationUsers()
    // {
    //     return $this->hasMany(OrganizationUser::class);
    // }

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class, 'organization_users', 'user_id', 'category_id');
    // }

    public function organizationUsers()
    {
        return $this->hasMany(OrganizationUser::class);
    }
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

}
