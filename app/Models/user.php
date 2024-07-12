<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user extends Authenticatable implements CanResetPasswordContract
{
    use HasFactory;
    use AuthenticableTrait, CanResetPassword;
    protected $table = 'users';
    protected $fillable = [
        'nombre_usuario',
        'clave',
        'usuario',
        'rol',
        'estado',
    ];
    protected $hidden = [
        'clave',
    ];
    public $timestamps = true;
    public static $rules = array(
        'nombre_usuario' => 'required',
        'usuario' => 'required',
        'rol' => 'required',
        'estado' => 'required',
    );
    protected $username  = 'nombre_usuario';
    public function getAuthIdentifierName()
    {
        return 'nombre_usuario';
    }
    public function getAuthIdentifier()
    {
        return $this->id;
    }
    public function getAuthPasswordName()
    {
        return 'clave';
    }
    public function getAuthPassword()
    {
        return $this->clave;
    }
    public function getEmailForPasswordReset()
    {
        return $this->nombre_usuario;
    }
    public function routeNotificationFor($driver)
    {
        if (method_exists($this, $method = 'routeNotificationFor' . Str::studly($driver))) {
            return $this->{$method}();
        }

        switch ($driver) {
            case 'database':
                return $this->notifications();
            case 'mail':
                return $this->nombre_usuario;
        }
    }
    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()
                ->where('nombre_usuario', 'like', '%' . $search . '%')
                ->orWhere('usuario', 'like', '%' . $search . '%')
                ->orWhere('rol', 'like', '%' . $search . '%')
                ->orWhere('estado', 'like', '%' . $search . '%');
    }
}
