<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        //return Product::all();
        // Usando el *Resource*
        return ProductResource::collection(Product::all());
    }
}
