<?php

namespace App;
use Illuminate\Foundation\Auth\User;

class Users extends User
{
    protected $table = 'users';
    protected $guarded = [];
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
