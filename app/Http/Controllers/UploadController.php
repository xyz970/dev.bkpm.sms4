<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }
    public function proses_upload(Request $request)
    {
        $this->validate($request, ['file' => 'required', 'keterangan' => 'required']);

        /** 
         * Uncomment kode dibawah ini untuk melihat proses upload dengan tidak me-resize ukuran foto
        */
         
        // // menyimpan data file yang diupload ke variabel $file
        // $file = $request->file('file');

        // // nama file
        // echo 'File Name: ' . $file->getClientOriginalName();
        // echo '<br>';

        // // ekstensi file
        // echo 'File Extension: ' . $file->getClientOriginalExtension();
        // echo '<br>';

        // // real path
        // echo 'File Real Path: ' . $file->getRealPath();
        // echo '<br>';

        // // ukuran file
        // echo 'File Size: ' . $file->getSize();
        // echo '<br>';

        // // tipe mime
        // echo 'File Mime Type: ' . $file->getMimeType();

        // // isi dengan nama folder tempat kemana file diupload
        // $tujuan_upload = 'data_file';

        // // upload file
        // $file->move($tujuan_upload, $file->getClientOriginalName());

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $actual_image = Image::make($file->getRealPath());

        // Resize tinggi dengan ukuran tinggi image asli / 4
        $height = $actual_image->height() / 4;

        // Resize lebar dengan ukuran lebar image asli / 4
        $width = $actual_image->width() / 4;

        // Resize tinggi dengan ukuran tinggi image asli / 4 dan lebar dengan ukuran lebar image asli / 4 upload ke folder public/data_file
        $actual_image->resize($width,$height)->save('data_file/'.$filename);

        // $file->storeAs(public_path().'/assets/img/temporary/',$filename);
        // $file->move(public_path('assets/img/temporary/'), $filename);
        return $filename;
    }
}
