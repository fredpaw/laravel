<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Tag extends BaseModel
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
