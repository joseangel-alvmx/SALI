<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login(Request $request){
        $credentials = $request->only('nombre_usuario', 'clave');
        $remember = $request->filled('remember')? true : false;
        $user = user::where('nombre_usuario', $credentials['nombre_usuario'])->first();
        if(!$user){
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }
        $session = \DB::table("sessions")->where('user_id', $user->id)->get();
        if(!Hash::check($credentials['clave'], $user->clave)){
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }
        if(count($session) > 0){
            if($session[0]->last_activity >= now()->getTimestamp() - 30 * 60){
                return redirect()->back()->with('error', 'Este usuario ya tiene una sesión activa, por favor cierre la sesión anterior y vuelva a intentar.');
            }else{
                \DB::table("sessions")->where('user_id', $user->id)->delete();
            }
        }
        if($user->estado == 0){
            return redirect()->back()->with('error', 'Usuario deshabilitado');
        }
        Auth::login($user, $remember);
        $request->session()->regenerate();
        return redirect('/');
    }
}
