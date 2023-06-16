<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/suports/env.php';

use Src\Migrations\CreateTables;
use Src\Models\User;

if(isset($argv[1])):
    if($argv[1] == 'migrate'):
        $dir_migrations = dir(__DIR__.'/src/Migrations/');
        $create_table = new CreateTables();
        $migrates = [];

        while($file = $dir_migrations->read()):
            if($file !== '.' && $file !== '..' && $file !== 'CreateTables.php'):
                if(!$create_table->createMigration($file)):
                    $class = explode('.', $file)[0];
                    $class = "Src\\Migrations\\".$class;

                    echo "Running the '{$class}' migration.\n";

                    $class = new $class;
                    $class->create();

                    $create_table->updateMigration($file);

                    array_push($migrates, $file);
                endif;
            endif;
        endwhile;

        echo empty($migrates) ? "No migration to perform!" : "Migration finished!";
    elseif($argv[1] == 'create-user'):
        $name = 'Administrador';
        $email = 'administrador@example.com';
        $password = '@Admin4431!';

        $user = new User();

        $response = $user->create([
            'name'     => $name,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        echo "Email: {$email} \n";
        echo "Senha: {$password}";
    endif;
endif;
