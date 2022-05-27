<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = [
        'codice'
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
