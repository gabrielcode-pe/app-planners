<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['title', 'info','url_img','type' ,'nro_order'];
    public $timestamps =false;
}
