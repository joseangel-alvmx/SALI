<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bancosraw
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $banco
 * @property $cuenta
 * @property $fecha_valor
 * @property $folio_banco
 * @property $transaccion
 * @property $cargo_abono
 * @property $importe
 * @property $moneda
 * @property $folio_aceptacion
 * @property $referencia
 * @property $tipo_movimiento
 * @property $fecha_carga
 * @property $estatus
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bancosraw extends Model
{
    
    static $rules = [
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
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['banco','cuenta','fecha_valor','folio_banco','transaccion','cargo_abono','importe','moneda','folio_aceptacion','referencia','tipo_movimiento','fecha_carga','estatus'];

		public static function search($search){
			return empty($search) ? static::query()
				: static::query()->where('banco', 'like', '%'.$search.'%')
				->orWhere('cuenta', 'like', '%'.$search.'%')
				->orWhere('fecha_valor', 'like', '%'.$search.'%')
				->orWhere('folio_banco', 'like', '%'.$search.'%')
				->orWhere('transaccion', 'like', '%'.$search.'%')
				->orWhere('cargo_abono', 'like', '%'.$search.'%')
				->orWhere('importe', 'like', '%'.$search.'%')
				->orWhere('moneda', 'like', '%'.$search.'%')
				->orWhere('folio_aceptacion', 'like', '%'.$search.'%')
				->orWhere('referencia', 'like', '%'.$search.'%')
				->orWhere('tipo_movimiento', 'like', '%'.$search.'%')
				->orWhere('fecha_carga', 'like', '%'.$search.'%')
				->orWhere('estatus', 'like', '%'.$search.'%');
		}

}
