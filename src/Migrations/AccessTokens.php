<?php

namespace Src\Migrations;

use Src\Migrations\CreateTables;

class AccessTokens extends CreateTables
{
    public $table = 'access_token';

    public function create()
    {
        self::execute("CREATE TABLE IF NOT EXISTS $this->table(
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `user_id` INT(11) NOT NULL,
            `token` VARCHAR(200) NOT NULL
        )");
    }
}
