<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'gruppo_id',
        'codice_id',
        'tipo_id',
        'totale',
        'data',
        'created_at',
        'updated_at',
    ];

    public function group()
    {
        return $this->hasMany('App\Group');
    }
    public function type()
    {
        return $this->hasMany('App\Type');
    }
    public function code()
    {
        return $this->hasMany('App\Code');
    }
}
