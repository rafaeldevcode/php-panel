<?php

namespace Src\Migrations;

use Src\Migrations\ExecuteMigrations;

class Gallery extends ExecuteMigrations
{
    public $table = 'gallery';

    public function init()
    {
        $this->integer('id')->primaryKey();
        $this->string('name', 150);
        $this->string('file', 100);
        $this->integer('user_id');
        $this->integer('size')->default(0);
        $this->integer('type')->default(1);

        $this->timestamps();

        $this->foreignKey('user_id')->references('id')->on('users');

        $this->create();
    }
}
