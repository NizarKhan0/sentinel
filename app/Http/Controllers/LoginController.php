<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function postLogin(Request $request)
    {

        // return $request->all();

        try {
            $rememberMe = false;

            if (isset($request->rememberMe))
                $rememberMe = true;

            if (Sentinel::authenticate($request->all(), $rememberMe)) {
                $slug = Sentinel::getUser()->roles()->first()->slug;

                if ($slug == 'admin'){
                    return redirect('/earnings');
                }
                elseif($slug == 'manager')
                    return redirect('/tasks');
                //return Sentinel::check();
                //return redirect('/register');

                //dd($request->all());
                }else{
                    return redirect()->back()->with(['error' => 'Wrong credentials']);
                }
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();

            return redirect()->back()->with(compact('delay'))->with(['error' => "You are banned for $delay seconds."]);

        }catch(NotActivatedException $e){
                    return redirect()->back()->with(['error' => 'Your account is not activated!']);
        }
    }

    public function logout()
    {
        Sentinel::logout();

        return redirect('/login');
    }
}
