<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
    
    protected $casts = [
        'brand_images' => 'array',
    ];
}
