<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::find(1);
        $permissions = Permission::get();
        foreach ($permissions as $permission) {
            $role->attachPermission($permission->id);
        }
    }
}
