<?php

namespace Src\Migrations;

use Src\Migrations\ExecuteMigrations;

class AccessTokens extends ExecuteMigrations
{
    public $table = 'access_token';

    public function init()
    {
        $this->integer('id')->primaryKey();
        $this->integer('user_id');
        $this->string('token', 200);

        $this->foreignKey('user_id')->references('id')->on('users');

        $this->create();
    }
}
