<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'cliente';

    static $rules = [
		'cliente' => 'required',
		'agente' => 'required',
		'ref_bbva' => 'required',
		'ref_bnx' => 'required',
		'ref_otr' => 'required',
		'vendedor' => 'required',
		'nombre_vendedor' => 'required',
		'gerente' => 'required',
		'cedis' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente','nombre_cliente','agente','ref_bbva','ref_bnx','ref_otr','vendedor','nombre_vendedor','gerente','cedis'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ctasxclientes()
    {
        return $this->hasMany('App\Models\Ctasxcliente', 'cliente', 'cliente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lineas()
    {
        return $this->hasMany('App\Models\Linea', 'cliente', 'cliente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'usuario', 'agente');
    }
    public static function search($search){
        return (empty($search)) ? static::query() :
        static::query()->where('cliente', 'like', '%'.$search.'%')
        ->orWhere('nombre_cliente', 'like', '%'.$search.'%')
        ->orWhere('agente', 'like', '%'.$search.'%')
        ->orWhere('ref_bbva', 'like', '%'.$search.'%')
        ->orWhere('ref_bnx', 'like', '%'.$search.'%')
        ->orWhere('ref_otr', 'like', '%'.$search.'%')
        ->orWhere('vendedor', 'like', '%'.$search.'%')
        ->orWhere('nombre_vendedor', 'like', '%'.$search.'%')
        ->orWhere('gerente', 'like', '%'.$search.'%')
        ->orWhere('cedis', 'like', '%'.$search.'%');
    }
}
