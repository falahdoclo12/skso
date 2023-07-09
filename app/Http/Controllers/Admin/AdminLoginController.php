<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('pages.admin.login');
    }

    public function admin_login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        $kredensil = $request->only('email', 'password');

        if (Auth::attempt($kredensil)) {
            $admin = Auth::Admin();
            if ($admin) {
                return redirect()->route('pages.admin.dashboard');
            }
        } else {
            return redirect('/Admin')->with(['error' => 'Email Dan Password Salah !']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect()->route('pages.admin.login');
    }
}
