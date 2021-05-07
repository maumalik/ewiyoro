<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pay;
use App\Models\Tax;

class PayController extends Controller
{
    public function index(Request $request)
    {
        $pagination  = 20;
      
        $taxs    = Pay::when($request->keyword, function ($query) use ($request) {
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
        })->where('user_id',auth()->user()->id)->paginate($pagination);
    
        $taxs->appends($request->only('option','keyword'));

        //dd($taxs);
    
        return view('dashboard.paid', [
            'taxs' => $taxs,
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }
}
