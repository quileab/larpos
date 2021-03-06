<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
        $salesRole = Role::where('name', 'sales')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('pass123')
        ]);
        $sales = User::create([
            'name' => 'Sales User',
            'email' => 'sales@admin.com',
            'password' => Hash::make('pass123')
        ]);
        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@admin.com',
            'password' => Hash::make('pass123')
        ]);

        // Agrego a cada 'Usuario' sus 'Roles' predefinidos
        $admin->roles()->attach($adminRole);
        $sales->roles()->attach($salesRole);
        $user->roles()->attach($userRole);
    }
}
