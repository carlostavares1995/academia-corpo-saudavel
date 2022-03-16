<?php

namespace App\Http\Controllers;

use App\Models\Tiny;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class TinyController extends Controller
{
    protected $folder = 'tiny-mce';

    public function index()
    {
        return view("$this->folder.index");
    }

    public function list()
    {
        $lista = Tiny::list();
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
            $result = Tiny::storage($data);
            DB::commit();

            if ($result) {
                return redirect("/$this->folder")->with('message', 'Cadastro realizado com sucesso!');
            }

            return redirect("/$this->folder")->with(['tipoMsg' => 'warning', 'message' => 'Erro ao realizar cadastro!']);
        } catch (\Exception $e) {
            return redirect("/$this->folder")->with(['tipoMsg' => 'danger', 'message' => 'Erro ao realizar cadastro!']);
        }
    }

    public function edit(Tiny $tiny, $id)
    {
        $data = $tiny->find($id);
        $dependencias = ["rota" => "/$this->folder/update/$id", "data" => $data];
        return view("$this->folder.cadastro")->with($dependencias);
    }
}
