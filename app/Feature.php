<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table='course_features';
    protected $fillable=['info', 'ft_icon', 'course_id'];
    public $timestamps =false;
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
