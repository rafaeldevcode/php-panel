<?php

namespace Src\Migrations;

use Src\Migrations\ExecuteMigrations;

class Migrations extends ExecuteMigrations
{
    public $table = 'migrations';

    public function init()
    {
        $this->integer('id')->primaryKey();
        $this->string('name', 255)->unique();

        $this->create();
    }
}
