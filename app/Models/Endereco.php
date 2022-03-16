<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cep',
        'estado',
        'cidade',
        'bairro',
        'logradouro',
        'numero',
    ];

    public function setCepAttribute($value)
    {
        if ($value) {
            $this->attributes['cep'] = preg_replace("/\D+/", "", $value);
        } else {
            $this->attributes['cep'] = $value;
        }
    }

    // -- Funções Auxiliares --
    static public function storage($data)
    {
        $endereco = new Endereco();
        $endereco->fill($data);
        $endereco->save();

        return $endereco;
    }

    static public function updateEdit($data, $id)
    {
        $endereco = Endereco::find($id);
        $endereco->fill($data);
        $endereco->save();

        return $endereco;
    }

    static public function remove($id)
    {
        $endereco = Endereco::find($id);
        $endereco->delete();
    }
}
