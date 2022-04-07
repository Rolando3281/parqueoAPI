<?php

namespace App\Http\Controllers;

use App\estancias;
use App\tiposVehiculo;
use App\Vehiculo;
use App\pagosActual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class estanciasController extends Controller
{
    
    public function showAllEstancias()
    {
        //if(DB::connection()->getDatabaseName())
        //{
           // echo "conncted sucessfully to database EXITO!!!!".DB::connection()->getDatabaseName();
        //}

        return response()->json(estancias::all());
    }

    public function showOneEstancia($id)
    {
        return response()->json(estancias::find($id));
    }

    public function create(Request $request)
    {
        $input = $request->all();
        
        $input['esResidenteOficial'] = 1;
        $input['entrada'] = Date("Y-m-d H:i:s");
        $input['placa'] = $request->input("placa");

        //$author = estancias::create($request->all());
        $author = estancias::create($input);

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = estancias::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        estancias::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

    public function darSalida($id){

        $estancia = estancias::findOrFail($id);
        error_log($estancia);
        error_log($estancia->placa);
        $vehiculo = Vehiculo::where('placa', $estancia->placa)->first();           
        //error_log($vehiculo);

        if($vehiculo){ //SI EL VEHICULO ES RESIDENTE U OFICIAL
            //error_log('ENTRO IF');
            $residente = tiposVehiculo::findOrFail($vehiculo->idTipoVehiculo);
            $tarifa = abs($residente->tarifa);

            $fechaActual = Date("Y-m-d H:i:s");
            $fechaInicial = $estancia->entrada;

            $minutos = (strtotime($fechaActual)-strtotime($fechaInicial))/60;
            $minutos = abs($minutos); 
            $minutos = floor($minutos);

            $importe = $minutos*$tarifa;

            $estancia['importe'] = 0;
            $estancia['salida'] =  $fechaActual;
            $estancia->save();

            $pagoActual = pagosActual::where('placa',$vehiculo->placa)->first();;
            if($pagoActual){
                //error_log('ENTRO IF de residente');
                $pagoActual->tiempoAcumulado=$pagoActual->tiempoAcumulado+$minutos;
                $pagoActual->montoTotal = $pagoActual->montoTotal+$importe;
                $pagoActual->save();

            }else{                
                //error_log('ENTRO else de residente');

                $pago = new pagosActual;
                $pago->idVehiculo = $vehiculo->idVehiculo;
                $pago->tiempoAcumulado =  $minutos;
                $pago->montoTotal = $importe;
                $pago->placa=$vehiculo->placa;
                $pago->save();


            }

         
        }
        else{ //SI EL VEHICULO NO ES RESIDENTE NI OFICIAL          

            $fechaActual = Date("Y-m-d H:i:s");
            $fechaInicial = $estancia->entrada;

            $minutos = (strtotime($fechaActual)-strtotime($fechaInicial))/60;
            $minutos = abs($minutos); 
            $minutos = floor($minutos);

            $importe = $minutos*0.5;

            error_log('importe:');
            error_log($importe);

            $estancia['importe'] = $importe;
            $estancia['salida'] =  $fechaActual;            
            error_log($estancia);
            
           $estancia->save();   
           
           
        }        
        
    }
}