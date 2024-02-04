<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Cartalyst\Sentinel\Users\EloquentUser;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Reminders\EloquentReminder;


class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('authentication.forgot-password');
    }

    // public function postForgotPassword(Request $request)
    // {
    //     return $request->email;
    // }

    public function postForgotPassword(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if (!$user) {
            return redirect()->back()->with([
                'error' => 'Invalid email'
            ]);
        }

        // if(count($user) == 0)
        // return redirect()->back()->with([
        //     'success'=> 'Reset code was sent to your email'
        // ]);
        $reminder = Reminder::exists($user) ?: Reminder::create($user);
        //return $request->email;

        $this->sendEmail($user, $reminder->code);
                return redirect()->back()->with([
            'success'=> 'Reset code was sent to your email'
        ]);
    }

    public function resetPassword($email, $resetCode)
    {
        // return "$email : $resetCode";
        // Find the user by email
        $user = User::byEmail($email);

        // Check if the user exists
        if (!$user) {
            abort(404); // If the user doesn't exist, return a 404 error
        }

        // Check if a reminder exists for the Sentinel user
            $reminder = EloquentReminder::where('completed', false)
                ->where('user_id', $user->id)
                ->first();

        // dd($reminder);
            if ($reminder && $resetCode == $reminder->code) {
                return view('authentication.reset-password')->with('success', 'Reset code is valid.');
            } else {
            return redirect('/')->with('error', 'Invalid reset code.');
            }
    }

    public function postResetPassword(Request $request, $email, $resetCode)
    {
        $this->validate($request, [
            'password' => 'confirmed|required|min:5|max:10',
            'password_confirmation' => 'required|min:5|max:10'
        ]);
        $user = User::byEmail($email);

        // Check if the user exists
        if (!$user) {
            abort(404); // If the user doesn't exist, return a 404 error
        }

        // Check if a reminder exists for the Sentinel user
            $reminder = EloquentReminder::where('completed', false)
                ->where('user_id', $user->id)
                ->first();

            if ($reminder && $resetCode == $reminder->code) {
                Reminder::complete($user, $resetCode, $request->password);

        return redirect('/login')->with('success', 'Please login with your new password');
        } else {
            // Add an error flash message
            return redirect('/')->withErrors(['error' => 'Invalid reset code.']);
        }
    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.forgot-password', [
            'user' => $user,
            'code' => $code
        ], function ($message) use ($user) {
            $message->to($user->email);
            $message->from('sentinellv3@gmail.com', 'Your Sender Name');
            $message->subject("Hello $user->first_name, reset your password.");
        });
    }
}