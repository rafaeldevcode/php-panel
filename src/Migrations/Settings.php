<?php

namespace Src\Migrations;

use Src\Migrations\CreateTables;

class Settings extends CreateTables
{
    public $table = 'settings';

    public function create()
    {
        self::execute("CREATE TABLE IF NOT EXISTS $this->table(
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `site_name` VARCHAR(50) DEFAULT NULL,
            `site_description` VARCHAR(100) DEFAULT NULL,
            `copyright` VARCHAR(100) DEFAULT NULL,
            `whatsapp_message` VARCHAR(255) DEFAULT NULL,
            `telegram_message` VARCHAR(255) DEFAULT NULL,
            `site_logo_main` VARCHAR(100) DEFAULT NULL,
            `site_logo_secondary` VARCHAR(100) DEFAULT NULL,
            `site_favicon` VARCHAR(100) DEFAULT NULL,
            `site_bg_login` VARCHAR(100) DEFAULT NULL,
            `preloader` CHAR(3) NOT NULL DEFAULT 'off',
            `cookies` CHAR(3) NOT NULL DEFAULT 'off',
            `preloader_image` VARCHAR(21) NOT NULL DEFAULT 'preloader_default.gif',
            `facebook_pixel` VARCHAR(50) DEFAULT NULL,
            `google_analytics` VARCHAR(20) DEFAULT NULL,
            `profile_facebook` VARCHAR(100) DEFAULT NULL,
            `profile_instagram` VARCHAR(100) DEFAULT NULL,
            `profile_linkedin` VARCHAR(100) DEFAULT NULL,
            `telegram` VARCHAR(50) DEFAULT NULL,
            `whatsapp` VARCHAR(20) DEFAULT NULL,
            `phone` VARCHAR(20) DEFAULT NULL,
            `email` VARCHAR(50) DEFAULT NULL,
            `andress` VARCHAR(150) NOT NULL,
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `update_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");
    }
}
