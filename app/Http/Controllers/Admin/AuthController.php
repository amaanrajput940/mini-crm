<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('Admin.pages.login');
    }

    public function signin(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard/companies');
        }
        return redirect()->back()->with('invalid_credentials', 'Oops! You have entered invalid credentials');
    }

    public function logout()
    {
        Session::flush ();
        Auth::logout ();
        return redirect()->to('admin/login');
    }
}
