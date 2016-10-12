<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $table = 'db_users';
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
    'user_name', 'email', 'password',
    ];
    
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [ 'password', 'remember_token',];
    
    public function setPasswordAttribute($value) {
        // $this->attributes['title'] = Hash::make($value);
        $this->attributes['password'] = bcrypt($value);
    }
    
    public function Roles() {
        $results = $this->belongsToMany('App\Http\Model\Roles', 'db_role_user', 'user_id', 'role_id');
        return $results;
    }
}