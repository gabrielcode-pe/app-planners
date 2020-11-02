<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable=['name', 'url_img', 'description' , 'info', 'slug'];


    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
