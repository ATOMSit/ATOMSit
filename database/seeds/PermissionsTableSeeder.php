<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user_show',
            'user_create',
            'user_update',
            'user_delete',


            'product-list',
            'product-create',
            'product-edit',
            'product-delete'
        ];
        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }
        $role = Role::findOrCreate('ATOMSit');
        $role->givePermissionTo(Permission::all());
    }
}
