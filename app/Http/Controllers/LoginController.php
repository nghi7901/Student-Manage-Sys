<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login', [
            'title' => 'Đăng nhập'
        ]);
    }

    public function checkLogin(Request $request){
        $this -> validate($request, [
            'username' => 'required|email:filter',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request -> input('username'), 'password' => $request -> input('password')])){
            return redirect()->route('home');
        }

        session()->flash('error', 'Sai username hoac password');
        return redirect()->back();
    }
}
