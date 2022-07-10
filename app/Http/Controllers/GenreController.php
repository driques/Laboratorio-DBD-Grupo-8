<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $genres = Genre::where('borrado',false)->get();
        return view('genre.index',compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genre.create');
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
                'genre_name' => 'required|min : 2|max : 20',
            ],
            ['genre_name.required'=>'Se debe ingresar un nombre de genero.',
            'genre_name.min'=>'Ingresar un genero de 2 o mas caracteres.',
            'genre_name.max'=>'Ingresar un genero de 20 o menos caracteres.',
            'genre_name.nullable'=>'Ingresar un genero no nulo. ']
            );
            if($validator->fails()){
                return response($validator->errors(), 400);
            }
        $newGenre = new Genre();
        $newGenre->genre_name = $request->genre_name;
        $newGenre->borrado = false;
        $newGenre->save();
        return redirect('/genres');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = Genre::find($id);
        if(empty($genre)){
            return response()->json(['response'=>'No se encuentran generos',],204);
        }
        return response($genre);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('genre.edit',compact('genre'));
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
                'genre_name' => 'required|min:2|max:20',
            ],
            [
                'genre_name.required' => 'Se debe ingresar un nombre para actualizar genero.',
                'genre_name.min' => 'Debe ser de largo mínimo :min',
                'genre_name.max' => 'Debe ser de largo máximo :max'
            ]
        );
    
        if($validator->fails()){
            return response($validator->errors());
        }
        $genre = Genre::find($id);
        if(empty($genre)){
            return response()->json(['message' => 'El id no existe.']);
        }
        if ($request->genre_name == $genre->genre_name){
            return response()->json([
                "message" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }
        $genre->genre_name = $request->genre_name;
        $genre->save();
        return redirect('/genres');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $genre = Genre::find($id);
        if(empty($genre)){
            return response()->json(['No se encuentra el id ingresado']);
        }
        $genre->delete();
        return response()->json([
            'message' => 'El genero fue destruido con exito',
            'id' => $genre->id,
        ], 200);
        
        //
    }

    public function delete($id){
        $genre = Genre::find($id);
        if(empty($genre) or $genre->borrado == true){
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $genre->borrado = true;
        $genre->save();
        return redirect('/genres');
    }
    
}
