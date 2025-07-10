<?php

namespace App\Http\Controllers;

use App\Models\Polizas;
use App\Models\User;
use Illuminate\Http\Request;

class PolizasController extends Controller
{
    public function create(){
        $polizas = new Polizas();
        $clientes = User::where(column: 'rol',operator: '=',value: 'C')->get(); // Obtén todos los usuarios
        return view('polizas.nuevas', compact('polizas','clientes'));
    }

    public function edit($id){
        $polizas = Polizas::find($id);
        $clientes = User::where(column: 'rol',operator: '=',value: 'C')->get(); // Obtén todos los usuarios
        return view('polizas.nuevas',compact('polizas','clientes'));
    }

    public function destroy($id){
        $polizas = Polizas::find($id);
        $polizas->delete();
        return redirect()->route('polizas');
    }

    public function store(Request $request){

        if($request->id == 0){
            $polizas = new Polizas();
        }else{
            $polizas = Polizas::find($request->id);
        }

        $polizas->total_horas = $request->total_horas;
        $polizas->fecha_inicio = $request->fecha_inicio;
        $polizas->fecha_fin = $request->fecha_fin;
        $polizas->precio = $request->precio;
        $polizas->id_cliente = $request->id_cliente;
        $polizas->Observaciones = $request->observaciones;
        
        $polizas->save();
        return redirect()->route('polizas');
    }

    public function index(){
        $polizas = Polizas::all();
        $clientes = User::where('rol','=','C')->get(); // Obtén todos los usuarios
        return view('polizas.listap',compact('polizas','clientes'));
    }

}
