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

        $pays_total = Pay::whereDate('created_at', '=', date($dt))->where('ispayed', true)->withSum('tax','value')->get()->sum('tax_sum_value');
        $total = Pay::whereDate('created_at', '=', date($dt))->where('ispayed', true)->count();
  
        return view('dashboard.recapdetail',[
            'pays' => $pays,
            'total_pays' => $pays_total, 
            'total' => $total,
            'date' => $date,
            'flag_menu' => 4,
            'title' => 'Rekapitulasi'
        ]);
    }

    public function subdetail(Pay $pay)
    {
        $date = $pay->created_at->format('d-m-Y');
        $name = $pay->user->name;

        $pays = Pay::whereDate('created_at', '=', date(Carbon::parse($date)))
        ->where('user_id', $pay->user_id)
        ->where('ispayed', true)
        ->withSum('tax', 'value')
        ->paginate(10);

        $pay = Pay::whereDate('created_at', '=', date(Carbon::parse($date)))
        ->where('user_id', $pay->user_id)
        ->where('ispayed', true)
        ->withSum('tax', 'value')
        ->get();

        return view('dashboard.recapsubdetail',[
            'total_pays' => $pay->sum('tax_sum_value'),
            'total' => $pay->count(),
            'pays' => $pays,
            'name' => $name,
            'date' => $date,
            'flag_menu' => 4,
            'title' => 'Rekapitulasi'
        ]);
    }
}
