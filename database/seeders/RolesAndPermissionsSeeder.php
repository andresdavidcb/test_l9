<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'view courses']);
        Permission::create(['name' => 'create courses']);
        Permission::create(['name' => 'edit courses']);
        Permission::create(['name' => 'delete courses']);

        $role= Role::create(['name' => 'master']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['view courses','create courses']);

            
            $user = User::create([
                'name' => 'Master',
                'email' => 'super-admin@mail.com',
                'password' => bcrypt('Xwvce9_Es9_GuPL')
            ]);
            
            $user->assignRole('master');

        


    }
}
