<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Models\Review', 'likes');
    }

    public function alreadyliked($review)
    {
        return $this->likes()->whereReview_id($review)->exists();
    }

    public function places()
    {
        return $this->hasMany('App\Models\Place');
    }

    public function bookmarks()
    {
        return $this->belongsToMany('App\Models\Place', 'bookmarks');
    }

    public function alreadyBookmarked($place)
    {
        return $this->bookmarks()->wherePlace_id($place)->exists();
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function hasRole($role)
    {
        return $this->role()->whereName($role)->first() ? true : false;
    }

}
