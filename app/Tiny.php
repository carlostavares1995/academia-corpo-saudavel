<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiny extends Model
{
    protected $table = 'tinys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
    ];

    // -- Funções Auxiliares --
    static public function list()
    {
        $lista = Tiny::select(
            'tinys.id'
        );

        return $lista;
    }

    static public function storage($data)
    {
        $tiny = new Tiny();
        $tiny->fill($data);
        $tiny->save();

        return $tiny;
    }
}
