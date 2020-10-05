<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = ['name', 'slug'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
