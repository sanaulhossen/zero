<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    //RELATION WITH USER
    function RelationWithUser()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    //RELATION WITH TAG
    public function tags()
    {
        return $this->hasMany(Tag::class, 'blog_id', 'id');
    }

    //RELATION WITH CATEGORY
    function RelationWithCategory()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    //RELATION WITH COMMENT
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
