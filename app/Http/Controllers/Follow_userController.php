<?php

namespace App\Http\Controllers;

use App\Models\Follow_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Follow_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $follow_users = Follow_user::where('borrado',false)->get();
        return view('followuser.index',compact('follow_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('followuser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'follower' => 'required|integer|exists:users,id',
                'following' => 'required|integer|exists:users,id',
            ],
            [
                'follower.required' => 'Ingresa el id del seguidor',
                'follower.integer' => 'El id del seguidor debe ser integer',
                'follower.exists' => 'El id del seguidor no existe',
                'following.required' => 'Ingresa el id del seguido',
                'following.integer' => 'El id del seguido debe ser integer',
                'following.exists' => 'El id del seguido no existe',
            ]
        );
        //Caso falla la validación
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newFollow = new Follow_user();
        $newFollow->follower = $request->follower;
        $newFollow->following = $request->following;
        $newFollow->borrado = false;
        $newFollow->save();

        return redirect('/follow_users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $follow = Follow_user::find($id);
        if(empty($follow) or $follow->borrado == true){
            return response()->json(['mensaje' => 'El id no existe']);
        }

        return response($follow, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $follow_user = Follow_user::find($id);
        return view('followuser.edit',array('follow_user'=>$follow_user));
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
        $follow_user = Follow_user::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'follower' => 'required|integer|exists:users,id',
                'following' => 'required|integer|exists:users,id',
                'borrado' => 'required|boolean',
            ],
            [
                'follower.required' => 'Ingresa el id del seguidor',
                'follower.integer' => 'El id del seguidor debe ser integer',
                'follower.exists' => 'El id del seguidor no existe',
                'following.required' => 'Ingresa el id del seguido',
                'following.integer' => 'El id del seguido debe ser integer',
                'following.exists' => 'El id del seguido no existe',
                'borrado.required' => 'Ingresa el estado del borrado',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        //Faltan las validaciones para saber si el update no se repite
        if ( ($request->follower == $follow_user->follower)&
            ($request->following == $follow_user->following)){
            return response()->json([
                "mensaje" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }

        $follow_user->follower = $request->follower;
        $follow_user->following = $request->following;
        $follow_user->borrado = $request->borrado;
        $follow_user->save();
        return redirect('/follow_users');    
          
    }

    //Cabe destacar que se realizan 2 funciones de borrado, uno para un soft y otro para un hard
    //delete sera la funcion que se encargara del delete soft, y destroy la encargada del delete hard.
    //Se toma la funcion delete como si fuera un update para el objeto follow.
    public function delete($id){
        $follow = Follow_user::find($id);
        if(empty($follow) or $follow->borrado == true){
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $follow->borrado = true;
        $follow->save();
        return redirect('/follow_users');
    }

    public function destroy($id)
    {
        $follow = Follow_user::find($id);
        if(empty($follow)){
            return response()->json(['No se encuentra el id ingresado']);
        }
        $follow->delete();
        return response()->json([
            'message' => 'El rol fue destruido con exito de la base de datos',
            'id' => $follow->id,
        ], 201);
        
    }
    public function searchFollowsUser(Request $request){
            $followsUser=Follow_user::where("follower",$request->texto)->where('borrado',false)->get();
            //return array('followsUser'=>$followsUser,count($followsUser));

            return count($followsUser);
            //return array('followsUser'=>$followsUser,count($followsUser));

            //return view("song.nameSong",compact("followsUser"));  
            //return view('/song/search',array('canciones'=>$canciones));
    
        
    }
    public function searchFollowerUser(Request $request){
        $followerUser=Follow_user::where("following",$request->texto)->where('borrado',false)->get();
        return count($followerUser);
        //return array('followerUser'=>$followerUser,count($followerUser));

        //return view("song.nameSong",compact("followsUser"));  
        //return view('/song/search',array('canciones'=>$canciones));

    
}
}