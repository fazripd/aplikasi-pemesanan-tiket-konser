<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesan_Tiket;
use Illuminate\Support\Carbon;

class PesanTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Pesan_Tiket::max('id');

        return view('pesan-tiket', compact('id'));
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

        $table_no = '000' . $request->id;
        $tgl = substr(str_replace('-', '', carbon::now()), 0, 8);

        $no = $tgl . $table_no;
        $auto = substr($no, 8);
        $auto = intval($auto) + 1;
        $auto_number = substr($no, 0, 8) . str_repeat(0, (4 - strlen($auto))) . $auto;
        $store = Pesan_Tiket::insert([
            'id_tiket' => $auto_number,
            'nik' => $request->nik,
            'tanggal_pesan' => $request->tanggal_pesan,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jk,
            'goldar' => $request->goldar,
        ]);

        return redirect('/cetak_pdf');
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
    public function update(Request $request)
    {
        $idtiket = Pesan_Tiket::select('id_tiket')->where('id', $request->id)->first();
        $update = Pesan_Tiket::where('id', $request->id)->update([
            'id_tiket' => $idtiket['id_tiket'],
            'nik' => $request->nik,
            'tanggal_pesan' => $request->tanggal_pesan,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jk,
            'goldar' => $request->goldar,
        ]);

        return redirect('/admin/pemesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function print()
    {
        return view('print');
    }
    public function search(Request $request)
    {
        $search = Pesan_Tiket::where('nik', $request->id)->get();

        return response()->json($search);
    }
}
