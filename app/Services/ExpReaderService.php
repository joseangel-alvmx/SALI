<?php

namespace App\Services;

use App\Models\Bancosraw;
use App\Models\clientes;
use App\Models\ctasxcliente;
use App\Models\Linea;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ExpReaderService
{
  public static function readExp($file, $failedLines)
  {
    ini_set('max_execution_time', 1000);
    $lineas = file_get_contents($file);
    $lineas = mb_convert_encoding($lineas, "UTF-8");
    $lineas = explode(PHP_EOL, $lineas);
    $data = [];
    $lines = [];
    $dataLineas = [];
    $lineaslineas = [];
    $lastFolio = Cache::get('lastFolio');
    foreach ($lineas as $linea) {
      $data['banco'] = 23; //banco
      $data['cuenta'] = substr($linea, 0, 18); //Cuenta
      $data['fecha_valor'] = substr($linea, 18, 10); //Fecha Valor
      $data['folio_banco'] = substr($linea, 28, 6); //Folio Banco
      //Verificacion de folio en 0
      if($data['folio_banco'] == 0){
        $lastFolio++;
        while (Linea::where('folio_banco', $lastFolio)->exists()) {
          $lastFolio++;
          Log::info('intento busqueda de folio: '.$lastFolio);
        }
        Cache::forever('lastFolio', $lastFolio);
        $data['folio_banco'] = $lastFolio;
      }
      $data['transaccion'] = substr($linea, 34, 30); //Transacción
      $tipo_operacion = substr($linea, 64, 1); //Tipo de movimiento
      $data['importe'] = substr($linea, 65, 16); //Importe
      $data['moneda'] = substr($linea, 81, 3); //Moneda
      $data['folio_aceptacion'] = substr($linea, 84, 9); //Folio aceptación
      $data['referencia'] = substr($linea, 93, 30); //Referencia
      // $data[] = substr($linea, 123, 7); //Contrato
      $data['fecha_carga'] = substr($linea, 130, 10); //Fecha operación
      // $data[] = substr($linea, 140, 12); //Nombre contrato CW
      // $data[] = substr($linea, 152, 3); //Código transacción
      $data['tipo_movimiento'] = substr($linea, 152, 3); //Tipo operación
      // $data[] = substr($linea, 158, 4); //Plaza
      $timestamp1 = strtotime($data['fecha_valor']);
      $timestamp2 = strtotime($data['fecha_carga']);
      $dataLineas['banco'] = $data['banco'];
      $dataLineas['cuenta'] = $data['cuenta'];
      $dataLineas['fecha_movimiento'] = $data['fecha_valor'];
      $dataLineas['fecha_estado'] = $data['fecha_valor'];
      $dataLineas['folio_banco'] = $data['folio_banco'];
      $dataLineas['transaccion'] = $data['transaccion'];
      $dataLineas['importe'] = $data['importe'];
      $dataLineas['folio_aceptacion'] = $data['folio_aceptacion'];
      $dataLineas['referencia'] = $data['referencia'];
      $dataLineas['tipo_operacion'] = $data['tipo_movimiento'];
      $dataLineas['referencia_unica'] = self::calcularReferenciaUnica($data['banco'], $data['folio_banco']);
      $dataLineas['cliente'] = null;
      $dataLineas['agente_asignado'] = null;
      $dataLineas['vendedor'] = null;
      $dataLineas['href'] = false;
      $dataLineas['estado'] = 'new';
      if ($data['tipo_movimiento'] === "Y01" || $data['tipo_movimiento'] === "Y02" || $data['tipo_movimiento'] === "Y05" || $data['tipo_movimiento'] === "Y15") {
        $referenciaCliente = trim(substr($data['transaccion'], 8));
        $cliente = clientes::where('ref_bbva', $referenciaCliente)->first();
        if($cliente != null){
          $dataLineas['estado'] = 'asi';
          $dataLineas['cliente'] = $cliente->cliente;
          $dataLineas['agente_asignado'] = $cliente->agente;
          $dataLineas['vendedor'] = $cliente->vendedor;
          $dataLineas['href'] = true;
        }
      }
      else if($data['tipo_movimiento'] === "N06"){
        $referenciaCuentasXCliente = trim(substr($data['referencia'], 8,10));
        $cuentaXCliente = ctasxcliente::where("cuenta", $referenciaCuentasXCliente)->first();
        if($cuentaXCliente != null){
          $dataLineas['estado'] = 'asi';
          $cliente = clientes::where('cliente', $cuentaXCliente->cliente)->first();
          if($cliente != null){
            $dataLineas['cliente'] = $cliente->cliente;
            $dataLineas['agente_asignado'] = $cliente->agente;
            $dataLineas['vendedor'] = $cliente->vendedor;
            $dataLineas['href'] = true;
          }
        }
      }
      $lineaBase = Bancosraw::where('cuenta', $data['cuenta'])->where('folio_banco', $data['folio_banco'])->exists();
      if ($lineaBase) {
        continue;
      }
      if ($tipo_operacion != 0) {
        continue;
      }
      if ($timestamp1 === false || $timestamp2 === false) {
        $failedLines[] = $linea;
        $data = [];
        $dataLineas = [];
        continue;
      }
      $lineaslineas[] = $dataLineas;
      $dataLineas = [];
      $lines[] = $data;
      $data = [];
    }
    return ['bancosRaw' => $lines, 'lineasLineas' => $lineaslineas];
  }
  protected static function calcularReferenciaUnica($banco, $folio_banco)
  {
    $referenciaUnica = $banco . date('Ym') . '01' . str_pad($folio_banco,6,'0',STR_PAD_LEFT);
    $digitos = str_split($referenciaUnica);
    $sumatoriaPar = 0;
    $sumatoriaImpar = 0;
    foreach ($digitos as $posicion => $digito) {
      if ($posicion % 2 == 0) {
        $sumatoriaPar += $digito;
      } else {
        $sumatoriaImpar += $digito * 3;
      }
    }
    $digitoControl = 10 - (($sumatoriaPar + $sumatoriaImpar) % 10);
    if ($digitoControl == 10) {
      $digitoControl = 0;
    }
    $referenciaUnica .= $digitoControl;
    return $referenciaUnica;
  }
}