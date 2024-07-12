<?php

namespace App\Services;

use App\Models\Bancosraw;
use App\Models\Linea;
class FolderReaderService{
  //Ruta de la carpeta
  public static function folderRead(){
    $folderpath = storage_path()."/app/BBVA/";
    $readedFilesFile = storage_path().'/app/readedFiles.txt';
    $failedLinesFile = storage_path().'/app/failedLines.txt';
    $archivos = array_diff(scandir($folderpath), array('.', '..'));
    if(!file_exists($readedFilesFile)){
      $file = fopen($readedFilesFile, "w");
      fclose($file);
    }
    if(!file_exists($failedLinesFile)){
      $file = fopen($failedLinesFile, "w");
      fclose($file);
    }
    $readedFiles = file_get_contents($readedFilesFile);
    $readedFiles = mb_convert_encoding($readedFiles,"UTF-8");
    $readedFiles = explode(PHP_EOL, $readedFiles);
    $failedLines = file_get_contents($failedLinesFile);
    $failedLines = mb_convert_encoding($failedLines,"UTF-8");
    $failedLines = explode(PHP_EOL, $failedLines);
    $result = [];
    $resultLineas = [];
    foreach ($archivos as $archivo){
      if(is_file($folderpath.$archivo)){
        if(!in_array($archivo, $readedFiles)){
          $readedFiles[] = $archivo;
          $dataResult = ExpReaderService::readExp($folderpath.$archivo, $failedLines);
          $lineasBancosRaw = $dataResult['bancosRaw'];
          $lineasLineas = $dataResult['lineasLineas'];
          $result = array_merge($result,$lineasBancosRaw);
          $resultLineas = array_merge($resultLineas,$lineasLineas);
        }
      }
    }
    foreach(array_chunk($resultLineas, 1000) as $chunk){
      Linea::insert($chunk);
    }
    foreach(array_chunk($result, 1000) as $chunk){
      Bancosraw::insert($chunk);
    }
    $readedFiles = implode("\n", $readedFiles);
    file_put_contents($readedFilesFile, $readedFiles);
    $failedLines = implode("\n", $failedLines);
    file_put_contents($failedLinesFile, $failedLines);
    return "Ok";
  }
}