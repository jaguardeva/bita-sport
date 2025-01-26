<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->call([
            RoleSeeder::class,
        ]);

        $view_dashboard = Permission::updateOrCreate(
            [
                "name" => "view_dashboard",
            ],
            [
                "name" => "view_dashboard",
            ]
        );

        $view_users_manajemen = Permission::updateOrCreate(
            [
                "name" => "view_users_manajemen",
            ],
            [
                "name" => "view_users_manajemen",
            ],

        );

        $admin = Role::where("name", "admin")->first();
        $user = Role::where("name", "user")->first();


        $admin->givePermissionTo($view_dashboard);
        $admin->givePermissionTo($view_users_manajemen);

        $userAsAdmin = User::where("email", "admin@mail.com")->first();
        $userAsAdmin->assignRole($admin);

        $userAsRole = USer::where("name", "user")->first();
        $userAsRole->assignRole($user);
    }
}
