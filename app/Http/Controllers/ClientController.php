<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;
use App\taxcondition;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $data = client::paginate(15);
        return view('persons.index', compact('data'));
    }

    // To create a new warehouse
    public function create()
    {
        $data = new Client();
        $taxcondition = taxcondition::all();
        return view('persons.createedit', compact('data'), compact('taxcondition'));
    }

    // To update an existing warehouse (load to edit)
    public function edit($id)
    {
        $data = Client::find($id);
        $taxcondition = taxcondition::all();
        // Load user/createOrUpdate.blade.php view
        return view('persons.createedit', compact('data'),compact('taxcondition'));
    }

}
