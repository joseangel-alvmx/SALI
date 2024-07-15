<?php

use App\Http\Controllers\Api\BancosrawController;
use App\Http\Controllers\Api\SendFileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\FolderReaderService;

Route::get('/bancosraw', [BancosrawController::class, 'index']);
Route::post('/bancosraw', [BancosrawController::class, 'store']);
Route::get('/readFolder', function (Request $request) {
    return FolderReaderService::folderRead();
});
Route::post('/sendFile', [SendFileController::class, 'sendFile']);
