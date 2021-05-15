<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecapController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('dashboard.recap',[
            'flag_menu' => 4,
            'title' => 'Rekapitulasi'
        ]);
    }
}
