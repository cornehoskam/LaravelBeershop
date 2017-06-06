<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = array('name');
    public $timestamps = false;
}
