<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;

class TaxController extends Controller
{
    public function index(Request $request)
    {  
        $pagination  = 20;
      
        $taxs    = Tax::when($request->keyword, function ($query) use ($request) {
            if($request->option==1){
                $query
                ->where('taxpayer_name', 'like', "%{$request->keyword}%");
            }else if($request->option==2){
                $query
                ->where('tax_number', 'like', "%{$request->keyword}%");
            }else if($request->option==3){
                $query
                ->where('tax_block', 'like', "%{$request->keyword}%");
            }
        })->where('ispayed', 'false')->paginate($pagination);
    
        $taxs->appends($request->only('option','keyword'));
    
        return view('dashboard.unpaid', [
            'taxs' => $taxs,
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);

        //$taxs = Tax::paginate(20);
        //return view('dashboard.unpaid', ['taxs' => $taxs]);
    }

    public function paytax(Request $request){
        dd($request);
    }
}
