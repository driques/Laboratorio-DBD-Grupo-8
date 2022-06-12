<?php

namespace App\Http\Controllers;

use App\Models\Like_song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Like_songController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_like_song = Like_song::where('borrado',false)->get();
        if($active_like_song->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentra ningun like a cancion activo']);
        }
        return response($active_like_song, 200);
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
                'liker' => 'required|integer|exists:users,id',
                'liked' => 'required|integer|exists:songs,id',
            ],
            [
                'liker.required' => 'Ingresa el id del usuario que gusta de la',
                'liker.integer' => 'El id del que gusta de la cancion debe ser integer',
                'liker.exists' => 'El id del que gusta de la cancion no existe',
                'liked.required' => 'Ingresa el id de la cancion gustada',
                'liked.integer' => 'El id de la cancion debe ser integer',
                'liked.exists' => 'El id de la cancion no existe',
            ]
        );
        //Caso falla la validación
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newLike = new Like_song();
        $newLike->user_like = $request->liker;
        $newLike->id_song = $request->liked;
        $newLike->borrado = false;
        $newLike->save();

        return response()->json([
            'message' => 'El usuario a gustado de la cancion',
            'liker'=> $newLike->user_like,
            'liked' =>$newLike->id_song,
            'id' => $newLike->id,
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
        $like = Like_song::find($id);
        if(empty($like) or $like->borrado == true){
            return response()->json(['mensaje' => 'El id no existe']);
        }

        return response($like, 200);
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
                'liker' => 'required|integer|exists:users,id',
                'liked' => 'required|integer|exists:song,id',
            ],
            [
                'liker.required' => 'Ingresa el id del seguidor',
                'liker.integer' => 'El id del seguidor debe ser integer',
                'liker.exists' => 'El id del seguidor no existe',
                'liked.required' => 'Ingresa el id del seguido',
                'liked.integer' => 'El id del seguido debe ser integer',
                'liked.exists' => 'El id del seguido no existe',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $updateLike = Like_song::find($id);
        if(empty($updateLike)){
            return response()->json(['message' => 'Id no existe']);
        }
        //Faltan las validaciones para saber si el update no se repite
        if ( ($request->liker == $updateLike->liker)|
            ($request->liked == $updateLike->liked)){
            return response()->json([
                "mensaje" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }

        $updateLike->liker = $request->liker;
        $updateLike->liked = $request->liked;
        $updateLike->save();
        return response()->json([
                'mensaje' => 'Se modifico Like',
                'id' => $updateLike->id,
            ], 201);
    }

    public function delete($id){
        $like = Like_song::find($id);
        if(empty($like) or $like->borrado == true){
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $like->borrado = true;
        $like->save();
        return response()->json([
            'message' => 'El user fue eliminado correctamente(soft delete)',
            'id' => $like->id,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $like = Like_song::find($id);
        if(empty($like)){
            return response()->json(['No se encuentra el id ingresado']);
        }
        $like->delete();
        return response()->json([
            'message' => 'La relacion fue destruida con exito de la base de datos',
            'id' => $like->id,
        ], 201);
    }
}
