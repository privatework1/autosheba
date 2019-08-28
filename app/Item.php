<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //Table name
    protected $table = 'items';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
    //item-image
    protected $casts = [
        'item_images' => 'array',
    ];
}
