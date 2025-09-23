<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            flash()->success('Sistemə müvəffəqiyyətlə daxil oldunuz.');
            return redirect()->intended('/dashboard');
        }

        flash()->error('Zəhmət olmasa məlumatların düzgünlüyünü yoxlayın!');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        flash()->success('Sistemdən müvəffəqiyyətlə çıxış etdiniz.');
        return redirect('/');
    }

}
