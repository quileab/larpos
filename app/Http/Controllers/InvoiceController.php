<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\client;
use App\Product;
use App\Invoicesitems;
use App\Whprodquantity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = invoice::paginate(5);
        return view('invoices.index', compact('invoices'));
    }

    // create a new Invoice Header
    public function create(Client $client)
    {
        if (!session()->has('clientid')) { // no hay cliente seleccionado
            return redirect()->route('clients.index');
        }

        $products = Product::first();
        return view('invoices.create', compact('products'));
    }

    // update existing (load to edit)
    public function edit($id)
    {
        $data = Invoice::find($id);
        return view('invoices.createedit', compact('data'));
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
            'letter' => 'required',
            'serial' => 'required',
            'number' => 'required',
            'date' => 'required',
            'salecondition' => 'nullable',
            'deliverynoteserial' => 'nullable',
            'deliverynotenumber' => 'nullable',
            'seller' => 'required',
            'discount' => 'nullable',
            'client_ID' => 'nullable',
            'client_ID_type' => 'nullable',
            'client_Name' => 'nullable',
            'client_City' => 'nullable',
            'client_address' => 'nullable',
            'client_tax_Cond' => 'nullable',
            'client_taxid' => 'nullable',
            'client_phone' => 'nullable',
            'client_email' => 'nullable',
            'flag' => 'nullable',
        ]);

        $invoice = new Invoice();
        $invoice->letter = $request['letter'];
        $invoice->serial = $request['serial'];
        $invoice->number = $request['number'];
        $invoice->date = $request['date'];
        $invoice->salecondition = $request['salecondition'];
        $invoice->deliverynoreserial = $request['deliverynoreserial'];
        $invoice->deliverynotenumber = $request['deliverynotenumber'];
        $invoice->seller = $request['seller'];
        $invoice->discount = $request['discount'];
        $invoice->client_ID = $request['client_ID'];
        $invoice->client_ID_type = $request['client_ID_type'];
        $invoice->client_Name = $request['client_Name'];
        $invoice->client_City = $request['client_City'];
        $invoice->client_address = $request['client_address'];
        $invoice->client_tax_Cond = $request['client_tax_Cond'];
        $invoice->client_taxid = $request['client_taxid'];
        $invoice->client_phone = $request['client_phone'];
        $invoice->client_email = $request['client_email'];
        $invoice->flag = $request['flag'];
        $invoice->save();
        Alert::toast('Comprobante guardado', 'success');
        return redirect()->route('invoices.index')
            ->with('message', 'Creado exitosamente!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'letter' => 'required',
            'serial' => 'required',
            'number' => 'required',
            'date' => 'required',
            'salecondition' => 'nullable',
            'deliverynoteserial' => 'nullable',
            'deliverynotenumber' => 'nullable',
            'seller' => 'required',
            'discount' => 'nullable',
            'client_ID' => 'nullable',
            'client_ID_type' => 'nullable',
            'client_Name' => 'nullable',
            'client_City' => 'nullable',
            'client_address' => 'nullable',
            'client_tax_Cond' => 'nullable',
            'client_phone' => 'nullable',
            'client_email' => 'nullable',
            'flag' => 'nullable',
        ]);

        $invoice->update($request->all());
        Alert::toast('Updated Successfully', 'success');
        return redirect()->route('invoices.index')
            ->with('message', 'Invoice updated successfully');
    }

    public function destroy($id)
    {
        // The ajax call handles the errors...
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
    }

    public function show(Request $request)
    {
        //dd($request);
        $data = Invoice::all();
        return view('invoices.index', compact('data'));
    }

    // search INVOICES myway
    public function search(Request $request)
    {
        //dd($request);
        $search = $request->get('search');
        $cadena = preg_replace('/\s\s+/', ' ', $search);
        $cadena = preg_replace("@[^A-Za-z0-9\w\ ]@", "", $cadena);
        $cadenas = explode(' ', $cadena);

        $data = Invoice::where(function ($query) use ($cadenas) {
            foreach ($cadenas as $cadena) {
                $query->where(DB::raw('concat(client_Name," ",number)'), 'like', '%' . $cadena . '%');
            }
        })->paginate(5); //toSql();

        return view('invoices.index', compact('data') //);
        )->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // search PRODUCTS myway
    public function productssearch(Request $request, Invoice $invoice)
    {
        //dd($request);
        $search = $request->get('search');
        $cadena = preg_replace('/\s\s+/', ' ', $search);
        $cadena = preg_replace("@[^A-Za-z0-9\w\ ]@", "", $cadena);
        $cadenas = explode(' ', $cadena);

        $products = Product::where(function ($query) use ($cadenas) {
            foreach ($cadenas as $cadena) {
                $query->where(DB::raw('concat(barcode," ",brand," ",description)'), 'like', '%' . $cadena . '%');
            }
        })->paginate(5); //toSql();

        if ($products->count() == 1) {
            $response = $this->addToCart($request);
        }
        return view('invoices.create', compact('products', 'invoice') //);
        );
        // )->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function addToCart(Request $request)
    {
        $id = $request['id'];
        $quantity = $request['quantity'];
        $price = $request['price'];

        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "brand" => $product->brand,
                    "type" => $product->type,
                    "description" => $product->description,
                    "quantity" => $quantity,
                    "price" => $price,
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
            //redirect()->route('invoices.create');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {

            $cart[$id]['quantity'] += $quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
            //redirect()->route('invoices.create');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "brand" => $product->brand,
            "type" => $product->type,
            "description" => $product->description,
            "quantity" => $quantity,
            "price" => $price,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
        //redirect()->route('invoices.create');
    }

    public function savePrintOrder(Request $request)
    {
        // *** Get Warehouse ***
        if ($request->session()->has('WH')) {
            $warehouse = session()->get('WH');
        } else {
            $warehouse = auth()->user()->warehouse_id;
        }

        // *** Get Client Data ***
        $client = Client::find(session('clientid'));

        // *** Get Last Invoice ***
        $count = Invoice::where('id', '>', '0')->count();

        // *** Validation should be here ***

        // *** Set Invoice Header Data ***
        $invoice = new Invoice();
        $invoice->letter = $request->invoiceLetter;
        $invoice->serial = $request->invoicePoint;
        $invoice->number = $count;
        $invoice->date = Carbon::now();
        $invoice->salecondition = 'C';
        $invoice->deliverynoteserial = '2';
        $invoice->deliverynotenumber = '0';
        $invoice->seller = auth()->user()->name;
        $invoice->discount = '0';
        $invoice->client_ID = $client->id;
        $invoice->client_ID_type = $client->idtype;
        $invoice->client_ID_number = $client->idnumber;
        $invoice->client_Name = $client->fullname;
        $invoice->client_City = $client->city;
        $invoice->client_address = $client->address;
        $invoice->client_tax_Cond = $client->taxcond;
        $invoice->client_taxid = $client->taxid;
        $invoice->client_phone = $client->phones;
        $invoice->client_email = $client->email;
        $invoice->flag = '';
        //dd($invoice);
        $invoice->save();

        // *** Get Last "Unique" ID of Invoice Record *** 
        $id = DB::getPdo()->lastInsertId();

        // *** ---- Save Invoice Cart Items ---- ***
        $cart = session()->get('cart');
        // *** ------ Save each Cart Item ------ ***
        foreach ($cart as $key => $cartitem) {
            $detail = new Invoicesitems();
            $product = Product::find($key);

            $detail->invoices_id = $id;
            $detail->products_id = $key;
            $detail->brand = $product->brand;
            $detail->type = $product->type;
            $detail->description = $product->description;
            $detail->quantity = $cartitem['quantity'];
            $detail->unit = $product->unit->unit;
            $detail->price = $cartitem['price'];
            $detail->tax = $product->tax;
            $detail->discount = $product->discount;
            $detail->save();
            // ***------- Update Stock --------***
            $stock = Whprodquantity::where('warehouse_id', $warehouse)->where('product_id', $key)->get();
            // Toma la Cantidad si existe en Depósito
            $quantity = ($stock->count() > 0) ? $quantity = $stock[0]->quantity : 0;
            if ($detail->quantity >= $quantity) {
                $quantity = 0;
            } else {
                $quantity -= $detail->quantity;
            }
            if ($stock->count() > 0) { // Si en depósito existe esa mercadería la actualiza
                $stock[0]->quantity = $quantity;
                $stock[0]->save();
            }
        }
        // ***------- Clear Cart & Client --------***
        if (session()->get('cart')) {
            session()->forget('cart');
        }
        if (session()->has('clientid')) {
            session()->forget('clientname');
            session()->forget('clientid');
        }

        Alert::toast('Creado exitósamente', 'success');

        return redirect()->route('invoices.printpdf')->with(compact('invoice'));
    }

    public function printpdf(Request $request)
    {
        $letter = $request->session()->get('invoice')->letter;
        $serial = $request->session()->get('invoice')->serial;
        $number = $request->session()->get('invoice')->number;
        $id = $request->session()->get('invoice')->id;

        $invoice = Invoice::find($id);
        $invoicesitems = Invoicesitems::where('invoices_id', $id)->get();

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('invoices.pdf', compact('invoice', 'invoicesitems'))
            ->setPaper('a4');

        $output = $pdf->output();
        $filename = $letter . '-' . $serial . '-' . $number . '.pdf';
        file_put_contents($filename, $output);
        //return $pdf->stream();
        // return $pdf->download('comprobante.pdf');
        return redirect()->route('clients.index')->with(compact('filename'));
    }
}
