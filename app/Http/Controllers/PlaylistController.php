<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\User;
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
        $playlists = Playlist::where('borrado',false)->get();
        return view('playlist.index',compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playlist.create');
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
                'nombre_playlist.required' => 'Ingresa el nombre de la playlist a crear',
                'nombre_playlist.string' => 'El nombre de la playlist debe ser un string',
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
        $newPlaylist->likes_playlist = 0;
        $newPlaylist->save();

        return redirect('/playlists');
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
        $playlist = Playlist::find($id);
        return view('playlist.edit',array('playlist'=>$playlist));
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
        $playlist = Playlist::find($id);
        if(empty($playlist)){
            return response()->json(['message' => 'Id no existe']);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'nombre_playlist' => 'required|string',
                'likes_playlist' => 'required|integer',
                'playlist_creator' => 'required|integer|exists:users,id',
            ],
            [
                'nombre_playlist.required' => 'Ingresa el nombre de la playlist',
                'nombre_playlist.integer' => 'El id del seguidor debe ser un string',
                'likes_playlist.required' => 'Ingrese la cantidad de likes actualizada',
                'likes_playlist.integer' => 'Debe ser un integer',
                'playlist_creator.required' => 'Ingresa el id del creador de la playlist',
                'playlist_creator.integer' => 'El id del creador debe ser integer',
                'playlist_creator.exists' => 'El id del creador no existe',
                
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        //Faltan las validaciones para saber si el update no se repite
        if ( ($request->nombre_playlist == $playlist->nombre_playlist)&
            ($request->likes_playlist == $playlist->likes_playlist)){
            return response()->json([
                "mensaje" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }

        $playlist->nombre_playlist = $request->nombre_playlist;
        $playlist->likes_playlist = $request->likes_playlist;
        $playlist->save();
        return redirect('/playlists');
    }

    public function delete($id){
        $playlist = Playlist::find($id);
        if(empty($playlist) or $playlist->borrado == true){
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $playlist->borrado = true;
        $playlist->save();
        return redirect('/playlists');
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

    public function searchPlaylistByOwner(Request $request){

        $playlistUser=Playlist::where("playlist_creator",$request->texto)->where('borrado',false)->get();
        return count($playlistUser);



    }
}
