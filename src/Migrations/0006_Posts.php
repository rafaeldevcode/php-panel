<?php

namespace Src\Migrations;

class Posts extends ExecuteMigrations
{
    public $table = 'posts';

    public function up()
    {
        $this->integer('id')->primaryKey();
        $this->string('title', 255);
        $this->string('slug', 255)->unique();
        $this->longtext('content')->nullable();
        $this->text('excerpt')->nullable();
        $this->char('status', 9)->default('published');
        $this->integer('count_views')->default(0);
        $this->integer('user_id');
        $this->integer('thumbnail')->nullable();

        $this->foreignKey('user_id')->references('id')->on('users');
        $this->foreignKey('thumbnail')->references('id')->on('gallery');

        $this->timestamps();

        $this->create();
    }

    public function down()
    {
        $this->dropTable();
    }
}
