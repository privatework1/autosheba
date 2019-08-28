<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class B2bCustomer extends Model
{
    //Table name
    protected $table = 'b2b_customers';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
