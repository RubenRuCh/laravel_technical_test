<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class); // Call to PermissionTableSeeder
        $this->call(RoleTableSeeder::class); // Call to RoleTableSeeder
        $this->call(CreateAdminUserSeeder::class); // Call to CreateAdminUserSeeder
    }
}
