<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //
    public function index(){
        return view('home');
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
