<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        if ($request->wantsJson()) {
            return response()->json(['redirect' => url('/dashboard')]);
        } else {
            return $this->authenticated($request, Auth::user())
                ?: redirect()->intended($this->redirectPath());
        }
    }
}
