<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Course extends Model
{
    //
    protected $fillable=['name', 'seo', 'info', 'slug', 'is_free', 'video', 'url_portrait', 'institution_id', 'instructor_id', 'date_start'];

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
    public function prices()
    {
        return $this->hasMany(Price::class);
    }
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
