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
                ->get()
                ->groupBy(function($item) {
                    return $item->created_at->format('d-m-Y');
                });

        $pays_total = Pay::where('ispayed', true)->withSum('tax','value')->get()->sum('tax_sum_value');
        $total = Pay::where('ispayed', true)->count();

        //dd($pays);

        return view('dashboard.recap',[
            'pays' => $pays,
            'total_pays' => $pays_total, 
            'total' => $total,
            'flag_menu' => 4,
            'title' => 'Rekapitulasi'
        ]);
    }

    public function detail(Request $request, $date){
        $dt = Carbon::parse($date);
        $pays = Pay::whereDate('created_at', '=', date($dt))
                ->where('ispayed', true)
                ->with('user:id,name')
                ->withSum('tax', 'value')
                ->get()
                ->groupBy('user_id');
                

        //dd($pays);
        return view('dashboard.recapdetail',[
            'pays' => $pays,
            'date' => $date,
            'flag_menu' => 4,
            'title' => 'Rekapitulasi'
        ]);
    }
}
