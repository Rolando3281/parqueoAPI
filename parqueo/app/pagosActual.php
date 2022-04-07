<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagosActual extends Model
{
    public $timestamps = false;
    protected $table = 'pagosactual';
    protected $primaryKey = 'idVehiculo';
    

    protected $fillable = [
        'idVehiculo', 'tiempoAcumulado','montoTotal','placa'
    ];
}