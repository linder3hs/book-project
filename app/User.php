<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'last_name','nacionalidad', 'avatar','email', 'password', 'facebook_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot() {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($user) {
            $user->token = str_random(40);
        });
    }

    public function hasVerified() {
        $this->verified = true;
        $this->token = null;

        $this->save();
    }

    public function isAdmin() {
        return $this->admin();
    }
    
    public function scopeName($query, $name) {
        //dd('scope ' . $name);
        if (!empty($name)) {
            $query->where('name', $name)->orwhere('email', $name);
        }
    }

    
}
