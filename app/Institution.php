<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = ['name', 'slug', 'info', 'phone', 'email', 'url_logo', 'url_web'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
