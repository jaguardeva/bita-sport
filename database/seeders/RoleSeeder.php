<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updateOrCreate(
            [
                "name" => "admin",
            ],
            [
                "name" => "admin",
            ]
        );

        Role::updateOrCreate([
            "name" => "user",
        ], [
            "name" => "user",
        ]);
        Role::updateOrCreate(
            [
                "name" => "guest",
            ],
            [
                "name" => "guest",
            ]
        );
    }
}
