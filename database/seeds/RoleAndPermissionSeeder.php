<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name' => 'create quiz']);
        Permission::create(['name' => 'edit quiz']);
        Permission::create(['name' => 'delete quiz']);

        Permission::create(['name' => 'create question']);
        Permission::create(['name' => 'edit question']);
        Permission::create(['name' => 'delete question']);

        $role = Role::create(['name' => 'player']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
