<?php

namespace Src;

use Src\Migrations\ExecuteMigrations;
use Src\Models\Migrations;
use Src\Models\Gallery;
use Src\Models\Setting;
use Src\Models\User;

class Commands
{
    public function migrateUp()
    {
        $executeMigrations = new ExecuteMigrations();
        $migrations = new Migrations();

        $migrationsExists = $executeMigrations->verifyExistsMigrations();
        $contents = scandir(__DIR__ . '/../src/Migrations/');
        $contents = array_slice($contents, 2, -1);
        $migrates = [];

        foreach ($contents as $file) {
            if (!$migrationsExists || empty($migrations->where('name', '=', $file)->get())) {
                $class = explode('.', $file)[0];

                require __DIR__ . "/../src/Migrations/{$file}";
                $class = 'Src\\Migrations\\' . substr($class, 5);

                echo "Running the '{$class}' migration.\n";

                $exec = new $class();
                $exec->up();

                $migrations->create(['name' => $file]);

                array_push($migrates, $file);
                $migrationsExists = true;

                echo "Migration from {$class} finished!\n\n";
            };
        };

        echo empty($migrates) ? "No migration to perform!\n\n" : "Migration finished!\n\n";
    }

    public function migrateDown()
    {
        $migrations = new Migrations();

        $contents = scandir(__DIR__ . '/../src/Migrations/');
        $contents = array_reverse(array_slice($contents, 2, -1));

        foreach ($contents as $file) {
            $class = explode('.', $file)[0];

            require __DIR__ . "/../src/Migrations/{$file}";
            $class = 'Src\\Migrations\\' . substr($class, 5);

            $exec = new $class();
            $exec->down();

            if ($migrations->hasTable()) {
                $migrations->where('name', '=', $file)->delete();
            }
        };

        echo "Migration finished!\n\n";
    }

    public function initialSetup()
    {
        $user = new User();
        $gallery = new Gallery();
        $settings = new Setting();

        if (!$user->hasTable() || !$gallery->hasTable() || !$settings->hasTable()) {
            echo "It is not possible to run initial setup before carrying out the migrations!\n\n";
        } else {
            $name = 'Administrador';
            $email = 'administrador@example.com';
            $password = '@Admin4431!';

            $user = $user->create([
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            ]);

            $favicon = $gallery->create([
                'name' => 'favicon',
                'file' => 'favicon.svg',
                'user_id' => $user->id,
                'size' => 0,
            ]);

            $logoMain = $gallery->create([
                'name' => 'logo main',
                'file' => 'logo_main.svg',
                'user_id' => $user->id,
                'size' => 0,
            ]);

            $logoSecondary = $gallery->create([
                'name' => 'logo secondary',
                'file' => 'logo_secondary.png',
                'user_id' => $user->id,
                'size' => 0,
            ]);

            $bgLogin = $gallery->create([
                'name' => 'bg login',
                'file' => 'bg_login.jpg',
                'user_id' => $user->id,
                'size' => 0,
            ]);

            $avatar = $gallery->create([
                'name' => 'bg login',
                'file' => 'avatar.jpg',
                'user_id' => $user->id,
                'size' => 0,
            ]);

            $settings->create([
                'site_logo_main' => $logoMain->id,
                'site_logo_secondary' => $logoSecondary->id,
                'site_favicon' => $favicon->id,
                'site_bg_login' => $bgLogin->id,
            ]);

            (new User())->find($user->id)->update(['avatar' => $avatar->id]);

            echo "Email: {$email} \n";
            echo "Senha: {$password}\n\n";
        }
    }

    public function changeColorSvg(?string $current, ?string $new)
    {
        if (isset($current) || isset($new)) {
            $oldColor = strtolower($current);
            $newColor = strtolower($new);

            $path = __DIR__ . '/../public/assets/images/';
            $images = scandir($path);
            $images = array_filter($images, function ($item) {
                return strpos($item, '.svg') !== false ? true : false;
            });

            foreach ($images as $image) {
                $svgContent = file_get_contents("{$path}{$image}");

                $newSvgContent = str_replace($oldColor, $newColor, $svgContent);

                file_put_contents("{$path}{$image}", $newSvgContent);
            };

            echo "Colors changed successfully!\n\n";
        } else {
            echo "It is necessary to inform the old color and the new color!\n\n";
        };
    }
}
