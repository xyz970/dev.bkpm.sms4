<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(Request $request)
    {
        $request->session()->put('nama','Politeknik Negeri Jember');
        echo "Data ditambahkan ke session";
    }

    public function show(Request $request)
    {
        if ($request->has('nama')) {
            echo $request->session()->get('nama');
        } else {
            echo "Tidak ada dalam session";
        }
    }

    public function delete(Request $request)
    {
        $request->session()->forget('nama');
        echo "Data telah dihapus dari session";
    }
}
