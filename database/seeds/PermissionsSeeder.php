<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //create permissions admins
        Permission::create(['name' => 'create-admin']);
        Permission::create(['name' => 'view-admin']);
        Permission::create(['name' => 'edit-admin']);
        Permission::create(['name' => 'delete-admin']);

        //create permissions doctors
        Permission::create(['name' => 'create-doctor']);
        Permission::create(['name' => 'view-doctor']);
        Permission::create(['name' => 'edit-doctor']);
        Permission::create(['name' => 'delete-doctor']);

        //create permissions receptionists
        Permission::create(['name' => 'create-receptionist']);
        Permission::create(['name' => 'view-receptionist']);
        Permission::create(['name' => 'edit-receptionist']);
        Permission::create(['name' => 'delete-receptionist']);

        //create permissions patients
        Permission::create(['name' => 'create-patient']);
        Permission::create(['name' => 'view-patient']);
        Permission::create(['name' => 'edit-patient']);
        Permission::create(['name' => 'delete-patient']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Superadmin']);
          $role1->givePermissionTo('create-admin');
          $role1->givePermissionTo('view-admin');
          $role1->givePermissionTo('edit-admin');
          $role1->givePermissionTo('delete-admin');
          $role1->givePermissionTo('create-doctor');
          $role1->givePermissionTo('view-doctor');
          $role1->givePermissionTo('edit-doctor');
          $role1->givePermissionTo('delete-doctor');
          $role1->givePermissionTo('create-receptionist');
          $role1->givePermissionTo('view-receptionist');
          $role1->givePermissionTo('edit-receptionist');
          $role1->givePermissionTo('delete-receptionist');
          $role1->givePermissionTo('create-patient');
          $role1->givePermissionTo('view-patient');
          $role1->givePermissionTo('edit-patient');
          $role1->givePermissionTo('delete-patient');

        $role2 = Role::create(['name' => 'Admin']);
          $role2->givePermissionTo('create-doctor');
          $role2->givePermissionTo('view-doctor');
          $role2->givePermissionTo('edit-doctor');
          $role2->givePermissionTo('delete-doctor');
          $role2->givePermissionTo('create-receptionist');
          $role2->givePermissionTo('view-receptionist');
          $role2->givePermissionTo('edit-receptionist');
          $role2->givePermissionTo('delete-receptionist');
          $role2->givePermissionTo('create-patient');
          $role2->givePermissionTo('view-patient');
          $role2->givePermissionTo('edit-patient');
          $role2->givePermissionTo('delete-patient');

        $role3 = Role::create(['name' => 'Doctor']);
          $role3->givePermissionTo('view-patient');

        $role4 = Role::create(['name' => 'Receptionist']);
          $role4->givePermissionTo('create-patient');
          $role4->givePermissionTo('view-patient');
          $role4->givePermissionTo('edit-patient');
          $role4->givePermissionTo('delete-patient');

        $role5 = Role::create(['name' => 'Patient']);



        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create  users
        $user = Factory(App\User::class)->create([
            'name' => 'Superadmin',
            'email' => 'superadmin@superadmin.com',
        ]);
        $user->assignRole($role1);

        $user = Factory(App\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);
        $user->assignRole($role2);

        $user = Factory(App\User::class)->create([
            'name' => 'Doctor',
            'email' => 'doctor@doctor.com',
        ]);
        $user->assignRole($role3);

        $user = Factory(App\User::class)->create([
            'name' => 'Receptionist',
            'email' => 'receptionist@receptionist.com',
        ]);
        $user->assignRole($role4);

        $user = Factory(App\User::class)->create([
            'name' => 'Patient',
            'email' => 'patient@patient.com',
        ]);
        $user->assignRole($role5);
    }
}
