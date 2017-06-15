<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model{
    protected $fillable = array('user_id','cart_id','order_id');
    public $timestamps = false;
}
