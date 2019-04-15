<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use Illuminate\Contracts\Container\Container;

class PermissionsTableSeeder extends Seeder
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

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
            'user_delete'
        ];
        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }
        $role = Role::findOrCreate('ATOMSit');
        $role->givePermissionTo(Permission::all());


    }
}
