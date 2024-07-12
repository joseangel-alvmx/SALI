<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\user;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    protected $username = 'nombre_usuario';
    use SendsPasswordResetEmails;
    // Método para enviar el correo electrónico de reinicio de contraseña
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // Busca al usuario por su nombre de usuario
        $user = user::where('nombre_usuario', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'No se ha encontrado un usuario con ese nombre de usuario');
        }
        \DB::table('password_resets')->where('email', $request->email)->delete();
        $token = \Str::random(60);
        \DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $action_link = route('password.reset', ['token' => $token, 'email' => $request->email]);
        \Mail::send('forgot-template', ['action_link' => $action_link], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Cambio de contraseña');

            
        });
        return back()->with('success', 'Se ha enviado un correo electrónico con el enlace de restablecimiento de contraseña');
    }

    // Método para validar el correo electrónico
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }
}
