<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Avaliacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AlunoController extends Controller
{
    protected $folder = 'aluno';

    public function index()
    {
        return view("$this->folder.index");
    }

    public function list()
    {
        $lista = Aluno::list();
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
            $result = Aluno::storage($data);
            DB::commit();

            if ($result) {
                return redirect("/$this->folder")->with('message', 'Cadastro realizado com sucesso!');
            }
            return redirect("/$this->folder")->with(['tipoMsg' => 'warning', 'message' => 'Erro ao realizar cadastro!']);
        } catch (\Exception $e) {
            return redirect("/$this->folder")->with(['tipoMsg' => 'danger', 'message' => 'Erro ao realizar cadastro!']);
        }
    }

    public function edit(Aluno $aluno, $id)
    {
        $data = $aluno->find($id);
        $dependencias = ["rota" => "/$this->folder/update/$id", "data" => $data];
        return view("$this->folder.cadastro")->with($dependencias);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            DB::beginTransaction();
            $result = Aluno::updateEdit($data, $id);
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
            Avaliacao::where('aluno_id', $id)->delete();
            Aluno::remove($id);
            DB::commit();

            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }
}
