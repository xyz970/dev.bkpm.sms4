<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function create(Request $request)
    {
        //Simpan session dengan key nama
        Session::put('nama','Politeknik Negeri Jember');
        echo "Data ditambahkan ke session";
    }

    public function show(Request $request)
    {
        //Cek session apakah ada key nama
        if (Session::has('nama')) {
            // Jika iya, tampilkan session
            echo Session::get('nama');
        } else {
            //Jika tidak tammpilkan "Tidak ada dalam session"
            echo "Tidak ada dalam session";
        }
    }

    public function delete(Request $request)
    {
        //Hapus session dengan key nama
        $request->session()->forget('nama');
        echo "Data telah dihapus dari session";
    }
}
