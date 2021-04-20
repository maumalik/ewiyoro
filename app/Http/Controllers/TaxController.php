<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;

class TaxController extends Controller
{
    public function index()
    {
        $taxs = Tax::paginate(20);
        return view('dashboard.unpaid', ['taxs' => $taxs]);
    }
}
