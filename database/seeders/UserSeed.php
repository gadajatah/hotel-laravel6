<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name'      => 'Admin',
            'username'  => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('password'),
        ]);

        $user = User::create([
            'name'      => 'User',
            'username'  => 'user',
            'email'     => 'user@user.com',
            'password'  => bcrypt('password'),
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
