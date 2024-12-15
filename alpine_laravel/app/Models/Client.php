<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    public $table='reg';

    protected $fillable=[
        'id','Name','Email','Mno','City'
    ];

    public $timestamps=false;
}