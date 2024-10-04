<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{

    public function index()
    {

       $transacciones = Transaccion::all();

        return response()->json($transacciones);
    }

    public function store(Request $request)
    {

        $request->validate([
            'motivo' => 'required|max:255',
            'monto' => 'required|max:255',
            'fecha' => 'required|max:255',

        ]);

        $transaccion = Transaccion::create($request->all());

        return response()->json($transaccion);
    }

    public function show($id)
    {

        $transaccion = Transaccion::findOrFail($id);

        return response()->json($transaccion);


    }

    public function update(Request $request, Transaccion $transaccion)
    {
        $request->validate([
            'motivo' => 'required|max:255',
            'monto' => 'required|max:255',
            'fecha' => 'required|max:255',
        ]);

        $transaccion->update($request->all());

        return response()->json($transaccion);
    }

    public function destroy(Transaccion $transaccion)
    {
        $transaccion->delete();
        return response()->json($transaccion);
    }
}
