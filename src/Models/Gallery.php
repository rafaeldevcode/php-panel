<?php

namespace Src\Models;

class Gallery extends Model
{
    public $table = 'gallery';

    public function posts(): Posts
    {
        return $this->belongsToMany(Posts::class, 'post_images', 'image_id', 'post_id');
    }

    public function postsThumbnail(): Posts
    {
        return $this->hasMany(Posts::class, 'posts', 'thumbnail');
    }
}
