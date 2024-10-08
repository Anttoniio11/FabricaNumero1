<?php

namespace App\Http\Controllers;

use App\Models\TipoTransaccion;
use Illuminate\Http\Request;

class TipoTransaccionController extends Controller
{
    public function index()
    {
        $tipo_transacciones = TipoTransaccion::included()->get();
        return response()->json($tipo_transacciones);
    }

    public function store(Request $request)
    {

        $request->validate([
            'tipo_transaccion' => 'required|max:255',

        ]);

        $tipo_transaccion = TipoTransaccion::create($request->all());

        return response()->json($tipo_transaccion);
    }

    public function show($id)
    {

        $tipo_transaccion = TipoTransaccion::findOrFail($id);

        return response()->json($tipo_transaccion);


    }

    public function update(Request $request, TipoTransaccion $tipo_transaccion)
    {
        $request->validate([
            'tipo_transaccion' => 'required|max:255',
        ]);

        $tipo_transaccion->update($request->all());

        return response()->json($tipo_transaccion);
    }

    public function destroy(TipoTransaccion $tipo_transaccion)
    {
        $tipo_transaccion->delete();
        return response()->json($tipo_transaccion);
    }
}
