<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TransacLog
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $usuario
 * @property $fecha_registro
 * @property $descripcion
 * @property $operacion
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TransacLog extends Model
{

  static $rules = [
    'usuario' => 'required',
    'fecha_registro' => 'required',
    'descripcion' => 'required',
    'operacion' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['usuario', 'fecha_registro', 'descripcion', 'operacion'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function user()
  {
    return $this->hasOne('App\Models\User', 'usuario', 'usuario');
  }

  public static function search($columnsFilters = [], $registerDateStart = null, $registerDateEnd = null, $columnData = null)
  {
    $dates = [
      'registerDateStart' => $registerDateStart,
      'registerDateEnd' => $registerDateEnd,
    ];
    $cols = [];
    foreach ($columnsFilters as $key => $value) {
      if ($value) {
        $cols[] = 'transac_logs.' . $key;
      }
    }
    $query = static::query()
      ->when($dates, function ($query) use ($dates) {
        if ($dates['registerDateStart'] && $dates['registerDateEnd']) {
          $query->whereBetween('fecha_registro', [$dates['registerDateStart'], $dates['registerDateEnd']]);
        }
      })
      ->when(sizeof($cols) > 0, function ($query) use ($cols) {
        $query->select($cols);
      })
      ->when($columnData, function ($query) use ($columnData) {
        foreach ($columnData as $key => $value) {
          if (sizeof($value) > 0) {
            $query->whereIn($key, $value);
          }
        }
      });

    return $query;
  }

}
