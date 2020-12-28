<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaannonmcu;
use Illuminate\Http\Request;
use DB;
use App\Models\Pegawai;

class TransasinonmcuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nonmcu_pemeriksaans = DB::table('nonmcu_pemeriksaan')
            ->join('master_pegawai', 'nonmcu_pemeriksaan.id_user_diperiksa', '=', 'master_pegawai.id')
            ->join('master_petugas', 'nonmcu_pemeriksaan.id_petugas', '=', 'master_petugas.id')  
            ->select('mcu_pemeriksaan.*', 'master_pegawai.nama_pegawai', 'master_petugas.nama_petugas', 'master_pegawai.jenis_kelamin', 'master_pegawai.unit_kerja')
            ->orderby('mcu_pemeriksaan.id','asc')
            ->get();
        dd($nonmcu_pemeriksaans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nama_pegawai = DB::table('master_pegawai')->pluck('nama_pegawai', 'id');
        $nama_petugas = DB::table('master_petugas')->pluck('nama_petugas', 'id');
        $jenis_pemeriksaan = DB::table('master_jenis_pemeriksaan')->pluck('jenis_pemeriksaan', 'id');
        return view('pemeriksaannonmcu.create', compact('nama_pegawai', 'nama_petugas', 'jenis_pemeriksaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_pemeriksaan' => 'required',
            'nama_pegawai' => 'required',
            'petugas' => 'required',
            'jenis_pemeriksaan' => 'required',
            'nilai' => 'required'
        ]);


        $pemeriksaannonmcu = Pemeriksaannonmcu::create([            
            'id_user_diperiksa'  =>  $request->nama_pegawai,
            'id_petugas'   => $request->petugas,
            'tgl_pemeriksaan'     => $request->tgl_pemeriksaan,
            'id_jenis_pemeriksaan' => $request->jenis_pemeriksaan,
            'nilai' => $request->nilai,
            'rekomendasi'   => $request->rekomendasi
        ]);
        // dd($request->rekomendasi);
        if($pemeriksaannonmcu){
            //redirect dengan pesan sukses
            return redirect()->route('pemeriksaannonmcu.create')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('pemeriksaannonmcu.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemeriksaannonmcu  $pemeriksaannonmcu
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeriksaannonmcu $pemeriksaannonmcu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemeriksaannonmcu  $pemeriksaannonmcu
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemeriksaannonmcu $pemeriksaannonmcu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemeriksaannonmcu  $pemeriksaannonmcu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemeriksaannonmcu $pemeriksaannonmcu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemeriksaannonmcu  $pemeriksaannonmcu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeriksaannonmcu $pemeriksaannonmcu)
    {
        //
    }
}
