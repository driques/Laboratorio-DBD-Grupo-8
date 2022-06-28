<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{   

    /*
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|min:4|max:256|unique:users',
            'password' => 'required|min : 8|max : 20',
        ],
        [ 
        'email.required'=>'Se debe ingresar un email',
        'email.min'=>'Se debe ingresar un email de mas caracteres',
        'email.max'=>'Se debe ingresar un email de menos caracteres',
        'email.unique'=>'Se debe ingresar un email que no este en uso',
        'pasword.required'=>'se debe ingresar una contrasenia',
        'pasword.min'=>'se debe ingresar una contrasenia de 8 o mas caracteres',
        'pasword.required'=>'se debe ingresar una contrasenia de menos de 20 caracteres',
        ]
        );
        if (Auth::attempt($credentials)) {
            //$request->session()->regenerate();
            //return redirect('/');
            return response()->json(['message' => 'Id existe']);
        }
        
        return response()->json(['message' => 'Id nos existe']);
        //return redirect('/home/login2')->withErrors('Los datos ingresados no se encuentran'); 
    }*/

    public function show(){

        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();
    
        if(Auth::validate($credentials)){
        
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
            return $this->authenticated($request,$user);

        }
        return redirect()->to('/')->withErrors('auth.failed');

    }
    public function authenticated(Request $request,$user){

        return redirect('/song/player');
    }
}
    