<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Pay;
use App\Models\Tax;

class PayController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $pagination  = 20;
      
        $taxs    = $request->user()->pays()->when($request->keyword, function ($query) use ($request) {
            if($request->option==1){
                $query->whereHas('tax', function($q) use ($request) {
                    $q->where('taxpayer_name', 'like', "%{$request->keyword}%");
                });
            }else if($request->option==2){
                $query->whereHas('tax', function($q) use ($request) {
                    $q->where('tax_number', 'like', "%{$request->keyword}%");
                });
            }else if($request->option==3){
                $query->whereHas('tax', function($q) use ($request) {
                    $q->where('tax_block', 'like', "%{$request->keyword}%");
                });
            }
        })->where('ispayed', true) ->orderBy('created_at', 'desc')->paginate($pagination);
    
        $taxs->appends($request->only('option','keyword'));

        $pays = $request->user()->pays()->where('ispayed', true)->withSum('tax','value')->get()->sum('tax_sum_value');
        $total = $request->user()->pays()->where('ispayed', true)->count();

    
        return view('dashboard.paid', [
            'taxs' => $taxs,
            'total_pays' => $pays, 
            'total' => $total,
            'title' => 'Data SPPT Terbayar',
            'flag_menu' => 3,
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function unpay(Request $request, Pay $pay)
    {
        //dd($pay->tax->tax_number);
        $request->user()->pays()->where('id', $pay->id)->update([
            'ispayed' => 0
        ]);

        Tax::where('id', $pay->tax_id)->update(['ispayed' => 0]);

        return back()->with('status','Data SPPT '.$pay->tax->tax_number.' atas nama '.$pay->tax->taxpayer_name.' telah berhasil dihapus');
    }
}
