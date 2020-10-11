<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=['title', 'slug', 'summary', 'body', 'status', 'url_portrait', 'post_source', 'category_id']; 
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
