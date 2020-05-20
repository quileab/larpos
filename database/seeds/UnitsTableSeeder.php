<?php

use App\Unit;
use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::truncate();

        $units = new Unit();
        $units->unit = 'un';
        $units->description = 'Unidades';
        $units->save();

        $units = new Unit();
        $units->unit = 'm';
        $units->description = 'Metros';
        $units->save();

        $units = new Unit();
        $units->unit = 'kg';
        $units->description = 'Kilogramos';
        $units->save();

        $units = new Unit();
        $units->unit = 'g';
        $units->description = 'Gramos';
        $units->save();

        $units = new Unit();
        $units->unit = 'L';
        $units->description = 'Litros';
        $units->save();

        $units = new Unit();
        $units->unit = 'cm3';
        $units->description = 'Centímetros Cúbicos';
        $units->save();

        $units = new Unit();
        $units->unit = 'doc';
        $units->description = 'Docena';
        $units->save();

        $units = new Unit();
        $units->unit = 'par';
        $units->description = 'Pares';
        $units->save();

        $units = new Unit();
        $units->unit = 'm2';
        $units->description = 'Metro Cuadrado';
        $units->save();
    }
}
