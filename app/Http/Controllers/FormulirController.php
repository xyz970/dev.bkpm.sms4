<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulirController extends Controller
{
    public function index()
    {
        return view('formulir');
    }
    public function insert(Request $request)
    {
        // $request->only dapat mengambil lebih dari satu field input..
        /**
         * Direkomendasikan untuk menggunakan only daripada menggunakan input dan all.. 
         * Info selengkapnya bisa di cek di dokumentasi laravel
         * https://laravel.com/docs/9.x/requests
         */

        $messages = ['required' => 'Input :attribute wajib diisi!', 'min' => 'Input :attribute harus diisi minimal :min karakter!', 'max' => 'Input :attribute harus diisi maksimal :max karakter!',];
        $this->validate($request, ['nama' => 'required|min:5|max:20', 'alamat' => 'required|alpha'], $messages);
        $input = $request->only(['nama', 'alamat']);
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        return "Nama: " . $nama . ", Alamat: " . $alamat;
    }
}
