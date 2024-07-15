<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendFileController extends Controller
{
    public function sendFile(Request $request)
    {
        $file = $request->file('file');
        $password = $request->input('password');
        if($password != 'r%HV6WXAeRS!PbwugAi4'){
            return response()->json('Invalid password');
        }
        if($file->getClientOriginalExtension() != 'exp'){
            return response()->json('Invalid file extension');
        }
        $file->storeAs('BBVA', $file->getClientOriginalName());
        return response()->json('File uploaded successfully');
    }
}
