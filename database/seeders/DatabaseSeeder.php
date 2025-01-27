<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@mail.com'], // kondisi pencarian
            [
                'name' => 'admin',  // data yang ingin diperbarui atau dibuat
                'email' => 'admin@mail.com',
                'password' => bcrypt('password'),
            ]
        );

        User::updateOrCreate(
            [
                'email' => 'user@mail.com',
            ],
            [
                'name' => 'user',
                "email" => "user@mail.com",
                'password' => bcrypt('password'),
            ]
        );

        $this->call(
            [
                PermissionSeeder::class,
                ReviewSeeder::class,
                CategorySeeder::class,
                FieldSeeder::class,
            ]
        );
    }
}
