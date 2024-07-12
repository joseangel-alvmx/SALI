<?php

namespace App\Http\Controllers\Pdfs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LineasPdfController extends Controller
{
    public $lineas;
    public function index()
    {
        return view('Pdfs.LineasPdf');
    }
}
