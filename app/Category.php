<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'categories';
  //Primary Key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps = true;
}
