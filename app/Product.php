<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Table name
    protected $table = 'products';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
    //item-image
    protected $casts = [
        'product_images' => 'array',
    ];
}
