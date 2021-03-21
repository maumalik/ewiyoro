<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $pageName = "Register Page";
        return view('auth.register', [ 'name' => $pageName]);
    }

    public function store(Request $requeset)
    {
        $requeset->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:username',
            'email' => 'required|max:255|unique:email',
            'password' => 'required'
        ]);

        dd($request);
    }
}
