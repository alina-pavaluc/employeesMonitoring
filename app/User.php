<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];

    public function scopeEmployee($query)
    {
        return $query->where('user_type', UserType::EMPLOYEE);
    }

    public function scopeEmployer($query)
    {
        return $query->where('user_type', UserType::EMPLOYER);
    }

    public function isEmployee()
    {
        return $this->user_type === UserType::EMPLOYEE;
    }


    public function isEmployer()
    {
        return $this->user_type === UserType::EMPLOYER;
    }

}
