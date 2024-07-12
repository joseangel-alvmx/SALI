<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bancosraw;
use Illuminate\Support\Facades\Validator;

class BancosrawController extends Controller
{
    public function index(Request $request)
    {
        $bancosraw = Bancosraw::all();
        if ($bancosraw->isEmpty()) {
            return response()->json([
                'message' => 'No hay registros en la base de datos'
            ], 200);
        }
        return response()->json([
            'data' => $bancosraw
        ], 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banco' => 'required',
            'cuenta' => 'required',
            'fecha_valor' => 'required',
            'folio_banco' => 'required',
            'transaccion' => 'required',
            'cargo_abono' => 'required',
            'importe' => 'required',
            'moneda' => 'required',
            'folio_aceptacion' => 'required',
            'referencia' => 'required',
            'tipo_movimiento' => 'required',
            'fecha_carga' => 'required',
            'estatus' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 400);
        }
        $bancosraw = Bancosraw::create($request->all());
        if (! $bancosraw) {
            return response()->json([
                'message' => 'Ocurrio un error al intentar guardar el registro'
            ], 500);
        }
        return response()->json([
            'message' => 'Registro guardado correctamente'
        ], 201);
    }
}
