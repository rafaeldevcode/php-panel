<?php

namespace Src\Migrations;

use Src\Migrations\ExecuteMigrations;

class Users extends ExecuteMigrations
{
    public $table = 'users';

    /**
     * @since 1.0.0
     * 
     * @return void
     */
    public function init()
    {
        $this->integer('id')->primaryKey();
        $this->string('name', 50);
        $this->string('email', 50)->unique();
        $this->string('password', 200);
        $this->char('status', 3)->default('on');
        $this->string('avatar')->default('default.png');
        $this->timestamps();

        $this->create();
    }
}
