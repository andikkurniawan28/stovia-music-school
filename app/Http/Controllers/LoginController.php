<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function loginAttempt(Request $request){
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'active' => 1]))
        {
            $request->session()->regenerate();
            Log::writeLog('Authentication', 'User is logged in', Auth()->user()->name);
            return redirect()->intended();
        }
        else {
            return redirect()->back()->with('error', 'Username / password salah!.');
        }
    }
}
