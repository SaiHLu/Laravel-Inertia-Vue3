<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    use ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return Inertia::render('Backend/Auth/Login');
    }

    public function username()
    {
        return 'email';
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // NOTE: prevent brute force attacks
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::guard('admin')->attempt($request->only(['email', 'password']), $request->filled('remember_me'))) {
            return redirect()->route('admin.dashboard');
        }

        $this->incrementLoginAttempts($request);

        return redirect()->back()->with('error', 'Invalid Credentials, Try again.');
    }
}
