<?php

namespace Src\Migrations;

use Src\Migrations\ExecuteMigrations;

class Migrations extends ExecuteMigrations
{
    public $table = 'migrations';

    /**
     * @since 1.0.0
     * 
     * @return void
     */
    public function init()
    {
        $this->integer('id')->primaryKey();
        $this->string('name', 255)->unique();

        $this->create();
    }
}
