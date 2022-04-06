<?php

namespace App\Http\Controllers;

use App\pagosActual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pagosActualController extends Controller
{
    
    public function showAllPagos()
    {
        //if(DB::connection()->getDatabaseName())
        //{
           // echo "conncted sucessfully to database EXITO!!!!".DB::connection()->getDatabaseName();
        //}

        return response()->json(pagosActual::all());
    }

    public function showOnePago($id)
    {
        return response()->json(pagosActual::find($id));
    }

    public function create(Request $request)
    {
        $author = pagosActual::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = pagosActual::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        pagosActual::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}