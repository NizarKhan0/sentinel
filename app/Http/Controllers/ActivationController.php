<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class ActivationController extends Controller
{
    public function activate($email, $activationCode)
    {

        $user = User::whereEmail($email)->first();

        if(Activation::complete($user, $activationCode))
        {
            return redirect('/login');
        }else{

        }
    }
}