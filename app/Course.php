<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Course extends Model
{
    //
    protected $fillable=['name', 'seo', 'info', 'slug', 'is_free', 'url_portrait', 'category_id'];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
