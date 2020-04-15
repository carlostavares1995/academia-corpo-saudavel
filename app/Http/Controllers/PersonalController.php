<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PersonalController extends Controller
{
    public function index()
    {
        return view("personal.index");
    }

    public function list()
    {
        $lista = Personal::list();
        return Datatables::of($lista)->make(true);
    }

    public function create()
    {
        $dependencias = ["rota" => "/personal/store"];
        return view("personal.cadastro")->with($dependencias);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();
        $result = Personal::storage($data);
        DB::commit();

        if ($result) {
            return redirect('/personal')->with('message', 'Cadastro realizado com sucesso!');
        }
        return redirect('/personal')->with(['tipoMsg' => 'danger', 'message' => 'Erro ao realizar cadastro!']);
    }

    public function edit(Personal $personal, $id)
    {
        $data = $personal->find($id);
        $dependencias = ["rota" => "/personal/update/$id", "data" => $data];
        return view("personal.cadastro")->with($dependencias);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        DB::beginTransaction();
        $result = Personal::updateEdit($data, $id);
        DB::commit();

        if ($result) {
            return redirect('/personal')->with('message', 'Edição realizada com sucesso!');
        }
        return redirect('/personal')->with(['tipoMsg' => 'danger', 'message' => 'Erro ao realizar edição!']);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Personal::remove($id);
            DB::commit();

            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }
}
