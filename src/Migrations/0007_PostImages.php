<?php

namespace Src\Migrations;

class PostImages extends ExecuteMigrations
{
    public $table = 'post_images';

    public function init()
    {
        $this->integer('post_id');
        $this->integer('image_id');

        $this->create();
    }
}
