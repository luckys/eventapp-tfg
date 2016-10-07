<?php

namespace EventApp\Http\Controllers\Auth;

use Carbon\Carbon;
use EventApp\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    protected $redirectPath = '/admin/dashboard';
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

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmail()
    {
        return view('front.emails.password');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        $data = [
            'email' => $request->email,
            'token' => str_random(40)
        ];

        $flag = Mail::send('front.emails.email-reset-password', ['data' => $data], function ($message) use ($data) {
            $message->from('webmaster@eventapp.com', 'EventApp')
                    ->to($data['email'])
                    ->subject('Resetear contraseña');
        });

        if(!$flag){

            return redirect()->back()->with('message', 'Hubo un error en el envio');
        }

        DB::table('password_resets')->insert([
            'email' => $data['email'],
            'token' => $data['token'],
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('message', 'Enlace enviado correctamente');
    }

    public function getChangePassword($token)
    {
        $email = DB::table('password_resets')
                        ->select('email')
                        ->where('token', '=', $token)
                        ->get();
        $data = [
            'email' => $email[0]->email,
            'token' => $token
        ];

        return view('front.user.change-password', compact('data'));
    }
}
