<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $pageName = "Login Page";
        return view('auth.login', [ 'name' => $pageName]);
    }

    public function store(Request $request)
    {

    }

    
}
