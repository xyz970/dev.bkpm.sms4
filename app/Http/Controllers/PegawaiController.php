<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request,$nama)
    {
        echo $nama;
        
        /**
         * uncomment kode dibawah ini untuk mendapatkan segment value di suatu url
         * i.e: 
         * localhost/blabla/aaa 
         * akan menampilkan aaa. 
         */
        // return $request->segment(2);
    }
}
