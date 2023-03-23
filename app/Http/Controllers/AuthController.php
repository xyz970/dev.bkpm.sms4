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
        $input = $r->only(['username', 'password']); //ambil input yang dibutuhkan
        // Lakukan proses login ketika login berhasil akan diarahkan ke tampilan dashboard, jika tidak maka akan diarahkan kembali ke login
        if (Auth::attempt($input)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back();
        }
    }
    public function regist_page()
    {
        return view('register');
    }
    public function register(RegisterRequest $r)
    {
        $r->validate(); //Validasi request
        User::create($r->all());
        return redirect()->route('index');
    }
    public function logout()
    {
        Auth::logout(); //Lakukan proses logout
        return redirect()->route('index');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
