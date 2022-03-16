<?php

namespace App\Models;

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
        return $this->belongsTo('App\Models\User');
    }

    public function endereco()
    {
        return $this->belongsTo('App\Models\Endereco');
    }

    // -- Funções Auxiliares --
    static public function list()
    {
        $lista = Fisica::select(
            'fisicas.id',
            'fisicas.nome'
        );

        return $lista;
    }

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

    static public function updateEdit($data, $id)
    {
        $fisica = Fisica::find($id);
        $user = User::updateEdit($data, $fisica->usuario_id);
        $data['usuario_id'] = $user->id;
        $endereco = Endereco::updateEdit($data, $fisica->endereco_id);
        $data['endereco_id'] = $endereco->id;

        $fisica->fill($data);
        $fisica->save();

        return $fisica;
    }

    static public function remove($id)
    {
        $fisica = Fisica::find($id);
        $fisica->delete();

        User::remove($fisica->usuario_id);
        Endereco::remove($fisica->endereco_id);
    }
}
