<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikan = Pendidikan::all();
       return $this->printResponse($pendidikan);
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
        $input = $request->only(['nama','tingkatan','tahun_masuk','tahun_keluar']);
        Pendidikan::create($input);
        return $this->printResponse(null,'ok', 'Pendidikan berhasil ditambahkan',201);
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
        $input = $request->only(['nama','tingkatan','tahun_masuk','tahun_keluar']);
        $pendidikan = Pendidikan::find($id);
        $pendidikan->update($input);
        return $this->printResponse(null,'ok', 'Pendidikan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendidikan = Pendidikan::find($id);
        $pendidikan->delete();
        return $this->printResponse(null,'ok', 'Pendidikan berhasil dihapus');
    }

    /**
     * 
     * function print response
     * @param string|array $data
     * @param string $status
     * @param string $message
     * @param int $statusCode 
     */
    public function printResponse($data = null,$status = '',$message = '',$statusCode = 200)
    {
        return response()->json($data== null ? [
            'status'=>$status,
            'message'=>$message
        ] : $data,$statusCode);
        
    }
}
