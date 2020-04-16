<?php

namespace App\Http\Controllers;

use App\Fisica;
use App\Ponto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PontoController extends Controller
{
    protected $folder = 'ponto';

    public function index()
    {
        return view("$this->folder.index");
    }

    public function list()
    {
        $lista = Ponto::list();
        return Datatables::of($lista)->make(true);
    }

    public function create()
    {
        $fisicas = Fisica::list()->get();
        $dependencias = ["rota" => "/$this->folder/store", "fisicas" => $fisicas];
        return view("$this->folder.cadastro")->with($dependencias);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();

            DB::beginTransaction();
            $result = Ponto::storage($data);
            DB::commit();

            if ($result) {
                return redirect("/$this->folder")->with('message', 'Cadastro realizado com sucesso!');
            }
            return redirect("/$this->folder")->with(['tipoMsg' => 'warning', 'message' => 'Erro ao realizar cadastro!']);
        } catch (\Exception $e) {
            return redirect("/$this->folder")->with(['tipoMsg' => 'danger', 'message' => 'Erro ao realizar cadastro!']);
        }
    }

    public function edit(Ponto $ponto, $id)
    {
        $data = $ponto->find($id);
        $fisicas = Fisica::list()->get();
        $dependencias = ["rota" => "/$this->folder/update/$id", "data" => $data, "fisicas" => $fisicas];
        return view("$this->folder.cadastro")->with($dependencias);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            DB::beginTransaction();
            $result = Ponto::updateEdit($data, $id);
            DB::commit();

            if ($result) {
                return redirect("/$this->folder")->with('message', 'Edição realizada com sucesso!');
            }
            return redirect("/$this->folder")->with(['tipoMsg' => 'warning', 'message' => 'Erro ao realizar edição!']);
        } catch (\Exception $e) {
            return redirect("/$this->folder")->with(['tipoMsg' => 'danger', 'message' => 'Erro ao realizar edição!']);
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Ponto::remove($id);
            DB::commit();

            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }
}
