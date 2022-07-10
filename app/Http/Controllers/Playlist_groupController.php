<?php

namespace App\Http\Controllers;

use App\Models\Playlist_group;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Playlist_groupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlist_groups = Playlist_group::where('borrado',false)->get();
        if($playlist_groups->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentra la agrupacion de canciones asociada']);
        }
        return view('playlistGroup.index', compact('playlist_groups'));
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
                'id_cancion' => 'required|integer|exists:songs,id',
                'id_playlist' => 'required|integer|exists:playlists,id',
            ],
            [
                'id_cancion.required' => 'Ingresa el id de la cancion',
                'id_cancion.integer' => 'La id de la cancion debe ser integer',
                'id_cancion.exists' => 'El id de la cancion no existe',
                'id_playlist.required' => 'Ingresa el id de la playlist',
                'id_playlist.integer' => 'El id de la playlist debe ser integer',
                'id_playlist.exists' => 'El id de la playlist no existe',
            ]
        );
        //Caso falla la validación
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newPlaylistGroup = new Playlist_group();
        $newPlaylistGroup->id_cancion = $request->id_cancion;
        $newPlaylistGroup->id_playlist = $request->id_playlist;
        $newPlaylistGroup->borrado = false;
        $newPlaylistGroup->save();

        return redirect('/playlistGroups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $playlist_group = Playlist_group::find($id);
        if(empty($playlist_group) or $playlist_group->borrado == true){
            return response()->json(['mensaje' => 'El id no existe']);
        }

        return response($playlist_group, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $playlist_group = Playlist_group::find($id);
        return view('playlistGroup.edit', compact('playlist_group'));
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
        $updatePlaylistGroup = Playlist_group::find($id);
        if(empty($updatePlaylistGroup)){
            return response()->json(['message' => 'Id no existe']);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'id_cancion' => 'required|integer|exists:songs,id',
                'id_playlist' => 'required|integer|exists:playlists,id',
            ],
            [
                'id_cancion.required' => 'Ingresa el id de la cancion',
                'id_cancion.integer' => 'La id de la cancion debe ser integer',
                'id_cancion.exists' => 'El id de la cancion no existe',
                'id_playlist.required' => 'Ingresa el id de la playlist',
                'id_playlist.integer' => 'El id de la playlist debe ser integer',
                'id_playlist.exists' => 'El id de la playlist no existe',
            ]
        );
        //Caso falla la validación
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        //Faltan las validaciones para saber si el update no se repite
        if ( ($request->id_cancion == $updatePlaylistGroup->id_cancion)&
            ($request->id_playlist == $updatePlaylistGroup->id_playlist)){
            return response()->json([
                "mensaje" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }

        $updatePlaylistGroup->id_cancion = $request->id_cancion;
        $updatePlaylistGroup->id_playlist = $request->id_playlist;
        $updatePlaylistGroup->save();

        return redirect('/playlistGroups');
    }

    public function delete($id){
        $playlist_group = Playlist_group::find($id);
        if(empty($playlist_group) or $playlist_group->borrado == true){
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $playlist_group->borrado = true;
        $playlist_group->save();
        return redirect('/playlistGroups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $playlist_group = Playlist_group::find($id);
        if(empty($playlist_group)){
            return response()->json(['No se encuentra el id ingresado']);
        }
        $playlist_group->delete();
        return response()->json([
            'message' => 'El rol fue eliminado con exito de la base de datos(hard delete)',
            'id' => $playlist_group->id,
        ], 201);
    }
}
