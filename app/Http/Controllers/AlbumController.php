<?php

namespace App\Http\Controllers;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::where('borrado',false)->get();
        return view('album.indexAlbum',array('albums'=>$albums));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('album.create');
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
            $request->all(),[
                'album_name' => 'required|min : 2|max : 20',
            ],
            ['album_name.required'=>'Se debe ingresar un nombre de album.',
            'album_name.min'=>'Ingresar un album de 2 o mas caracteres.',
            'album_name.max'=>'Ingresar un album de 20 o menos caracteres.',
            'album_name.nullable'=>'Ingresar un album no nulo. ']
            );
        //Se verifica que no falle el ingreso de datos
        if($validator->fails()){
                return response($validator->errors(), 400);
            }
        $newAlbum = new Album();
        $newAlbum->album_name = $request->album_name;
        $newAlbum->borrado = FALSE;
        $newAlbum-> save();
        return redirect('/albums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $album = Album::find($id);
        if(empty($album) or $album->borrado == true){
            return response()->json(['message' => 'El id no existe.']);
        }
        return response($album, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        return view('album.edit', compact('album'));
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
            $request->only(['album_name']),
            [
                'album_name' => 'required|min:2|max:20',
            ],
            [
                'album_name.required' => 'Se debe ingresar un nombre para actualizar album.',
                'album_name.min' => 'Debe ser de largo mínimo :min',
                'album_name.max' => 'Debe ser de largo máximo :max'
            ]
        );
    
        if($validator->fails()){
            return response($validator->errors());
        }
        $album = Album::find($id);
        if(empty($album)){
            return response()->json(['message' => 'El id no existe.']);
        }
        if ($request->album_name == $album->album_name){
            return response()->json([
                "message" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }
        $album->album_name = $request->album_name;
        $album->save();
        return response()->json([
            'message' => 'Se cambio el nombre del album',
            'id' => $album->id,
            'nombre_album' => $album->album_name
        ], 201);

    }
    //Cabe destacar que se realizan 2 funciones de borrado, uno para un soft y otro para un hard
    //delete sera la funcion que se encargara del delete soft, y destroy la encargada del delete hard.
    //Se toma la funcion delete como si fuera un update para el objeto album.
    public function delete($id){
        $album = Album::find($id);
        if(empty($album) or $album->borrado == true){
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $album->borrado = true;
        $album->save();
        return redirect('/albums');
    }

    public function destroy($id)
    {
        $album = Album::find($id);
        if(empty($album)){
            return response()->json(['No se encuentra el id ingresado']);
        }
        $album->delete();
        return redirect('/albums');
        
    }

}
