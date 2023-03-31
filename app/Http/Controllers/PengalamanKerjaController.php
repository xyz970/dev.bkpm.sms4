<?php

namespace App\Http\Controllers;

use App\Models\PengalamanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;
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
        $pengalamanKerja = DB::table('pengalaman_kerja')->get(); //Ambil semua data berdasarkan table(menggunakan Query Builder)
        return view('admin.data-pengalaman_kerja',compact('pengalamanKerja')); //Passing value nya ke view

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
        $input = $request->only(['nama','jabatan','tahun_masuk','tahun_keluar']); //ambil input yang dibutuhkan
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            array('cluster' => env('PUSHER_APP_CLUSTER'))
        );
        
        $pusher->trigger(
            'my-channel',
            'my-event',
            'Data Baru telah ditambahkan'
        );
        DB::table('pengalaman_kerja')->insert($input); //Simpan data berdasarkan input yang telah diambil (Query Builder)
        return redirect()->back()->with('success','Data berhasil ditambahkan'); // arahkan kembali ke tampilan sebelumnya
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
        DB::table('pengalaman_kerja')->where('id','=',$id)->update($input); //ubah data berdasarkan input yang telah diambil
        // $pk = PengalamanKerja::find($id);
        // $pk->update($input);
        return redirect()->back()->with('success','Data berhasil diubah'); // arahkan kembali ke tampilan sebelumnya
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
        DB::table('pengalaman_kerja')->delete($id); //temukan data sesuai dengan parameter $id dan hapus data yang telah ditemukan
        return redirect()->back()->with('success','Data berhasil dihapus'); // arahkan kembali ke tampilan sebelumnya
    }
}
