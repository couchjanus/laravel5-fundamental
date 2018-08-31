<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\VerificationToken;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = [
        'deleted_at',
    ];

    /**
     * User Profile Relationships.
     *
     * @var array
     */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    /**
     * User Profile Setup - 
     * SHould move these to a trait or interface
     * 
     * @var array
    */
    
    // public function profiles()
    // {
    //     return $this->belongsToMany('App\Profile')->withTimestamps();
    // }

    // public function hasProfile($name)
    // {
    //     foreach ($this->profiles as $profile) {
    //         if ($profile->name == $name) {
    //             return true;
    //         }
    //     }

    //     return false;

    // }

    // public function assignProfile($profile)
    // {
    //     return $this->profiles()->attach($profile);
    // }

    // public function removeProfile($profile)
    // {
    //     return $this->profiles()->detach($profile);
    // }

    public function verificationToken()
    {
        return $this->hasOne(VerificationToken::class);
    }

    public function hasVerifiedEmail()
    {
        return $this->verified;
    }

    public static function byEmail($email)
    {
        return static::where('email', $email);
    }

    /**
     * Build Social Relationships.
     *
     * @var array
     */
    public function social()
    {
        return $this->hasMany('App\Social');
    }

}
