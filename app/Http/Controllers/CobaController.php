<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->segment(2) !== null) {
            echo $request->segment(2);
        }else {
            /**
             * Dibawah ini kode untuk menampilkan status error
             * untuk selengkapnya cek link berikut
             * https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
             */
            abort(404);
        }
    }
}
