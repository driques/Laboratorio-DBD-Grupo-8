<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::where('borrado',false)->get();
        if($roles->isEmpty()){
            return response()->json(['response'=>'no se encuentran roles registrados',]);
        }
        return response($roles,200);
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
            $request->all(),[
                'rol' => 'required|integer|between:0,2',
            ],
            ['rol.required'=>'Se debe ingresar un rol valido.',
            'rol.nullable'=>'Ingresar un rol no nulo. ']
            );
        //Se verifica que no falle el ingreso de datos
        if($validator->fails()){
                return response($validator->errors(), 400);

            }
        
        $newRol = new Rol();
        $newRol->rol = $request->rol;
        $newRol->borrado = FALSE;
        $newRol-> save();
        return response()->json(['Se ha creado el rol correctamente'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Rol::find($id);
        if(empty($rol) or $rol->borrado == true){
            return response()->json(['message' => 'El id no existe.']);
        }
        return response($rol, 200);
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
            $request->only(['rol']),
            [
                'rol' => 'required|integer|between:0,2',
            ],
            ['rol.required'=>'Se debe ingresar un rol valido.',
            'rol.nullable'=>'Ingresar un rol no nulo. ']
        );
    
        if($validator->fails()){
            return response($validator->errors());
        }
        $rolUpdate = Rol::find($id);
        if(empty($rolUpdate)){
            return response()->json(['message' => 'El id no existe.']);
        }
        if ($request->rol == $rolUpdate->rol){
            return response()->json([
                "message" => "Los datos ingresados son iguales a los actuales."
            ], 203);
        }
        $rolUpdate->rol = $request->rol;
        $rolUpdate->save();
        return response()->json([
            'message' => 'Se cambio el rol',
            'id' => $rolUpdate->id,
            'rol' => $rolUpdate->rol
        ], 201);
    }

    //Cabe destacar que se realizan 2 funciones de borrado, uno para un soft y otro para un hard
    //delete sera la funcion que se encargara del delete soft, y destroy la encargada del delete hard.
    //Se toma la funcion delete como si fuera un update para el objeto rol.
    public function delete($id){
        $deleteRol = Rol::find($id);
        if(empty($deleteRol) or $deleteRol->borrado == true){
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $deleteRol->borrado = true;
        $deleteRol->save();
        return response()->json([
            'message' => 'El rol fue eliminado correctamente',
            'id' => $deleteRol->id,
        ], 201);
    }

    public function destroy($id)
    {
        $destroyRol = Rol::find($id);
        if(empty($destroyRol)){
            return response()->json(['No se encuentra el id ingresado']);
        }
        $destroyRol->delete();
        return response()->json([
            'message' => 'El rol fue destruido con exito de la base de datos',
            'id' => $destroyRol->id,
        ], 201);
        
    }
}
