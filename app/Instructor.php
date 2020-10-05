<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable=['name', 'url_img', 'info', 'slug'];
}
