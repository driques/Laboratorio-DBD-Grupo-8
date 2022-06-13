<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genre;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::where('borrado',false)->get();
        if($songs->isEmpty()){
            return response()->json(['response'=>'no se encuentran canciones registradas',]);
        }
        return response($songs,200);
        //
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
        $myUser = User::where('borrado', false)->get();
        $myGenre = Genre::where('borrado',false)->get();
        $myAlbum = Album::where('borrado',false)->get();
        $validator = Validator::make(
            $request->all(),[
                'nombre_cancion' => 'required|min : 2|max : 20',
                'restriccion_etaria' => 'required|min:0|max:18',
                'id_album' => 'required|integer|exists:albums,id',
                'id_genre' => 'required|integer|exists:genres,id',
                'id_user' => 'required|integer|exists:users,id',
                'song_duration' => 'required|integer',
            ],['nombre_cancion.required'=>'Se debe ingresar un nombre.',
            'nombre_cancion.min'=>'Se debe ingresar un nombre de mas caracteres.',
            'nombre_cancion.max'=>'Se debe ingresar un nombre de menos caracteres.',
            'restriccion_etaria.required'=>'Se debe ingresar restriccion etaria',
            'restriccion_etaria.min'=>'las restricciones deben ser iguales o mayores a 0',
            'restriccion_etaria.max'=>'las restricciones deben ser iguales o menores a 18',
            'id_album.integer' => 'El id del album debe ser un integer.',
            'id_album.exists' => 'No se encuentra el id del album',
            'id_genre.integer' => 'El id del genero debe ser un integer.',
            'id_genre.exists' => 'No se encuentra el id del genero',
            'id_artist.integer' => 'El id del usuario debe ser un integer.',
            'id_artist.exists' => 'No se encuentra el id del usuario',
            'song_duration.required' => 'Se debe ingresar una duracion de cancion',
            'song_duration.integer' => 'Se debe ingresar un numero de segundos(entero)',
            ]
            );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }
        $newSong=new Song();
        $newSong->nombre_cancion = $request->nombre_cancion;
        $newSong->likes = 0;
        $newSong->reproducciones = 0;
        $newSong->restriccion_etaria= $request->restriccion_etaria;
        $newSong->id_album = $request->id_album;
        $newSong->id_genre = $request->id_genre;
        $newSong->id_artist = $request->id_user;
        $newSong->song_duration = $request->song_duration;
        $newSong->borrado = FALSE;
        $newSong-> save();
        return response()->json(['Se ha creado la canción'],201);
        //
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
        $song = Song::find($id);
        if(empty($song) or $song->borrado == true){
            return response()->json(['message' => 'El id no existe.']);
        }
        return response($song, 200);
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
        $myGenre = Genre::where('borrado',false)->get();
        $myAlbum = Album::where('borrado',false)->get();
        $validator = Validator::make(
            $request->all(),[
                'nombre_cancion' => 'required|min : 2|max : 20',
                'restriccion_etaria' => 'required|min:0|max:18',
                'likes' => 'required|min:0',
                'reproducciones' => 'required|min:0',
                'id_album' => 'required|integer|exists:albums,id',
                'id_genre' => 'required|integer|exists:genres,id',
 
            ],['nombre_cancion.required'=>'Se debe ingresar un nombre.',
            'nombre_cancion.min'=>'Se debe ingresar un nombre de mas caracteres.',
            'nombre_cancion.max'=>'Se debe ingresar un nombre de menos caracteres.',
            'likes.required'=>'Se debe ingresar likes',
            'likes.min'=>'los likes deben ser iguales o mayores a 0',
            'reproducciones.required'=>'Se debe ingresar reproducciones',
            'reproducciones.min'=>'las reproducciones deben ser iguales o mayores a 0',
            'restriccion_etaria.required'=>'Se debe ingresar restriccion etaria',
            'restriccion_etaria.min'=>'las restricciones deben ser iguales o mayores a 0',
            'restriccion_etaria.max'=>'las restricciones deben ser iguales o menores a 18',
            'id_album.integer' => 'El id del album debe ser un integer.',
            'id_album.exists' => 'No se encuentra el id del album',
            'id_genre.integer' => 'El id del genero debe ser un integer.',
            'id_genre.exists' => 'No se encuentra el id del genero',
            ]
            );
        if($validator->fails()){
            return response($validator->errors());
        }
        $song = Song::find($id);
        if(empty($song)){
            return response()->json(['message' => 'El id no existe.']);
        }
        if ($request->nombre_cancion == $song->nombre_cancion){
            return response()->json([
                "message" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }
        $song->nombre_cancion = $request->nombre_cancion;
        $song->restriccion_etaria = $request->restriccion_etaria;
        $song->likes = $request->likes;
        $song->reproducciones = $request->reproducciones;
        $song->id_album = $request->id_album;
        $song->id_genre = $request->id_genre;

        $song->save();
        return response()->json([
            'message' => 'Se actualizaron los datos',
            'id' => $song->id,
            'nombre_cancion' => $song->nombre_cancion
        ], 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $song = Song::find($id);
        if(empty($song) or $song->borrado == true){
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $song->borrado = true;
        $song->save();
        return response()->json([
            'message' => 'El user fue eliminado correctamente',
            'id' => $song->id,
        ], 201);
    }

    public function destroy($id)
    {
        $song = Song::find($id);
        if(empty($song)){
            return response()->json(['No se encuentra el id ingresado']);
        }
        $song->delete();
        return response()->json([
            'message' => 'El rol fue destruido con exito de la base de datos',
            'id' => $song->id,
        ], 201);
        
    }
}
