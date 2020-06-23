<?php

namespace App\Http\Controllers;

use App\client;
use App\taxcondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Facade\FlareClient\Http\Client as HttpClient;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $data = client::paginate(15);
        return view('clients.index', compact('data'));
    }

    // create a new one
    public function create()
    {
        $data = new Client();
        $taxcondition = taxcondition::all();
        return view('clients.createedit', compact('data'), compact('taxcondition'));
    }

    // update existing (load to edit)
    public function edit($id)
    {
        $data = Client::find($id);
        $taxcondition = taxcondition::all();
        // Load user/createOrUpdate.blade.php view
        return view('clients.createedit', compact('data'),compact('taxcondition'));
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
            'idtype' => 'required',
            'idnumber' => 'required',
            'fullname' => 'required',
            'city' => 'nullable',
            'address' => 'nullable',
            'taxcond' => 'required',
            'phones' => 'nullable',
            'group' => 'nullable',
            'taxid' => 'nullable',
            'email' => 'nullable',
        ]);

        $client = new Client();
        $client->idtype = $request['idtype'];
        $client->idnumber = $request['idnumber'];
        $client->fullname = $request['fullname'];
        $client->city = $request['city'];
        $client->address = $request['address'];
        $client->taxcond = $request['taxcond'];
        $client->phones = $request['phones'];
        $client->group = $request['group'];
        $client->taxid = $request['taxid'];
        $client->email = $request['email'];
        $client->save();
        Alert::toast('Created Successfully', 'success');
        return redirect()->route('clients.index')
            ->with('message', 'Product created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'idtype' => 'required',
            'idnumber' => 'required',
            'fullname' => 'required',
            'city' => 'nullable',
            'address' => 'nullable',
            'taxcond' => 'required',
            'phones' => 'nullable',
            'group' => 'nullable',
            'taxid' => 'nullable',
            'email' => 'nullable',
        ]);

        $client->update($request->all());
        Alert::toast('Updated Successfully', 'success');
        return redirect()->route('clients.index')
            ->with('message', 'Client updated successfully');
    }

    public function destroy($id)
    {
        // The ajax call handles the errors...
        $client = Client::findOrFail($id);
        $client->delete();

    }

    public function show(Request $request)
    {
        //dd($request);
        $data=Client::all();
        return view('clients.index',compact('data'));
    }

    // search myway
    public function search(Request $request)
    {
        //dd($request);
        $search = $request->get('search');
        $cadena = preg_replace('/\s\s+/', ' ', $search);
        $cadena = preg_replace("@[^A-Za-z0-9\w\ ]@", "", $cadena);
        $cadenas = explode(' ', $cadena);

        $data = Client::where(function ($query) use ($cadenas) {
            foreach ($cadenas as $cadena) {
                $query->where(DB::raw('concat(fullname," ",idnumber)'), 'like', '%' . $cadena . '%');
            }
        })->paginate(10); //toSql();

        return view('clients.index', compact('data') //);
           )->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function select($id){
        $client = DB::table('clients')->where('id', '=', $id)->get();
        session(['clientname' => $client[0]->fullname]);
        session(['clientid' => $id]);
        return redirect()->route('clients.index');
    }
    public function deselect(Request $request){
        if ($request->session()->has('clientid')) {
            $request->session()->forget('clientname');
            $request->session()->forget('clientid');
        }
        return redirect()->route('clients.index');
    }


}
