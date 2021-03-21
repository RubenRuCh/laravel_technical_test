<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Rubén Rüger', 
            'email' => 'admin@rruger.dev',
            'password' => bcrypt('123456')
        ]);

        $role = Role::where('name', 'admin')->first();
        $user->assignRole([$role->id]);
    }
}
