<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Fisica extends Model
{
    protected $table = 'fisicas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id',
        'endereco_id',
        'nome',
        'data_nascimento',
        'sexo',
        'email',
        'cpf',
        'rg',
    ];

    public function getDataNascimentoAttribute($value)
    {
        if (isset($value) && $value) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
        } else {
            return null;
        }
    }

    public function setDataNascimentoAttribute($value)
    {
        if (isset($value) && $value) {
            $date = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
            $this->attributes['data_nascimento'] = $date;
        } else {
            $this->attributes['data_nascimento'] = null;
        }
    }

    public function setCpfAttribute($value)
    {
        if ($value) {
            $this->attributes['cpf'] = preg_replace("/\D+/", "", $value);
        } else {
            $this->attributes['cpf'] = $value;
        }
    }

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function endereco()
    {
        return $this->belongsTo('App\Endereco');
    }

    // -- Funções Auxiliares --
    static public function storage($data)
    {
        $user = User::storage($data);
        $data['usuario_id'] = $user->id;
        $endereco = Endereco::storage($data);
        $data['endereco_id'] = $endereco->id;

        $fisica = new Fisica();
        $fisica->fill($data);
        $fisica->save();

        return $fisica;
    }
}
