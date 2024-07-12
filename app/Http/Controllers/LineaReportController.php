<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use Illuminate\Http\Request;

/**
 * Class LineaController
 * @package App\Http\Controllers
 */
class LineaReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('linea-report.index');
    }
}
