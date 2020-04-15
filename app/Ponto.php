<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
}
