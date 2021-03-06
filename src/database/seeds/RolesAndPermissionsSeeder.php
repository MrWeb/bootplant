<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create registry permissions
        Permission::create(['name' => 'create registry']);
        Permission::create(['name' => 'edit registry']);
        Permission::create(['name' => 'delete registry']);
        Permission::create(['name' => 'view registry']);

        // create branch permissions
        Permission::create(['name' => 'create branches']);
        Permission::create(['name' => 'edit branches']);
        Permission::create(['name' => 'delete branches']);
        Permission::create(['name' => 'view branches']);

        // create users permissions
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'view users']);

        $role = Role::create(['name' => 'superadmin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'agente'])->givePermissionTo([
            'create registry',
            'edit registry',
            'delete registry',
            'view registry',
        ]);
    }
}
