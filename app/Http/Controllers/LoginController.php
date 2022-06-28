<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;

class LoginController extends Controller
{   
    /*
    public function store(){
        if(auth()->attempt(request(['correo_usuario','password'])) == false){
            return back()->withErrors([
                'message' => 'Email o contraseña incorrecta, por favor intentar de nuevo',
            ]);
        }
        return redirect()->to('/song/player');
    }*/
    
    public function authenticate(Request $request)
    {
         
        if (Auth::attempt(request(['email','password']))){
            $request->session()->regenerate();
            return redirect('/');
           // return response()->json(['message' => 'Id existe']);
        }
        
        //return response()->json(['message' => 'Id nos existe']);
        return redirect('/home/login2')->withErrors('Los datos ingresados no se encuentran'); 
    }

    /*public function show(){

        return view('auth.login');
    }*/

    /*public function login(LoginRequest $request){
        $credentials = $request->getCredentials();
    
        if(Auth::validate($credentials)){
        
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
            return $this->authenticated();

        }
        return redirect()->to('/')->withErrors('auth.failed');

    }
    public function authenticated(){

        return redirect('/song/player');
    }*/
}
    