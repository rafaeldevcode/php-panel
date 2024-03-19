<?php

namespace Src\Migrations;

class Users extends ExecuteMigrations
{
    public $table = 'users';

    public function init()
    {
        $this->integer('id')->primaryKey();
        $this->string('name', 50);
        $this->string('email', 50)->unique();
        $this->string('password', 200);
        $this->char('status', 3)->default('on');
        $this->integer('avatar')->nullable();
        $this->timestamps();

        $this->create();
    }
}
