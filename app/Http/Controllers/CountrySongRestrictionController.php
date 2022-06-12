<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;
use App\Models\Song;

class CountrySongRestrictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restrictions = CountrySongRestriction::where('borrado',false)->get();
        if($restrictions->isEmpty()){
            return response()->json(['response'=>'no se encuentran restricciones registradas',]);
        }
        return response($restrictions,200);//
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
        //
        $countries = Country::where('borrado', false)->get();
        $songs = Song::where('borrado', false)->get();
         $validator = Validator::make(
            $request->all(),[
                'id_song' => 'required|integer|exists:songs,id',
                'id_country' => 'required|integer|exists:countries,id',
            ],
            ['id_song.required'=>'Se debe ingresar un pais.',
            'id_song.integer'=>'Se debe ingresar un integer',
            'id_song.nullable'=>'Ingresar un pais no nulo. ',
            'id_song.exists' => 'El id de la cancion no existe',
            'id_country.required'=>'Se debe ingresar un pais.',
            'id_country.integer'=>'Se debe ingresar un integer',
            'id_country.nullable'=>'Ingresar un pais no nulo. ',
            'id_country.exists' => 'El id del pais no existe',
            ]
            );
        //Se verifica que no falle el ingreso de datos
        if($validator->fails()){
                return response($validator->errors(), 400);
            }
        
        $newRestriction = new CountrySongRestriction();
        $newRestriction->id_song = $request->id_song;
        $newRestriction->id_country = $request->id_country;
        $newRestriction->borrado = FALSE;
        $newRestriction-> save();
        return response()->json(['Se ha creado el pais'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restriction = CountrySongRestriction::find($id);
        if(empty($restriction)){
            return response()->json(['response'=>'No se encuentran generos',],204);
        }
        return response($restriction);
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
        $restriction = CountrySongRestriction::find($id);
        if(empty($restriction)){
            return response()->json(['message' => 'El id no existe.']);
        }
        $validator = Validator::make(
            $request->all(),[
                'id_song' => 'required|integer|exists:songs,id',
                'id_country' => 'required|integer|exists:countries,id',
            ],
            ['id_song.required'=>'Se debe ingresar un pais.',
            'id_song.integer'=>'Se debe ingresar un integer',
            'id_song.nullable'=>'Ingresar un pais no nulo. ',
            'id_song.exists' => 'El id de la cancion no existe',
            'id_country.required'=>'Se debe ingresar un pais.',
            'id_country.integer'=>'Se debe ingresar un integer',
            'id_country.nullable'=>'Ingresar un pais no nulo. ',
            'id_country.exists' => 'El id del pais no existe',
            ]
            );
        //Se verifica que no falle el ingreso de datos
        if($validator->fails()){
            return response($validator->errors(), 400);
        }
        $id_song=$request->$id_song;
        $id_country=$request->$id_country;
        $song = Song::find($id_song);
        if(empty($song)){
            return response()->json(['message' => 'El id no existe.']);
        }
        $country = Country::find($id_country);
        if(empty($country)){
            return response()->json(['message' => 'El id no existe.']);
        }
        if ($request->id_song == $restriction->id_song & $request->id_country == $restriction->id_song ){
            return response()->json([
                "message" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }
        $restriction->id_song = $id_song;
        $restriction->email = $id_country;

        $restriction->save();
        return response()->json([
            'message' => 'Se actualizaron los datos',
            'id_song' => $restriction->id_song,
            'id_country' => $restriction->id_country
        ], 200);
    }
    public function delete($id){
        $restriction = CountrySongRestriction::find($id);
        if(empty($restriction) or $restriction->borrado == true){
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $restriction->borrado = true;
        $restriction->save();
        return response()->json([
            'message' => 'la restriccion fue eliminada correctamente (SOFT DELETE)',
            'id' => $restriction->id,
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
        //
        $restriction = CountrySongRestriction::find($id);
        if(empty($restriction)){
            return response()->json(['No se encuentra el id ingresado']);
        }
        $restriction->delete();
        return response()->json([
            'message' => 'El rol fue destruido con exito de la base de datos (HARD DELETE)',
            'id' => $restriction->id,
        ], 201);
    }
}
