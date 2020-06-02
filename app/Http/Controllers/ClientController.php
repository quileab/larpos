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

    public function edit(Request $request)
    {
        $taxcondition = taxcondition::all();
        return view('persons.create', compact('taxcondition'));
    }
}
