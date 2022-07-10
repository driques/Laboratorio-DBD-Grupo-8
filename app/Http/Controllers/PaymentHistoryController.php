<?php

namespace App\Http\Controllers;
use App\Models\Payment_History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentHistories= Payment_History::where('borrado',false)->get();
        return view('payment.index',compact('paymentHistories'));
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
        $users = User::where('borrado',false)->get();
        $validator = Validator::make(
            $request->all(),[
                'monto'=> 'required|min :1',
                'metodo_pago' => 'required|min : 2|max : 20',
                'user_pay' => 'required|integer|exists:users,id',
            ],
            ['monto.required'=>'Se debe ingresar un monto',
            'monto.min'=>'El pago no puede ser menor que 1',
            'metodo_pago.required'=>'Se debe ingresar un nombre de metodo de pago.',
            'metodo_pago.min'=>'Ingresar un metodo de pago de 2 o mas caracteres.',
            'metodo_pago.max'=>'Ingresar un metodo de pago de 20 o menos caracteres.',
            'metodo_pago.nullable'=>'Ingresar un metodo de pago no nulo. ',
            'user_pay.required'=>'Se debe ingresar un id de usuario',
            'user_pay.integer'=>'El id del usuario tiene que ser un integer',
            'user_pay.exists'=>'No se encuentra el usuario']
            );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }
        $newPaymentHistory = new Payment_History();
        $newPaymentHistory->monto=$request->monto;
        $newPaymentHistory->metodo_pago=$request->metodo_pago;
        $newPaymentHistory->user_pay=$request->user_pay;
        $newPaymentHistory->borrado = FALSE;
        $newPaymentHistory-> save();
        return redirect('/paymentHistories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paymentHistory = Payment_history::find($id);
        if(empty($paymentHistory) or $paymentHistory->borrado == true){
            return response()->json(['message' => 'El id no existe.']);
        }
        return response($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment_History::find($id);
        return view('payment.edit',compact('payment'));
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
                'monto'=> 'required|min :1',
                'metodo_pago' => 'required|min : 2|max : 20',
                'user_pay' => 'required|integer|exists:users,id',
            ],
            ['monto.required'=>'Se debe ingresar un monto',
            'monto.min'=>'El pago no puede ser menor que 1',
            'metodo_pago.required'=>'Se debe ingresar un nombre de metodo de pago.',
            'metodo_pago.min'=>'Ingresar un metodo de pago de 2 o mas caracteres.',
            'metodo_pago.max'=>'Ingresar un metodo de pago de 20 o menos caracteres.',
            'metodo_pago.nullable'=>'Ingresar un metodo de pago no nulo. ',
            'user_pay.required'=>'Se debe ingresar un id de usuario',
            'user_pay.integer'=>'El id del usuario tiene que ser un integer',
            'user_pay.exists'=>'No se encuentra el usuario']
            );
    
        if($validator->fails()){
            return response($validator->errors());
        }
        $paymentHistory = Payment_History::find($id);
        if(empty($paymentHistory)){
            return response()->json(['message' => 'El id no existe.']);
        }
        $paymentHistory->monto = $request->monto;
        $paymentHistory->metodo_pago = $request->metodo_pago;
        $paymentHistory->user_pay = $request->user_pay;

        $paymentHistory->save();
        return redirect('/paymentHistories');
    }

    public function delete($id){
        $paymentHistory = Payment_history::find($id);
        if(empty($paymentHistory) or $paymentHistory->borrado == true){
            return response()->json(['message' => 'No se encuentra el id ingresado']);
        }
        $paymentHistory->borrado = true;
        $paymentHistory->save();
        return redirect('/paymentHistories');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymentHistory = Payment_history::find($id);
        if(empty($paymentHistory)){
            return response()->json(['No se encuentra el id ingresado']);
        }
        $paymentHistory->delete();
        return response()->json([
            'message' => 'El pago fue destruido con exito de la base de datos',
            'id' => $paymentHistory->id,
        ], 201);
        
    }
}
