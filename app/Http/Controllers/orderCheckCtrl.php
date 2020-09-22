<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderCheckCtrl extends Controller
{
    public function ocheck()
   {
    if (Auth::check())
    {
        return redirect()->route('creatingorder');
    }
    return redirect('login');
   }
}
