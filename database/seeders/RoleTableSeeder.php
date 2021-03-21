<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Regular user role
        $role = new Role();
        $role->name = 'user';
        $role->description = 'User';
        $role->save();

        // Give permissions to read
        $permissions = DB::table('permissions')->where('name', 'role-list')->orWhere('name', 'user-list')->pluck('id', 'id');
        $role->syncPermissions($permissions);

        // Admin role
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        // Give permissions to all
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
    }
}
