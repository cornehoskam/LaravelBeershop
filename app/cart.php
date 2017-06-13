<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable = array('user_id','product_id','amount');
    public $timestamps = false;
}
