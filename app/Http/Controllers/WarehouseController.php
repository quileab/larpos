<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        //$products = Product::all();
        $warehouses = Warehouse::all();
        return view('warehouses', compact('warehouses'));
    }
}
