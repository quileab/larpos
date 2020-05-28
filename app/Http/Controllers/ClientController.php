<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taxcondition;

class ClientController extends Controller
{
    public function edit(Request $request)
    {
        $taxcondition = taxcondition::all();
        return view('persons.create', compact('taxcondition'));
    }
}
