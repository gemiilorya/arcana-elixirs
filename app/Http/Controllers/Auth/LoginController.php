<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use App\Providers\RouteServiceProvider; // Ensure this class exists in the specified namespace
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended($this->redirectTo);
    }
}