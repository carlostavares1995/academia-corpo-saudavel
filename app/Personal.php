<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personais';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fisica_id',
        'data_admissao',
        'salario',
    ];

    public function getDataAdmissaoAttribute($value)
    {
        if (isset($value) && $value) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
        } else {
            return null;
        }
    }

    public function setDataAdmissaoAttribute($value)
    {
        if (isset($value) && $value) {
            $date = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
            $this->attributes['data_admissao'] = $date;
        } else {
            $this->attributes['data_admissao'] = null;
        }
    }

    public function fisica()
    {
        return $this->belongsTo('App\Fisica');
    }

    // -- Funções Auxiliares --
    static public function list()
    {
        $lista = Personal::select(
            'personais.id',
            'fisicas.cpf',
            'fisicas.nome',
            'fisicas.sexo',
            'personais.data_admissao'
        )
            ->join('fisicas', 'fisicas.id', 'personais.fisica_id');

        return $lista;
    }

    static public function storage($data)
    {
        $fisica = Fisica::storage($data);
        $data['fisica_id'] = $fisica->id;

        $personal = new Personal();
        $personal->fill($data);
        $personal->save();

        return $personal;
    }

    static public function updateEdit($data, $id)
    {
        $personal = Personal::find($id);
        $fisica = Fisica::updateEdit($data, $personal->fisica_id);
        $data['fisica_id'] = $fisica->id;

        $personal->fill($data);
        $personal->save();

        return $personal;
    }

    static public function remove($id)
    {
        $personal = Personal::find($id);
        $personal->delete();

        Fisica::remove($personal->fisica_id);
    }
}
