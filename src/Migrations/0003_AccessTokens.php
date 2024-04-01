<?php

namespace Src\Migrations;

class AccessTokens extends ExecuteMigrations
{
    public $table = 'access_token';

    public function up()
    {
        $this->integer('id')->primaryKey();
        $this->integer('user_id');
        $this->string('token', 200);

        $this->foreignKey('user_id')->references('id')->on('users');

        $this->create();
    }

    public function down()
    {
        $this->dropTable();
    }
}
