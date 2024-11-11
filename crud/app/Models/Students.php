<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    public $table = "students";
    public $fillable = [
        'fullName',
        'email',
        'password',
        'date_of_birth',
        'courses',
        'gender',
        'subjects'
    ];
}
