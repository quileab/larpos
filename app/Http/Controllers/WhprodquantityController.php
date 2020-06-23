<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Whprodquantity;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function store(Request $request)
    {
        $this->validate($request, [
            'warehouse_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'qtymin' => 'nullable',
            'qtymax' => 'nullable',
        ]);

        $whqty = new Whprodquantity();
        $whqty->warehouse_id = $request['warehouse_id'];
        $whqty->product_id = $request['product_id'];
        $whqty->quantity = $request['quantity'];
        $whqty->qtymin = $request['qtymin'];
        $whqty->qtymax = $request['qtymax'];
        $whqty->save();
        Alert::toast('Created Successfully', 'success');
        return redirect()->route('products.index')
            ->with('message', 'Quantity created successfully');
    }

    public function update(Request $request, Whprodquantity $whqty)
    {
        $request->validate([
            'warehouse_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'qtymin' => 'nullable',
            'qtymax' => 'nullable',
        ]);

        $whqty->update($request->all());
        Alert::toast('Updated Successfully', 'success');
        return redirect()->route('products.index')
            ->with('message', 'Quantity updated successfully');
    }

    public function destroy($id)
    {
        // The ajax call handles the errors...
        $whqty = Whprodquantity::findOrFail($id);
        $whqty->delete();
    }

}
