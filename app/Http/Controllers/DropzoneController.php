<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    public function index()
    {
        return view('dropzone');
    }
    public function store(Request $request)
    {
        $image = $request->file('file');
        // dd($request);
        $imageName = time() . ' ' . $image->extension();
        $image->move(public_path('img/dropzone'), $imageName);
        return response()->json(['success' => $imageName]);
    }
    public function store_pdf(Request $request)
    {
        $pdf = $request->file('file');
        $pdfName = 'pdf' . time() . '.' . $pdf->extension();
        $pdf->move(public_path('pdf/dropzone'), $pdfName);
        return response()->json(['success' . $pdfName]);
    }
}
