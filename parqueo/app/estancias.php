<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estancias extends Model
{
    public $timestamps = false;
    protected $table = 'estancias';
    protected $primaryKey = 'idEstancia';

    protected $fillable = [
        'esResidenteOficial', 'placa','entrada','salida','importe'
    ];
}