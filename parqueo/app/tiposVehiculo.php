<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tiposVehiculo extends Model
{
    public $timestamps = false;
    protected $table = 'tiposvehiculo';

    protected $fillable = [
        'nombre', 'codigo','tarifa'
    ];
}