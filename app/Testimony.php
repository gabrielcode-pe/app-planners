<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $table='testimonies';
    protected $fillable=['name','description', 'info_detail', 'jobtitle','company','url_img'];

}
