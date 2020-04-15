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
}
