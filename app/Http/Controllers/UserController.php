<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Estado;
use App\Municipio;

class UserController extends Controller
{


    public function create()
    {
        $listaEstados = Estado::all();
        return view('Usuario.create',compact('listaEstados'));
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('home')->with('msg','Usuario Cadastrado com sucesso!!');;
    }

    public function edit($id)
    {
        $listaEstados = Estado::all();
        $usuario = User::where('id',$id)->first();
        if (!empty($usuario)) {
            return view('Usuario.edit',['usuario'=>$usuario ,'listaEstados'=> $listaEstados]);
        }else{
            return redirect()->back();
        }

    }

    public function update(Request $request , $id)
    {
        $user = User::findOrFail($id);
        $usuario = [
            "name" => $request->name,
            "cpf" => $request->cpf,
            "nascimento" =>$request->nascimento,
            "telefone" => $request->telefone,
            "email" => $request->email,
            "endereco" => $request->endereco,
            "estado" => $request->estado,
            "cidade" => $request->cidade,
        ];

       $user->update($usuario);
       return redirect()->route('home')->with('msg','Usuario Atualizado com sucesso!!');;
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('home')->with('msg','Usuario Excluido com sucesso!!');
    }
}
