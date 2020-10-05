<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'url_portrait','slug'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
