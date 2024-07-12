<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use Illuminate\Http\Request;

/**
 * Class LineaController
 * @package App\Http\Controllers
 */
class LineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = auth()->user();
        if($user->rol == 'admin' || $user->rol == 'super'){
            $counterAssigned = Linea::where('estado', 'asi')->count();
            $counterApplied = Linea::where('estado', 'apl')->count();
            $counterCanceled = Linea::where('estado', 'cnl')->count();
        }else{
            $counterAssigned = Linea::where('estado', 'asi')->where('agente_asignado', $user->usuario)->count();
            $counterApplied = Linea::where('estado', 'apl')->where('agente_asignado', $user->usuario)->count();
            $counterCanceled = Linea::where('estado', 'cnl')->where('agente_asignado', $user->usuario)->count();
        }
        return view('linea.index', compact('counterAssigned', 'counterApplied', 'counterCanceled'));
    }
}
