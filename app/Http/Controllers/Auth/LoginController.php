<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        $pageName = "Login Page";
        return view('auth.login', [ 'pagename' => $pageName]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('username','password'))){
            return back()->with('status','Invalid Login Details');
        }

        return redirect()->route('dashboard'); 
    }

    
}
