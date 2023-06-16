<?php

namespace Src\Migrations;

use Src\Migrations\CreateTables;

class Users extends CreateTables
{
    public $table = 'users';

    public function create()
    {
        self::execute("CREATE TABLE IF NOT EXISTS $this->table(
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(50) NOT NULL,
            `email` VARCHAR(50) NOT NULL UNIQUE,
            `password` VARCHAR(200) NOT NULL,
            `status` CHAR(3) NOT NULL DEFAULT 'on',
            `avatar` VARCHAR(100) DEFAULT 'default.png',
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");
    }
}
