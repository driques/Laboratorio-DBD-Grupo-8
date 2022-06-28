<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::where('borrado', false)->get();
        if ($countries->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran paises'
            ]);
        }
        return view('home/register', compact('countries'));

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
                'name_country' => 'required|min : 2|max : 20',
            ],
            [
                'name_country.required' => 'Se debe ingresar un pais.',
                'name_country.min' => 'Ingresar un pais de 2 o mas caracteres.',
                'name_country.max' => 'Ingresar un pais de 20 o menos caracteres.',
                'name_country.nullable' => 'Ingresar un pais no nulo. '
            ]
        );
        //Se verifica que no falle el ingreso de datos
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }

        $newCountry = new Country();
        $newCountry->name_country = $request->name_country;
        $newCountry->borrado = FALSE;
        $newCountry->save();
        return response()->json(['Se ha creado el pais'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);
        if (empty($country) or $country->borrado == true) {
            return response()->json(['message' => 'El id no existe.']);
        }
        return response($country, 200);
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
            $request->only(['name_country']),
            [
                'name_country' => 'required|min:2|max:20',
            ],
            [
                'name_country.required' => 'Se debe ingresar un nombre para actualizar el pais.',
                'name_country.min' => 'Debe ser de largo mínimo :min',
                'name_country.max' => 'Debe ser de largo máximo :max'
            ]
        );

        if ($validator->fails()) {
            return response($validator->errors());
        }
        $country = Country::find($id);
        if (empty($country)) {
            return response()->json(['message' => 'El id no existe.']);
        }
        if ($request->name_country == $country->name_country) {
            return response()->json([
                "message" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }
        $country->name_country = $request->name_country;
        $country->save();
        return response()->json([
            'message' => 'Se cambio el nombre del pais',
            'id' => $country->id,
            'name_country' => $country->name_country
        ], 201);
    }

    //Cabe destacar que se realizan 2 funciones de borrado, uno para un soft y otro para un hard
    //delete sera la funcion que se encargara del delete soft, y destroy la encargada del delete hard.
    //Se toma la funcion delete como si fuera un update para el objeto country.
    public function delete($id)
    {
        $country = Country::find($id);
        if (empty($country) or $country->borrado == true) {
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $country->borrado = true;
        $country->save();
        return response()->json([
            'message' => 'El pais fue eliminado correctamente',
            'id' => $country->id,
        ], 201);
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        if (empty($country)) {
            return response()->json(['No se encuentra el id ingresado']);
        }
        $country->delete();
        return response()->json([
            'message' => 'El nombre del pais fue destruido con exito de la base de datos',
            'id' => $country->id,
        ], 201);
    }
}
