<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Warehouse;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        //$products = Product::all();
        $warehouses = Warehouse::all();
        return view('warehouses', compact('warehouses'));
    }

    public function wareselect($id)
    {
        $warehouse = DB::table('warehouses')->where('id', '=', $id)->get();
        session(['warehouse' => $warehouse[0]->name]);
        session(['WH' => $id]);
        return view('dashboard');
    }
}
