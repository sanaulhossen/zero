<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];
    function RelationWithUser()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    function RelationWithCategory()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
