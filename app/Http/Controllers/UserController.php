<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Like_song;
use App\Models\Payment_history;
use App\Models\Rol;
use App\Models\Song;
use App\Models\User;
use App\Models\Album;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
        return view('user.index',compact('users'));
        
    }

    public function indexSongs()
    {
        $users = User::where('borrado',false)->get();
        $albums = Album::where('borrado',false)->get();
        $genres = Genre::where('borrado',false)->get();
        $songs = Song::where('borrado',false)->get();
        //return response()->json(['response'=>$users,'response2'=>$albums,'response3'=>$genres,'response4'=>$songs]);
        return view('user.showSongRest',compact('users','albums','genres','songs'));
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
        //$countries = Country::where('borrado', false)->get();
        $rol = Rol::where('borrado',false)->get();
        $users = User::where('borrado', false)->where('id_rol', 0)->get();
        $validator = Validator::make(
            $request->all(),[
                'name' => 'required|min : 2|max : 20',
                'email' => 'required|min:4|max:256|unique:users',
                'password' => 'required|min : 8|max : 20',
                'birth_year' => 'required|date:Y-m-d',
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
        $newUser->password = Hash::make($request->password);
        $newUser->plan = TRUE;
        $newUser->birth_year = $request->birth_year;
        $birthDate = $request->birth_year;
        $birthDate = explode("-", $birthDate);
         //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
        ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));
        $newUser->edad = $age;
        $newUser->id_pais = $request->id_pais;
        $newUser->id_rol = $request->id_rol;
        //El rol con id 2 es un usuario normal, el con id 1 es admin
        $newUser->id_rol = $rol[1]->id;
        $newUser->borrado = FALSE;
        $newUser-> save();
        echo '<script>alert("Usuario creado con exito!")</script>';
        $users = User::where('borrado',false)->get();
        return view('home/home',compact('users'));
       
    }



    public function storeWithPay(Request $request)
    {
        //$countries = Country::where('borrado', false)->get();
        $rol = Rol::where('borrado',false)->get();
        $users = User::where('borrado', false)->where('id_rol', 0)->get();
        $payment = Payment_history::where('borrado',false)->get();
        $validator = Validator::make(
            $request->all(),[
                'name' => 'required|min : 2|max : 20',
                'email' => 'required|min:4|max:256|unique:users',
                'password' => 'required|min : 8|max : 20',
                'birth_year' => 'required|date:Y-m-d',
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

        
        $newCard = new Payment_history();
        $newCard->cardOwner = $request->cardOwner;
        $newCard->creditCard = $request->creditCard;
        $newCard->cvv=$request->cvv;
        $newCard->month=$request->month;
        $newCard->year=$request->year;
        $newCard->metodo_pago='Credito';
        $newCard->borrado = false;
        $newCard->user_pay=$request->email;
        $newCard->save();
        
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->plan = TRUE;
        $newUser->birth_year = $request->birth_year;
        $newUser->id_pais = $request->id_pais;
        $newUser->id_rol = $request->id_rol;
        //El rol con id 2 es un usuario normal, el con id 1 es admin
        //EL ROL NO DEBE ESTAR BORRADO O NO FUNCIONARA, ASI QUE DEBE EXISTIR SI O SI EN LA BASE DE DATOS 
        $newUser->id_rol =$rol[1]->id;
        $newUser->borrado = FALSE;
        $newUser-> save();

        echo '<script>alert("Usuario creado con exito!")</script>';
        $users = User::where('borrado',false)->get();
        return view('home/home',compact('users'));
       
    }




    public function store2(Request $request)
    {
        $countries = Country::where('borrado', false)->get();
       
        $users = User::where('borrado', false)->where('id_rol', 0)->get();
        $validator = Validator::make(
            $request->all(),[
                'name' => 'required|min : 2|max : 20',
                'email' => 'required|min:4|max:256|unique:users',
                'password' => 'required|min : 8|max : 20',
                'birth_year' => 'required|date:Y-m-d',
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
        $newUser->password = Hash::make($request->password);
        $newUser->plan = TRUE;
        $newUser->birth_year = $request->birth_year;
        $newUser->id_pais = $request->id_pais;
        $newUser->id_rol = $request->id_rol;
       // $newUser->id_rol = $myRol[0]->rol;
        //Esta variable hay que sacarla directamente de la tabla
                                //de roles, o dejara el error de que falta una llave foranea, pero aun no cacho
                                //como hacerlo
        $newUser->borrado = FALSE;
        $newUser-> save();
        $users = User::where('borrado',false)->get();
        return redirect('/users');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(empty($user) or $user->borrado == true){
            return response()->json(['message' => 'El id no existe.']);
        }
        return response($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user/edit', compact('user'));
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
    
        if($validator->fails()){
            return response($validator->errors());
        }
        $user = User::find($id);
        if(empty($user)){
            return response()->json(['message' => 'El id no existe.']);
        }
        if ($request->name == $user->name){
            return response()->json([
                "message" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->birth_year= $request->birth_year;
        $user->id_pais=$request->id_pais;

        $user->save();
        //dd($user);
        return view('/home/home');
        /*return response()->json([
            'message' => 'Se actualizaron los datos',
            'id' => $user->id,
            'name' => $user->name
        ], 200);*/
    }

    public function update3(Request $request, $id)
    {
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
    
        if($validator->fails()){
            return response($validator->errors());
        }
        $user = User::find($id);
        if(empty($user)){
            return response()->json(['message' => 'El id no existe.']);
        }
        if ($request->name == $user->name){
            return response()->json([
                "message" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->birth_year= $request->birth_year;
        $user->id_pais=$request->id_pais;

        $user->save();
        return redirect('/users');
    }


    public function update2(Request $request, $id)
    {
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
    
        if($validator->fails()){
            return response($validator->errors());
        }
        $user = User::find($id);
        if(empty($user)){
            return response()->json(['message' => 'El id no existe.']);
        }
        if ($request->name == $user->name){
            return response()->json([
                "message" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->birth_year= $request->birth_year;
        $user->id_pais=$request->id_pais;

        $user->save();
        //dd($user);
        return view('user/editProfile',compact('user'));
        /*return response()->json([
            'message' => 'Se actualizaron los datos',
            'id' => $user->id,
            'name' => $user->name
        ], 200);*/
    }

    //Cabe destacar que se realizan 2 funciones de borrado, uno para un soft y otro para un hard
    //delete sera la funcion que se encargara del delete soft, y destroy la encargada del delete hard.
    //Se toma la funcion delete como si fuera un update para el objeto user.
    public function delete($id){
        $user = User::find($id);
        if(empty($user) or $user->borrado == true){
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $user->borrado = true;
        $user->save();
        return redirect('/users');
    }


    /*
    public function destroy($id)
    {
        $user = User::find($id);
        $song = Song::where('id_artist',$id)->get();
        
        
        if(empty($user)){
            return response()->json(['No se encuentra el id ingresado']);
        }
        if(!empty($song)){

            $song->borrado = TRUE;
        }
        $user->delete();
        return response()->json([
            'message' => 'El rol fue destruido con exito de la base de datos',
            'id' => $user->id,
        ], 201);
        
    }*/
}
