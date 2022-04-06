<?php

namespace App\Http\Controllers;

use App\estancias;
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
}