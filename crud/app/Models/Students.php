<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Students extends Authenticatable
{
    public $table = "students";
    public $fillable = [
        'fullName',
        'email',
        'password',
        'date_of_birth',
        'courses',
        'gender',
        'subjects',
        'profile'
    ];
    protected function casts() : array
    {
        return [
            'password' => 'hashed'
        ];
    }
}
