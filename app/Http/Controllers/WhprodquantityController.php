<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Whprodquantity;

class WhprodquantityController extends Controller
{
    public function index(Request $request)
    {
        //$products = Product::all();
        $prodqtys = Whprodquantity::paginate(15);
        //dd($prodqtys);
        return view('prodqtys', compact('prodqtys'));
    }
}
