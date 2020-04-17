<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'alunos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fisica_id',
        'matricula',
        'plano',
        'pagamento',
        'valor',
        'inicio_contrato',
        'termino_contrato',
    ];

    public function getInicioContratoAttribute($value)
    {
        if (isset($value) && $value) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
        } else {
            return null;
        }
    }

    public function setInicioContratoAttribute($value)
    {
        if (isset($value) && $value) {
            $date = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
            $this->attributes['inicio_contrato'] = $date;
        } else {
            $this->attributes['inicio_contrato'] = null;
        }
    }

    public function getTerminoContratoAttribute($value)
    {
        if (isset($value) && $value) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
        } else {
            return null;
        }
    }

    public function setTerminoContratoAttribute($value)
    {
        if (isset($value) && $value) {
            $date = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
            $this->attributes['termino_contrato'] = $date;
        } else {
            $this->attributes['termino_contrato'] = null;
        }
    }

    public function fisica()
    {
        return $this->belongsTo('App\Fisica');
    }

    // -- Funções Auxiliares --
    static public function list()
    {
        $lista = Aluno::select(
            'alunos.id',
            'alunos.matricula',
            'fisicas.nome',
            'fisicas.sexo',
            'fisicas.data_nascimento'
        )
            ->join('fisicas', 'fisicas.id', 'alunos.fisica_id');

        return $lista;
    }

    static public function storage($data)
    {
        $fisica = Fisica::storage($data);
        $data['fisica_id'] = $fisica->id;

        $aluno = new Aluno();
        $aluno->fill($data);
        $aluno->save();

        return $aluno;
    }

    static public function updateEdit($data, $id)
    {
        $aluno = Aluno::find($id);
        $fisica = Fisica::updateEdit($data, $aluno->fisica_id);
        $data['fisica_id'] = $fisica->id;

        $aluno->fill($data);
        $aluno->save();

        return $aluno;
    }

    static public function remove($id)
    {
        $aluno = Aluno::find($id);
        $aluno->delete();

        Ponto::where('fisica_id', $aluno->fisica_id)->delete();
        Fisica::remove($aluno->fisica_id);
    }
}
