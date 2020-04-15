<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PersonalController extends Controller
{
    protected $folder = 'personal';

    public function index()
    {
        return view("$this->folder.index");
    }

    public function list()
    {
        $lista = Personal::list();
        return Datatables::of($lista)->make(true);
    }

    public function create()
    {
        $dependencias = ["rota" => "/$this->folder/store"];
        return view("$this->folder.cadastro")->with($dependencias);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();

            DB::beginTransaction();
            $result = Personal::storage($data);
            DB::commit();

            if ($result) {
                return redirect("/$this->folder")->with('message', 'Cadastro realizado com sucesso!');
            }
            return redirect("/$this->folder")->with(['tipoMsg' => 'warning', 'message' => 'Erro ao realizar cadastro!']);
        } catch (\Exception $e) {
            return redirect("/$this->folder")->with(['tipoMsg' => 'danger', 'message' => 'Erro ao realizar cadastro!']);
        }
    }

    public function edit(Personal $personal, $id)
    {
        $data = $personal->find($id);
        $dependencias = ["rota" => "/$this->folder/update/$id", "data" => $data];
        return view("$this->folder.cadastro")->with($dependencias);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            DB::beginTransaction();
            $result = Personal::updateEdit($data, $id);
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
            Personal::remove($id);
            DB::commit();

            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }
}
