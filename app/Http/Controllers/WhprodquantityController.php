<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Whprodquantity;

class WhprodquantityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('WH')) {
            $wh = $request->session()->get('WH');
            $prodqtys = Whprodquantity::where('warehouse_id', '=', $wh)->paginate(15);
        } else
            $prodqtys = Whprodquantity::paginate(15);

        return view('prodqtys', compact('prodqtys'));
    }
}
