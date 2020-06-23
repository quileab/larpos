<?php

namespace App\Http\Controllers;

use App\Product;
use App\Unit;
use App\Whprodquantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        //$products = Product::all();
        $products = Product::paginate(15);
        //dd($products);
        return view('products.index', compact('products'));
    }

    // create a new one
    public function create(Request $request)
    {
        $data = new Product();
        $units = unit::all();
        $whqty=new Whprodquantity(['warehouse_id'=>'0','product_id'=>'0','qtymin'=>'0','qtymax'=>'0']);
        return view('products.createedit', compact('data','units','whqty'));
    }

    // update existing (load to edit)
    public function edit($id, Request $request)
    {
        $data = Product::find($id);
        $units = unit::all();
        
        if ($request->session()->has('WH')) {
            $warehouse=session()->get('WH');
           } else {
            $warehouse=auth()->user()->warehouse_id;
           }

            //$whqty = Whprodquantity::where('product_id','=',$id)->where('warehouse_id','=',$warehouse)->findOrFail(1);
        $whqty = DB::table('whprodquantities')->where('product_id','=',$id)->where('warehouse_id','=',$warehouse)->first();
        if ($whqty==null){
            $whqty=new Whprodquantity(['warehouse_id'=>$warehouse,'product_id'=>$id,'qtymin'=>'0','qtymax'=>'0']);
        }


        // Load user/createOrUpdate.blade.php view
        return view('products.createedit', compact('data','units','whqty'));
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
            'barcode' => 'nullable',
            'brand' => 'required',
            'type' => 'required',
            'description' => 'required',
            'unit_id' => 'required',
            'price' => 'required',
            'tax' => 'required',
            'profit1' => 'nullable',
            'profit2' => 'nullable',
            'salesprice1' => 'required',
            'salesprice2' => 'nullable',
            'discount' => 'nullable',
        ]);

        $product = new Product();
        $product->barcode = $request['barcode'];
        $product->brand = $request['brand'];
        $product->type = $request['type'];
        $product->description = $request['description'];
        $product->unit_id = $request['unit_id'];
        $product->price = $request['price'];
        $product->tax = $request['tax'];
        $product->profit1 = $request['profit1'];
        $product->profit2 = $request['profit2'];
        $product->salesprice1 = $request['salesprice1'];
        $product->salesprice2 = $request['salesprice2'];
        $product->discount = $request['discount'];
        $product->save();
        Alert::toast('Created Successfully', 'success');
        return redirect()->route('products.index')
            ->with('message', 'Product created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'barcode' => 'nullable',
            'brand' => 'required',
            'type' => 'required',
            'description' => 'required',
            'unit_id' => 'required',
            'price' => 'required',
            'tax' => 'required',
            'profit1' => 'nullable',
            'profit2' => 'nullable',
            'salesprice1' => 'required',
            'salesprice2' => 'nullable',
            'discount' => 'nullable',
        ]);

        $product->update($request->all());
        Alert::toast('Updated Successfully', 'success');
        return redirect()->route('products.index')
            ->with('message', 'Product updated successfully');
    }

    public function destroy($id)
    {
        // The ajax call handles the errors...
        $product = Product::findOrFail($id);
        $product->delete();
    }

    // search myway
    public function search(Request $request)
    {
        //dd($request);
        $search = $request->get('search');
        $cadena = preg_replace('/\s\s+/', ' ', $search);
        $cadena = preg_replace("@[^A-Za-z0-9\w\ ]@", "", $cadena);
        $cadenas = explode(' ', $cadena);

        $products = Product::where(function ($query) use ($cadenas) {
            foreach ($cadenas as $cadena) {
                $query->where(DB::raw('concat(brand," ",type," ",description)'), 'like', '%' . $cadena . '%');
            }
        })->paginate(10); //toSql();

        return view('products.index', compact('products') //);
           )->with('i', (request()->input('page', 1) - 1) * 10);
    }

}
