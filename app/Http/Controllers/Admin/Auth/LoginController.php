<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware(['auth', 'prevent-back-history'])->only('logout');
        $this->middleware('prevent-back-history')->only('showLoginForm');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Function validate credentials then login
     *
     * @param Request $request  username or email and password
     * @return void
     */
    public function login(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        if (!auth()->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->back()->with('error', __('auth.failed'))->withInput($request->except("password"));
        }
        return redirect()->route('admin.dashboard');
    }

    /**
     * Function logout
     *
     */
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.loginForm');
    }



}
