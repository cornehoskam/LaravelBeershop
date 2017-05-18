<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = array('name', 'price', 'alcohol_contents', 'contents_ml', 'parent_category','description','image_url');
    public $timestamps = false;
}
