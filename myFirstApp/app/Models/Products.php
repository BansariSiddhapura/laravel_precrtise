<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $table = 'products';

    public $fillable = [
        'productId',
        'productName',
        'customerName'
    ];
}
