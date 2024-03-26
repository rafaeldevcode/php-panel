<?php

namespace Src\Migrations;

class PostImages extends ExecuteMigrations
{
    public $table = 'post_images';

    public function up()
    {
        $this->integer('post_id');
        $this->integer('image_id');

        $this->create();
    }

    public function down()
    {
        $this->dropTable();
    }
}
