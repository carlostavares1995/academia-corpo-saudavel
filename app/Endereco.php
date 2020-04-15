<?php

namespace App;

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
}
