<?php

namespace Src\Models;

class Posts extends Model
{
    public $table = 'posts';

    /**
     * @since 1.3.0
     * 
     * @return Gallery
     */
    public function images(): Gallery
    {
        return $this->hasMany(Gallery::class, 'post_images', 'post_id', 'image_id');
    }
}
