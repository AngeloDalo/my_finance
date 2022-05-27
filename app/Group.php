<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'nome'
    ];

    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }
    public function asset()
    {
        return $this->belongsTo('App\Asset');
    }
}
