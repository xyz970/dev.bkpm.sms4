<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(Request $request)
    {
        //Simpan session dengan key nama
        $request->session()->put('nama','Politeknik Negeri Jember');
        echo "Data ditambahkan ke session";
    }

    public function show(Request $request)
    {
        //Cek session apakah ada key nama
        if ($request->has('nama')) {
            // Jika iya, tampilkan session
            echo $request->session()->get('nama');
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
