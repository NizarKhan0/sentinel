<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function earnings()
    {
        return view('admins.earnings');
        //return 'Total earnings 9999';
    }
}