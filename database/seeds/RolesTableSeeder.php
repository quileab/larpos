<?php

use App\Role;
use App\client;
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

        client::truncate();
        client::create([
            'idtype' => 'DNI',
            'idnumber' => '88000111',
            'fullname' => 'Doe, John',
            'city' => 'Reconquista',
            'address' => 'San Martín 9999',
            'taxcond' => 5,
            'phones' => '3482555555',
            'email' => 'doe@gmail.com',
        ]);
        client::create([
            'idtype' => 'DNI',
            'idnumber' => '88000222',
            'fullname' => 'Perez, Juan',
            'city' => 'Reconquista',
            'address' => 'Belgrano 9999',
            'taxcond' => 5,
            'phones' => '3482444444',
            'email' => 'perezjuan@gmail.com',
        ]);
        client::create([
            'idtype' => 'DNI',
            'idnumber' => '88000333',
            'fullname' => 'Siete, Domingo',
            'city' => 'Reconquista',
            'address' => 'Sarmiento 9999',
            'taxcond' => 5,
            'phones' => '3482333333',
            'email' => 'domingo@gmail.com',
        ]);
        client::create([
            'idtype' => 'DNI',
            'idnumber' => '88000333',
            'fullname' => 'Catedral, Agosto',
            'city' => 'Reconquista',
            'address' => 'Sarmiento 9999',
            'taxcond' => 1,
            'phones' => '3482333333',
            'email' => 'catedralago@gmail.com',
        ]);
    }
}
