<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ponto extends Model
{
    protected $table = 'pontos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fisica_id',
        'tipo',
        'data_hora',
    ];

    public function getDataHoraAttribute($value)
    {
        if (isset($value) && $value) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i');
        } else {
            return null;
        }
    }

    public function setDataHoraAttribute($value)
    {
        if (isset($value) && $value) {
            $date = Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i:s');
            $this->attributes['data_hora'] = $date;
        } else {
            $this->attributes['data_hora'] = null;
        }
    }

    public function fisica()
    {
        return $this->belongsTo('App\Fisica');
    }

    // -- Funções Auxiliares --
    static public function list()
    {
        $lista = Ponto::select(
            'pontos.id',
            'fisicas.nome',
            'pontos.tipo',
            'pontos.data_hora',
            DB::raw('DATE_FORMAT(pontos.data_hora, "%d/%m/%Y") as data'),
            DB::raw('DATE_FORMAT(pontos.data_hora, "%H:%i") as hora')
        )
            ->join('fisicas', 'fisicas.id', 'pontos.fisica_id');

        return $lista;
    }

    static public function storage($data)
    {
        $ponto = new Ponto();
        $ponto->fisica_id = $data['fisica_id'];
        $ponto->tipo = $data['tipo'];
        $ponto->data_hora = $data['data'] . " " . $data['hora'];
        $ponto->save();

        return $ponto;
    }

    static public function updateEdit($data, $id)
    {
        $ponto = Ponto::find($id);
        $ponto->fisica_id = $data['fisica_id'];
        $ponto->tipo = $data['tipo'];
        $ponto->data_hora = $data['data'] . " " . $data['hora'];
        $ponto->save();

        return $ponto;
    }

    static public function remove($id)
    {
        $ponto = Ponto::find($id);
        $ponto->delete();
    }
}
