<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{


    public function create()
    {
       return view('Usuario.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('home');

    }

    public function edit($id)
    {
        $usuario = User::where('id',$id)->first();
        if (!empty($usuario)) {
            return view('Usuario.edit',['usuario'=>$usuario]);
        }else{
            return redirect()->back();
        }

    }

    public function update(Request $request , $id)
    {
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
       User::where('id',$id)->update($usuario);
       return redirect()->route('home');
    }

    public function destroy($id)
    {
        User::where('id',$id)->destroy();
        return redirect()->route('home');
    }
}
