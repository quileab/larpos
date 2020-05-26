<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate(); // borra los Datos de la  tabla
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'sales']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'stock']);
    }
}
