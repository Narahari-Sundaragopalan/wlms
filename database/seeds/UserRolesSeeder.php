<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table('users')->delete();
         User::create([  'name' => 'Administrator', 'password' => bcrypt('123456'), 'email' => 'wlmsadmin@omahasteaks.com',
             'created_at' => date_create(), 'updated_at' => date_create()]);
     }
}

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->delete();
        Role::create([ 'name' => 'admin', 'display_name' => 'Administrator', 'description' => 'User is allowed to create and manage other users',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
        Role::create([ 'name' => 'manager', 'display_name' => 'Manager', 'description' => 'User is allowed to create and manage schedule of employees',
            'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}


class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('role_user')->delete();
        $user = User::where('name', '=', 'Administrator')->first()->id;
        $role = Role::where('name', '=', 'admin')->first()->id;
        $role_user = [['role_id' => $role, 'user_id' => $user, 'created_by' => 'System', 'updated_by' => 'System', 'created_at' => date_create(), 'updated_at' => date_create()]];
        DB::table('role_user')->insert($role_user);
    }
}