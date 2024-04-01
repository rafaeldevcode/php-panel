<?php

namespace Src\Migrations;

class Migrations extends ExecuteMigrations
{
    public $table = 'migrations';

    public function up()
    {
        $this->integer('id')->primaryKey();
        $this->string('name', 255)->unique();

        $this->create();
    }

    public function down()
    {
        $this->dropTable();
    }
}
