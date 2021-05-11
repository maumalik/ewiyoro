<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;

class TaxController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    } 

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
        })->paginate($pagination);
    
        $taxs->appends($request->only('option','keyword'));
    
        return view('dashboard.unpaid', [
            'taxs' => $taxs,
            'title' => 'Data SPPT',
            'flag_menu' => 2,
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);

    }

    public function paytax(Request $request, Tax $tax){
        $request->user()->pays()->create([
            'tax_id' => $tax->id,
            'ispayed' => 1
        ]);

        Tax::where('id', $tax->id)->update(['ispayed' => 1]);

        return back()->with('status','Data SPPT '.$tax->tax_number.' telah berhasil dibayarkan');
    }
}
