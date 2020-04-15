<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = 'avaliacoes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'aluno_id',
        'altura',
        'peso',
        'imc',
        'braco_relaxado_esq',
        'braco_relaxado_dir',
        'braco_contraido_esq',
        'braco_contraido_dir',
        'antebraco_esq',
        'antebraco_dir',
        'coxa_esq',
        'coxa_dir',
        'panturrilha_esq',
        'panturrilha_dir',
        'torax',
        'ombro',
        'cintura',
        'quadril',
        'gordura',
        'massa_magra',
        'data_avaliacao',
    ];

    public function getDataAvaliacaoAttribute($value)
    {
        if (isset($value) && $value) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
        } else {
            return null;
        }
    }

    public function setDataAvaliacaoAttribute($value)
    {
        if (isset($value) && $value) {
            $date = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
            $this->attributes['data_avaliacao'] = $date;
        } else {
            $this->attributes['data_avaliacao'] = null;
        }
    }

    public function aluno()
    {
        return $this->belongsTo('App\Aluno');
    }

    // -- Funções Auxiliares --
    static public function list()
    {
        $lista = Avaliacao::select(
            'avaliacoes.id',
            'alunos.matricula',
            'avaliacoes.altura',
            'avaliacoes.peso',
            'avaliacoes.imc',
            'avaliacoes.gordura',
            'avaliacoes.data_avaliacao'
        )
            ->join('alunos', 'alunos.id', 'avaliacoes.aluno_id');

        return $lista;
    }

    static public function storage($data)
    {
        $avaliacao = new Avaliacao();
        $avaliacao->fill($data);
        $avaliacao->save();

        return $avaliacao;
    }

    static public function updateEdit($data, $id)
    {
        $avaliacao = Avaliacao::find($id);
        $avaliacao->fill($data);
        $avaliacao->save();

        return $avaliacao;
    }

    static public function remove($id)
    {
        $avaliacao = Avaliacao::find($id);
        $avaliacao->delete();
    }
}
