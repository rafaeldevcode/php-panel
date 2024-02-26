<?php

namespace Src\Migrations;

use Src\Migrations\ExecuteMigrations;

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
