<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Linea
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $referencia_unica
 * @property $fecha_movimiento
 * @property $banco
 * @property $folio_banco
 * @property $folio_aceptacion
 * @property $transaccion
 * @property $referencia
 * @property $importe
 * @property $tipo_mov
 * @property $cliente
 * @property $agente_asignado
 * @property $vendedor
 * @property $estado
 * @property $fecha_estado
 * @property $cobro
 * @property $fecha_cobro
 *
 * @property Banco $banco
 * @property Cliente $cliente
 * @property Estado $estado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Linea extends Model
{

    static $rules = [
        'referencia_unica' => 'required',
        'fecha_movimiento' => 'required',
        'banco' => 'required',
        'folio_banco' => 'required',
        'folio_aceptacion' => 'required',
        'transaccion' => 'required',
        'referencia' => 'required',
        'importe' => 'required',
        'tipo_mov' => 'required',
        'cliente' => 'required',
        'agente_asignado' => 'required',
        'vendedor' => 'required',
        'estado' => 'required',
        'fecha_estado' => 'required',
        'cobro' => 'required',
        'fecha_cobro' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['referencia_unica', 'fecha_movimiento', 'banco', 'cuenta', 'folio_banco', 'folio_aceptacion', 'transaccion', 'referencia', 'importe', 'tipo_operacion', 'cliente', 'agente_asignado', 'vendedor', 'estado', 'fecha_estado', 'cobro', 'fecha_cobro', 'num_deposito', 'href'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function banco()
    {
        return $this->hasOne('App\Models\Banco', 'banco', 'banco');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'cliente', 'cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'estado', 'estado');
    }
    public static function search($search, $filter, $user, $columnsFilters = [], $accountsShow, $movementDateStart = null, $movementDateEnd = null, $appDateStart = null, $appDateEnd = null, $columnData = null)
    {
        $cols = [];
        foreach ($columnsFilters as $key => $value) {
            $cols[] = 'lineas.id';
            if ($value) {
                $cols[] = 'lineas.' . $key;
            }
            $cols[] = 'estados.descripcion';
        }
        $query = static::query()
            ->when($accountsShow, function ($query) use ($accountsShow) {
                $query->where(function ($q) use ($accountsShow) {
                    foreach ($accountsShow as $key => $value) {
                        if ($value == true) {
                            $q->orWhere('cuenta', 'like', '%' . $key . '%');
                        } else {
                            $q->where('cuenta', 'not like', '%' . $key . '%');
                        }
                    }
                });
            })
            ->when(!empty($search), function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('id', 'like', '%' . $search . '%')
                        ->orWhere('referencia_unica', 'like', '%' . $search . '%')
                        ->orWhere('fecha_movimiento', 'like', '%' . $search . '%')
                        ->orWhere('banco', 'like', '%' . $search . '%')
                        ->orWhere('folio_banco', 'like', '%' . $search . '%')
                        ->orWhere('folio_aceptacion', 'like', '%' . $search . '%')
                        ->orWhere('transaccion', 'like', '%' . $search . '%')
                        ->orWhere('referencia', 'like', '%' . $search . '%')
                        ->orWhere('importe', 'like', '%' . $search . '%')
                        ->orWhere('tipo_operacion', 'like', '%' . $search . '%')
                        ->orWhere('cliente', 'like', '%' . $search . '%')
                        ->orWhere('agente_asignado', 'like', '%' . $search . '%')
                        ->orWhere('vendedor', 'like', '%' . $search . '%')
                        ->orWhere('fecha_estado', 'like', '%' . $search . '%')
                        ->orWhere('cobro', 'like', '%' . $search . '%')
                        ->orWhere('fecha_cobro', 'like', '%' . $search . '%');
                });
            })
            ->when($filter != 'todos', function ($query) use ($filter, $user) {
                $query->where('lineas.estado', $filter);
                if ($user->rol !== "admin" && $user->rol !== "super" && $filter !== 'new') {
                    $query->where('agente_asignado', $user->usuario);
                } else if ($user->rol !== "admin" && $user->rol !== "super" && $filter === 'new') {
                    $query->where('agente_asignado', $user->usuario)->orWhere('agente_asignado', '')->orWhere('agente_asignado', null);
                }
            })
            ->when(sizeof($cols) > 0, function ($query) use ($cols) {
                $query->select($cols);
            })
            ->when($filter === 'todos', function ($query) use ($filter, $user) {
                if ($user->rol !== "admin" && $user->rol !== "super") {
                    $query->where(function ($q) use ($user) {
                        $q->where('agente_asignado', $user->usuario)
                            ->orWhere('agente_asignado', '')
                            ->orWhereNull('agente_asignado');
                    })
                        ->where('lineas.estado', '!=', 'nid');
                }
            })
            ->when($columnData, function ($query) use ($columnData) {
                foreach ($columnData as $key => $value) {
                    if (sizeof($value) > 0) {
                        $query->whereIn($key, $value);
                    }
                }
            })
            ->when([$movementDateStart, $movementDateEnd, $appDateEnd, $appDateEnd], function ($query) use ($movementDateStart, $movementDateEnd, $appDateStart, $appDateEnd) {
                if ($movementDateStart != null && $movementDateEnd != null) {
                    $query->whereDate('fecha_movimiento', '>=', trim($movementDateStart));
                    $query->whereDate('fecha_movimiento', '<=', trim($movementDateEnd));
                }
                if ($appDateStart != null && $appDateEnd != null) {
                    $query->whereDate('fecha_estado', '>=', trim($appDateStart));
                    $query->whereDate('fecha_estado', '<=', trim($appDateEnd));
                }
            })
            ->leftJoin('estados', 'lineas.estado', '=', 'estados.estado');
        return $query;
    }

}
