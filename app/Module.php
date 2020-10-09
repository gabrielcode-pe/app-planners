<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $table='course_modules';
    protected $fillable=['name', 'info', 'url_img', 'duration','position','course_id'];
    public $timestamps =false;

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
