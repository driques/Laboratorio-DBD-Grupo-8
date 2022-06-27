<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required|min : 8|max : 20'],
        ]);
 
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect('/')->with('status','correcto');
        }
 
        return redirect()->withErrors('Los datos ingresados no se encuentran'); 
    }
}
    