<?php

namespace App\Http\Controllers;

use App\Models\PengalamanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PengalamanKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pengalamanKerja = DB::table('pengalaman_kerja')->get();
        return view('admin.data-pengalaman_kerja',compact('pengalamanKerja'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only(['nama','jabatan','tahun_masuk','tahun_keluar']);
        DB::table('pengalaman_kerja')->insert($input);
        // PengalamanKerja::create($input);
        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->only(['nama','jabatan','tahun_masuk','tahun_keluar']);
        DB::table('pengalaman_kerja')->where('id','=',$id)->update($input);
        // $pk = PengalamanKerja::find($id);
        // $pk->update($input);
        return redirect()->back()->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pk = PengalamanKerja::find($id);
        // $pk->delete();
        DB::table('pengalaman_kerja')->delete($id);
        return redirect()->back()->with('success','Data berhasil dihapus');;
    }
}
