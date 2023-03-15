<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $r)
    {
        $input = $r->only(['username','password']);
        if (Auth::attempt($input)) {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back();
        }
    }
    public function regist_page()
    {
        return view('register');
    }
    public function register(RegisterRequest $r)
    {
        if ($r->validated()) {
            User::create($r->all());
            return redirect()->route('index');
        }else {
            return redirect()->back()->withErrors($r->validate());
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
