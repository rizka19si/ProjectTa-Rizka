<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('Admin/adminLogin');
    }
    //
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->put('email',$request->email);
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('email');
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/adminlogin');
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();
        $request->session()->forget('email');
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('User/indexLogin');
    }
}
