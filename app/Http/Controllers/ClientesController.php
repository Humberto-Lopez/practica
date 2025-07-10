<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Facades\Hash;

use Mews\Purifier\Facades\Purifier;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

use function Laravel\Prompts\select;

class ClientesController extends Controller
{
    public function create(){
        $cliente = new Clientes();
        return view('clientes.nuevo', compact('cliente'));
    }
    
    public function edit($id){
        $cliente = Clientes::find($id);
        return view('clientes.nuevo',compact('cliente'));
    }

    public function destroy($id){
        $cliente = Clientes::find($id);
        $cliente->delete();
        return redirect()->route('clientes');
    }

    public function store(Request $request){

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'required|min:8|confirmed',
            'contacto' => 'required|string|max:255',
            'telefono_contacto' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'rfc' => 'required|string|max:13',
            'rol' => 'required|in:C,A'
        ]);

        if($request->id == 0){
            $cliente = new Clientes();
        }else{
            $cliente = Clientes::find($request->id);
        }

        $cliente->name = Purifier::clean($validate['name']);
        $cliente->email = Purifier::clean($validate['email']);
        if($validate['password'] != ""){
            $cliente->password = Hash::make($validate['password']);
        }
        $cliente->rfc = Purifier::clean($validate['rfc']);
        $cliente->contacto = Purifier::clean($validate['password'],'default');
        $cliente->telefono_contacto = Purifier::clean($validate['telefono_contacto'],'default');
        $cliente->direccion = Purifier::clean($validate['direccion'],'default');
        $cliente->rol = $validate['rol'];
        
        $cliente->save();
        return redirect()->route('clientes');
    }

    public function index(Request $request) {
        $rol = $request->input('rol');
    
        $users = $rol 
            ? Clientes::where('rol', '=', $rol)->get() 
            : Clientes::all();
    
        return view('clientes.lista', compact('users', 'rol'));
    }

    
}