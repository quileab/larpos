<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        //$products = Product::all();
        $products = Product::paginate(15);
        //dd($products);
        return view('products', compact('products'));
    }
}
