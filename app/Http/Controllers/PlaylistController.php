<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use Illuminate\Support\Facades\Validator;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlist = Playlist::where('borrado',false)->get();
        if($playlist->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentra la playlist']);
        }
        return response($playlist, 200);
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
                'nombre_playlist' => 'required|string',
                'playlist_creator' => 'required|integer|exists:users,id',
            ],
            [
                'nombre_playlist.required' => 'Ingresa el nombre de la playlist',
                'nombre_playlist.integer' => 'El id del seguidor debe ser un string',
                'playlist_creator.required' => 'Ingresa el id del creador de la playlist',
                'playlist_creator.integer' => 'El id del creador debe ser integer',
                'playlist_creator.exists' => 'El id del creador no existe',
            ]
        );
        //Caso falla la validación
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newPlaylist = new Playlist();
        $newPlaylist->nombre_playlist = $request->nombre_playlist;
        $newPlaylist->playlist_creator = $request->playlist_creator;
        $newPlaylist->borrado = false;
        $newPlaylist->likes = 0;
        $newPlaylist->save();

        return response()->json([
            'message' => 'Playlist creada con exito',
            'nombre_playlist'=> $newPlaylist->nombre_playlist,
            'playlist_creator' =>$newPlaylist->playlist_creator,
            'id' => $newPlaylist->id,
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
        $playlist = Playlist::find($id);
        if(empty($playlist) or $playlist->borrado == true){
            return response()->json(['mensaje' => 'El id no existe']);
        }

        return response($playlist, 200);
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
                'nombre_playlist' => 'required|string',
                'playlist_creator' => 'required|integer|exists:users,id',
            ],
            [
                'nombre_playlist.required' => 'Ingresa el nombre de la playlist',
                'nombre_playlist.integer' => 'El id del seguidor debe ser un string',
                'playlist_creator.required' => 'Ingresa el id del creador de la playlist',
                'playlist_creator.integer' => 'El id del creador debe ser integer',
                'playlist_creator.exists' => 'El id del creador no existe',
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $updatePlaylist = Playlist::find($id);
        if(empty($updatePlaylist)){
            return response()->json(['message' => 'Id no existe']);
        }
        //Faltan las validaciones para saber si el update no se repite
        if ( ($request->nombre_playlist == $updatePlaylist->nombre_playlist)|
            ($request->playlist_creator == $updatePlaylist->playlist_creator)){
            return response()->json([
                "mensaje" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }

        $updatePlaylist->nombre_playlist = $request->nombre_playlist;
        $updatePlaylist->playlist_creator = $request->playlist_creator;
        $updatePlaylist->save();
        return response()->json([
                'mensaje' => 'Se modifico la playlist',
                'id' => $updatePlaylist->id,
            ], 201);
    }

    public function delete($id){
        $playlist = Playlist::find($id);
        if(empty($playlist) or $playlist->borrado == true){
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $playlist->borrado = true;
        $playlist->save();
        return response()->json([
            'message' => 'La playlist fue eliminada correctamente(soft delete)',
            'id' => $playlist->id,
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
        $playlist = Playlist::find($id);
        if(empty($playlist)){
            return response()->json(['No se encuentra el id ingresado']);
        }
        $playlist->delete();
        return response()->json([
            'message' => 'La playlist fue eliminaca correctamente(hard delete)',
            'id' => $playlist->id,
        ], 201);
    }
}
