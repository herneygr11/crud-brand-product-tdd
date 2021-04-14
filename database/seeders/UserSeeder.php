<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => "Herney Ruiz",
                'email' => "herney@admin.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "Luis Cruz",
                'email' => "luis@admin.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "Laura Saldarriaga",
                'email' => "laura@admin.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
        ];

        echo "Creating users items " . "\n";
        foreach ( $users as $user ){
            echo "\t" . "Creating user " . $user[ 'name' ] . "\n";
            User::updateOrCreate(
                [
                    "name" => $user[ 'name' ],
                    "email" => $user[ 'email' ],
                ],
                [
                    'name'              => $user[ 'name' ],
                    'email'             => $user[ 'email' ],
                    'email_verified_at' => $user[ 'email_verified_at' ],
                    'password'          => $user[ 'password' ],
                    'remember_token'    => $user[ 'remember_token' ],
                ]
            );
            echo "\t" . "Created user " . $user[ 'name' ] . "\n";
        }
        echo "Created users items" . "\n";
    }
}
