<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $table = 'consultant';
    protected $fillable = ['info', 'customer','fechas', 'nro_order'];
    public $timestamps =false;
}
