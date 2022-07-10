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
        $datosCanciones=Song::all(); 
        return view('song/index',array('datosCanciones'=>$datosCanciones));
        //return response($songs,200,$datosCanciones);
        //
    }
    public function ranking()
    {
        
        $ranking = Song::where('borrado',false)->orderBy('reproducciones', 'desc')->limit(10)->get();
        if($ranking->isEmpty()){
            return response()->json(['response'=>'no se encuentran canciones registradas',]);
        }
    
        return view('home/ranking',array('ranking'=>$ranking));
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
                'id_artist' => 'required|integer|exists:users,id',
                'song_duration' => 'required|integer',
                'url_cancion'=>'required'
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
        $newSong->id_artist = $request->id_artist;
        $newSong->song_duration = $request->song_duration;
        $newSong->borrado = FALSE;
        $newSong->url_cancion=$request->url_cancion;
        $newSong-> save();
        $songs = Song::where('borrado',false)->get();
        return view('home/home',compact('songs'));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nombre_cancion)
    {
        //
        $song = Song::find($nombre_cancion);
        if(empty($song) or $song->borrado == true){
            return response()->json(['message' => 'La cancion no existe.']);
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
        $song = Song::find($id);
        return view('song.edit',array('song'=>$song));
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
                'id_artist' => 'required|integer|exists:users,id',
                'song_duration' => 'required|integer',
                'url_cancion' => 'required',
 
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
            'id_artist.integer' => 'El id del usuario debe ser un integer.',
            'id_artist.exists' => 'No se encuentra el id del usuario',
            'song_duration.required' => 'Se debe ingresar una duracion de cancion',
            'song_duration.integer' => 'Se debe ingresar un numero de segundos(entero)',
            ]
            );
        if($validator->fails()){
            return redirect("/song/edit?error=3");
        }
        $song = Song::find($id);
        if(empty($song)){
            return redirect("/song/edit?error=2");
        }
        if ($request->nombre_cancion == $song->nombre_cancion){
            return redirect("/song/edit?error=1");
        }
        $song->nombre_cancion = $request->nombre_cancion;
        $song->restriccion_etaria = $request->restriccion_etaria;
        $song->likes = $request->likes;
        $song->reproducciones = $request->reproducciones;
        $song->id_album = $request->id_album;
        $song->id_genre = $request->id_genre;
        $song->id_artist = $request->id_artist;
        $song->song_duration= $request->song_duration;
        $song->url_cancion= $request->url_cancion;
        $song->save();
        return redirect("/song/edit?pass=1");
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
        return redirect('/song/edit');
    }

    public function destroy($id)
    {
        $song = Song::find($id);
        if(empty($song)){
            return response()->json(['No se encuentra el id ingresado']);
        }
        $song->delete();
        return response()->json([
            'message' => 'La canción fue destruido con exito de la base de datos',
            'id' => $song->id,
        ], 201);
        
    }
    public function search(Request $request){
        $canciones=Song::where("nombre_cancion",'ilike',$request->texto."%")->where('borrado',false)->take(10)->get();
        //return array('canciones'=>$canciones);
        return view("song.nameSong",compact("canciones"));  
        //return view('/song/search',array('canciones'=>$canciones));

    }
    public function searchNavbar(Request $request){
        $canciones=Song::where("nombre_cancion",'ilike',$request->texto."%")->where('borrado',false)->take(10)->get();
        $usuarios=User::where("name",'ilike',$request->texto."%")->where('borrado',false)->take(10)->get();
        //return array('canciones'=>$canciones);
        return view("song.navSong",compact("canciones"),compact("usuarios"));  
        //return view('/song/search',array('canciones'=>$canciones));

    }
    public function getSongsByUser(Request $request){
        $canciones=Song::where("id_artist","=",strval($request->id_artist))->where('borrado',false)->get();
        return view('user.songsUser',array('cancionesUser'=>$canciones));

    }
    public function playQuantity($id){
        $song = Song::find($id);
        $song->reproducciones = $song->reproducciones+1;
        $song->save();
        return response()->json(["message"=>$song->reproducciones]);
    }
    public function category(){
        $song = Song::where('borrado',false)->get();
        $category = Genre::where('borrado',false)->get();
        return view('home/category',compact("song"),compact('category'));
    }

    public function getSongsByGenre(Request $request){
        $song = Song::where('borrado',false)->where('id_genre','=',strval($request->id_genre))->get();
        $category = Genre::where('borrado',false)->get();
        return view('home/category',compact("song"),compact('category'));




    }
}
