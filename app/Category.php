<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    function RelationWithUser()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
