<?php

namespace Src\Models;

class Gallery extends Model
{
    public $table = 'gallery';

    /**
     * @since 1.3.0
     * 
     * @return Posts
     */
    public function posts(): Posts
    {
        return $this->hasMany(Posts::class, 'post_images', 'image_id', 'post_id');
    }
}
