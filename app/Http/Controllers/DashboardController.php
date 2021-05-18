<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use App\Models\Pay;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $taxes = Tax::where('year', '2021')->get();
        $pays = Pay::where('ispayed',true)->withSum('tax','value')->get();


        return view('dashboard.dashboard', [
            'taxes' => $taxes,
            'pays' => $pays,
            'title' => 'Dashboad',
            'flag_menu' => 1,
        ]);
    }
}
