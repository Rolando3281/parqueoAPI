<?php

namespace App\Http\Controllers;

use App\vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vehiculoController extends Controller
{
    
    public function showAllVehiculos()
    {
        //if(DB::connection()->getDatabaseName())
        //{
           // echo "conncted sucessfully to database EXITO!!!!".DB::connection()->getDatabaseName();
        //}

        return response()->json(vehiculo::all());
    }

    public function showOneVehiculo($id)
    {
        return response()->json(vehiculo::find($id));
    }

    public function create(Request $request)
    {
        $author = vehiculo::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = vehiculo::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        vehiculo::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}