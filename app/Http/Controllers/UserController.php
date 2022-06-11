<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('borrado',false)->get();
        if($users->isEmpty()){
            return response()->json(['response'=>'no se encuentran usuarios registrados',]);
        }
        return response($users,200);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countries = Country::where('borrado', false)->get();
        $rol = Rol::where('borrado',false)->where('rol', 0)->get();
       
        $users = User::where('borrado', false)->where('id_rol', 0)->get();
        $validator = Validator::make(
            $request->all(),[
                'name' => 'required|min : 2|max : 20',
                'email' => 'required|min:4|max:256|unique:users',
                'password' => 'required|min : 8|max : 20',
                'birth_year' => 'required|date:y-m-d',
                'id_pais' => 'required|integer|exists:countries,id',
            ],
            ['name.required'=>'Se debe ingresar un nombre.',
            'name.min'=>'Se debe ingresar un nombre de mas caracteres.',
            'name.max'=>'Se debe ingresar un nombre de menos caracteres.',
            'email.required'=>'Se debe ingresar un email',
            'email.min'=>'Se debe ingresar un email de mas caracteres',
            'email.max'=>'Se debe ingresar un email de menos caracteres',
            'email.unique'=>'Se debe ingresar un email que no este en uso',
            'pasword.required'=>'se debe ingresar una contrasenia',
            'pasword.min'=>'se debe ingresar una contrasenia de 8 o mas caracteres',
            'pasword.required'=>'se debe ingresar una contrasenia de menos de 20 caracteres',
            'birth_year.required'=>'se debe ingresar una fecha de nacimiento',
            'birth_year.required'=>'se debe ingresar una fecha de nacimiento formato d-m-y',
            'id_pais.integer' => 'El id del pais debe ser un integer.',
            'id_pais.exists' => 'No se encuentra el id del pais',
            ]
            );
        //Se verifica que no falle el ingreso de datos
        if($validator->fails()){
                return response($validator->errors(), 400);
            }
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;
        $newUser->plan = TRUE;
        $newUser->birth_year = $request->birth_year;
        $newUser->id_pais = $request->id_pais;
        //$newUser->id_rol = $rol;//Esta variable hay que sacarla directamente de la tabla
                                //de roles, o dejara el error de que falta una llave foranea, pero aun no cacho
                                //como hacerlo
        $newUser->borrado = FALSE;
        $newUser-> save();
        //return response()->json(['Se ha creado el usuario'],201);
        return response()->json(['rol'=>$rol]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
