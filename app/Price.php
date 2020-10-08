<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    protected $table='course_prices';
    protected $fillable=['price_info','amount','is_active','course_id'];
    public function courses()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }
}
