<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    public $timestamps = false;
    protected $table = 'vehiculos';
    protected $primaryKey = 'idVehiculo';

    protected $fillable = [
        'placa', 'marca','modelo','propietario','fechaAlta','idTipoVehiculo'
    ];
}