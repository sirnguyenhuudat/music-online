<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'birthday',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tracks()
    {
        return $this->hasMany('App\Models\Track');
    }

    public function playlists()
    {
        return $this->hasMany('App\Models\Playlist');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_users', 'user_id', 'role_id')->withTimestamps();
    }

    //    /**
//     * @param string|array $roles
//     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, config('error.401'));
        }
        return $this->hasRole($roles) ||
            abort(401, config('error.401'));
    }

//    /**
//     * Check multiple roles
//     * @param array $roles
//     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('slug', $roles)->first();
    }

//    /**
//     * Check one role
//     * @param string $role
//     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('slug', $role)->first();
    }

//    /**
//     * Check one role
//     * @param string $role
//     * use in view
//     */
    public function isAdmin()
    {
        return $this->hasRole('admin') || false;
    }
}
