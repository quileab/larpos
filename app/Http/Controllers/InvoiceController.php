<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Invoices_Item;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = invoice::paginate(15);
        return view('invoices.index', compact('invoices'));
    }

    // create a new one
    public function create()
    {
        $data = new Invoice();
        return view('invoices.createedit', compact('data'));
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
        $invoice->client_phone = $request['client_phone'];
        $invoice->client_email = $request['client_email'];
        $invoice->flag = $request['flag'];
        $invoice->save();
        Alert::toast('Created Successfully', 'success');
        return redirect()->route('invoices.index')
            ->with('message', 'Invoice created successfully');
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
        $data=Invoice::all();
        return view('invoices.index',compact('data'));
    }

    // search myway
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
        })->paginate(10); //toSql();

        return view('invoices.index', compact('data') //);
           )->with('i', (request()->input('page', 1) - 1) * 10);
    }



}
