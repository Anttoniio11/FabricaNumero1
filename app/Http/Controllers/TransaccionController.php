<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class TransaccionController extends Controller
{

    public function index()
    {
        $transacciones = Transaccion::included()->get();
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

    public function update(Request $request, string $id)
    {

        $transaccion = Transaccion::find($id);

        $request->validate([
            'motivo' => 'required|max:255',
            'monto' => 'required|max:255',
            'fecha' => 'required|max:255',
            'id_tipo_transaccion' => 'required|max:255',
        ]);

        $transaccion->update($request->all());

        return response()->json($transaccion);
    }

    public function destroy(int $id)
    {
        $transaccion = Transaccion::findOrFail($id);
        $transaccion->delete();
        return response()->json($transaccion);
    }
}
