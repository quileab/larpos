<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Warehouse;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        //$products = Product::all();
        $warehouses = Warehouse::all();
        return view('warehouses.index', compact('warehouses'));
    }

    // To create a new warehouse
    public function create()
    {
        $data = new Warehouse();
        return view('warehouses.createedit', compact('data'));
    }

    // To update an existing warehouse (load to edit)
    public function edit($id)
    {
        $data = Warehouse::find($id);
        // Load user/createOrUpdate.blade.php view
        return view('warehouses.createedit', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $warehouse = new Warehouse();
        $warehouse->name = $request['name'];
        $warehouse->description = $request['description'];
        $warehouse->save();
        Alert::toast('Created Successfully', 'success');
        return redirect()->route('warehouses.index')
            ->with('message', 'Product created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $warehouse->update($request->all());
        Alert::toast('Updated Successfully', 'success');
        return redirect()->route('warehouses.index')
            ->with('message', 'Product updated successfully');
    }

    public function destroy($id)
    {
        // The ajax call handles the errors...
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();

        /*
        try {
            $warehouse = Warehouse::findOrFail($id);
        } catch (\Exception $exception) {
            //Alert::alert('Alert', 'Cannot FIND Warehouse');
            //return redirect('/warehouses');
        }

        try {
            $warehouse->delete();
        } catch (\Exception $exception) {
            //Alert::error('Error', 'Cannot DELETE Warehouse');
            //return redirect('/warehouses')->with('message', 'Error:' . $exception)->with('type', 'danger');
            //return redirect('/warehouses');
        }
*/
        //return redirect('/warehouses');
    }

    public function wareselect($id)
    {
        $warehouse = DB::table('warehouses')->where('id', '=', $id)->get();
        session(['warehouse' => $warehouse[0]->name]);
        session(['WH' => $id]);
        return view('dashboard');
    }
    public function waredeselect(Request $request)
    {
        if ($request->session()->has('WH')) {
            $request->session()->forget('warehouse');
            $request->session()->forget('WH');
        }
        return view('dashboard');
    }
}
