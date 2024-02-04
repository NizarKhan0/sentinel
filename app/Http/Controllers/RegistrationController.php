<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;


class RegistrationController extends Controller
{
    public function register()
    {
        return view('authentication.register');
    }

    public function postRegister(Request $request)
    {
        $user = Sentinel::register($request->all());

        $activation = Activation::create($user);

        $role = Sentinel::findRoleBySlug('manager');

        $role->users()->attach($user);

        $this->sendEmail($user, $activation->code);

        // Optionally, activate the user
        // Sentinel::activate($user);

        return redirect('/');
    //dd($user);
        // Optionally, you can redirect or perform other actions after registration.
    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.activation', [
            'user' => $user,
            'code' => $code
        ], function ($message) use ($user) {
            $message->to($user->email);
            $message->from('sentinellv3@gmail.com', 'Your Sender Name');
            $message->subject("Hello $user->first_name, activate your account.");
        });
    }
}
