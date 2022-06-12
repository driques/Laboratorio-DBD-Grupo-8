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
        $active_follow = Follow_user::where('borrado',false)->get();
        if($active_follow->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentra los follows']);
        }
        return response($active_follow, 200);
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

        return response()->json([
            'message' => 'El usuario a seguido al otro',
            'follower'=> $newFollow->follower,
            'following' =>$newFollow->following,
            'id' => $newFollow->id,
        ], 201);
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
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $updateFollow = Follow_user::find($id);
        if(empty($updateFollow)){
            return response()->json(['message' => 'Id no existe']);
        }

        if ( ($request->follower == $updateFollow->follower)|
            ($request->following == $updateFollow->following)){
            return response()->json([
                "mensaje" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }

        $updateFollow->follower = $request->follower;
        $updateFollow->following = $request->following;
        $updateFollow->save();
        return response()->json([
                'mensaje' => 'Se modifico follow',
                'id' => $updateFollow->id,
            ], 201);       
          
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
        return response()->json([
            'message' => 'El user fue eliminado correctamente',
            'id' => $follow->id,
        ], 201);
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
}
