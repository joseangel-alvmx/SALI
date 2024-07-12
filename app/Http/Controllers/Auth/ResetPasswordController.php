<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function reset(Request $request)
    {
        $this->validateRequest($request);
        $check_token = \DB::table("password_resets")->where(['email' => $request->email, 'token' => $request->token])->first();
        if(! $check_token) {
            return back()->with('error','Token inválido, intenta de nuevo');
        }
        user::where('nombre_usuario', $request->email)->update(['clave' => Hash::make($request->password)]);
        \DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return redirect('/login')->with('success','Tu contraseña ha sido cambiada con éxito');
    }
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8'
        ]);
    }
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';
}
