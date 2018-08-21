<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role','role_id','id');
    }

    public function photo(){
        return $this->belongsTo('App\Photo','photo_id','id');
    }

    public function isAdmin(){
               if($this->role->name == 'administrator' && $this->is_active == 1){
                    return true;
        }
        return false;
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function getGravatarAttribute(){
        $hash = md5(strtolower(trim($this->attribute['email'])))."?d=mm";
        return "http://www.gravatar.com/$hash";
    }
}
