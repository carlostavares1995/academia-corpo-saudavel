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
    static public function storage($data)
    {
        $fisica = Fisica::storage($data);
        $data['fisica_id'] = $fisica->id;

        $personal = new Personal();
        $personal->fill($data);
        $personal->save();

        return $personal;
    }
}
