<?php

namespace App\Http\Controllers;

use App\Models\TransacLog;
use Illuminate\Http\Request;

/**
 * Class TransacLogController
 * @package App\Http\Controllers
 */
class TransacLogReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('transac-log-report.index');
    }
}
