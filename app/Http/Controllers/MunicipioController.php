<?php

namespace App\Http\Controllers;

use App\User;
use App\Estado;
use App\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class MunicipioController extends Controller
{

    public function BuscarCidade(Request $request)
     {

        $cidades = DB::select("select id,nome from municipios where ufid = '$request->state_id'");
        return $cidades;

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {


    }

    public function update(Request $request , $id)
    {

    }

    public function destroy($id)
    {

    }
}
