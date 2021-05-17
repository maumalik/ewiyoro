<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; 
use App\Models\Pay;

class RecapController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $pays = Pay::where('ispayed',true)
                ->withSum('tax', 'value')
                ->paginate(10)
                ->groupBy(function($item) {
                    return $item->created_at->format('d-m-Y');
                });

        $pays_total = Pay::where('ispayed', true)->withSum('tax','value')->get()->sum('tax_sum_value');
        $total = Pay::where('ispayed', true)->count();

        return view('dashboard.recap',[
            'pays' => $pays,
            'total_pays' => $pays_total, 
            'total' => $total,
            'flag_menu' => 4,
            'title' => 'Rekapitulasi'
        ]);
    }

    public function detail(Request $request, $date){
        return view('dashboard.recapdetail',[
            'date' => $date,
            'flag_menu' => 4,
            'title' => 'Rekapitulasi'
        ]);
    }
}
