<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'gruppo_id',
        'codice_id',
        'nome',
        'ammontare',
        'prezzo_singolo',
        'apy',
        'created_at',
        'updated_at',
    ];

    public function group()
    {
        return $this->hasMany('App\Group');
    }
    public function code()
    {
        return $this->hasMany('App\Type');
    }
}
