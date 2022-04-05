<?php

namespace App\Http\Controllers;

use App\tiposVehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tiposVehiculoController extends Controller
{
    
    public function showAllTipos()
    {
        //if(DB::connection()->getDatabaseName())
        //{
           // echo "conncted sucessfully to database EXITO!!!!".DB::connection()->getDatabaseName();
        //}

        return response()->json(tiposVehiculo::all());
    }

    public function showOneTipo($id)
    {
        return response()->json(tiposVehiculo::find($id));
    }

    public function create(Request $request)
    {
        $author = tiposVehiculo::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = tiposVehiculo::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        tiposVehiculo::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}