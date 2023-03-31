<?php

namespace App\Http\Controllers;

use App\Events\BroadcastMessage;
use App\Models\Pendidikan;
use Illuminate\Broadcasting\BroadcastEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class PendidikanController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pendidikan = Pendidikan::all(); //Ambil semua data berdasarkan model
        return view('admin.data-pendidikan',compact('pendidikan')); //Passing value nya ke view
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
        
        $input = $request->only(['nama','tingkatan','tahun_masuk','tahun_keluar']); //ambil input yang dibutuhkan
        Pendidikan::create($input); //Masukkan data berdasarkan input yang telah diambil
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
        $input = $request->only(['nama','tingkatan','tahun_masuk','tahun_keluar']); //ambil input yang dibutuhkan
        $pendidikan = Pendidikan::find($id); //temukan data sesuai dengan parameter $id
        $pendidikan->update($input); //ubah data berdasarkan input yang telah diambil
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
        $pendidikan = Pendidikan::find($id); //temukan data sesuai dengan parameter $id
        $pendidikan->delete(); //Hapus data
        return redirect()->back()->with('success','Data berhasil dihapus');// arahkan kembali ke tampilan sebelumnya
    }
}
