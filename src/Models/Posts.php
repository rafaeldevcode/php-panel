<?php

namespace Src\Models;

class Posts extends Model
{
    public $table = 'posts';

    public function images(): Gallery
    {
        return $this->belongsToMany(Gallery::class, 'post_images', 'post_id', 'image_id');
    }

    public function thumbnail(): Gallery
    {
        return $this->belongsTo(User::class, 'gallery', 'thumbnail');
    }

    public function user(): User
    {
        return $this->belongsTo(User::class, 'users', 'user_id');
    }
}
