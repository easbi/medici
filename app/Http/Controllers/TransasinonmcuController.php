<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaannonmcu;
use Illuminate\Http\Request;
use DB;
use App\Models\Pegawai;
use App\Exports\PemeriksaannonmcuExport;
use App\Imports\PemeriksaannonmcuImport;
use Maatwebsite\Excel\Facades\Excel;

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
            ->join('master_jenis_pemeriksaan', 'nonmcu_pemeriksaan.id_jenis_pemeriksaan', '=', 'master_jenis_pemeriksaan.id')  
            ->select('nonmcu_pemeriksaan.*', 'master_pegawai.nama_pegawai', 'master_petugas.nama_petugas', 'master_pegawai.jenis_kelamin', 'master_pegawai.unit_kerja', 'master_jenis_pemeriksaan.jenis_pemeriksaan')
            ->orderby('nonmcu_pemeriksaan.id','asc')
            ->get();
        return view('pemeriksaannonmcu.index', compact('nonmcu_pemeriksaans'));

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

    public function export_excel() 
    {
        return Excel::download(new PemeriksaannonmcuExport, 'nonmcu.xlsx');
    }

    public function import_excel(Request $request) 
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_import_non_mcu',$nama_file);
 
        // import data
        Excel::import(new PemeriksaannonmcuImport, public_path('/file_import_non_mcu/'.$nama_file));
 
        // notifikasi dengan session
        // Session::flash('sukses','Data Berhasil Diimport!');
 
        // alihkan halaman kembali
        return redirect('/pemeriksaannonmcu');
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
    public function show($id_user_diperiksa)
    {
        $pemeriksaan = DB::table('nonmcu_pemeriksaan')
            ->join('master_pegawai', 'nonmcu_pemeriksaan.id_user_diperiksa', '=', 'master_pegawai.id')
            ->join('master_petugas', 'nonmcu_pemeriksaan.id_petugas', '=', 'master_petugas.id')
            ->join('master_jenis_pemeriksaan', 'nonmcu_pemeriksaan.id_jenis_pemeriksaan', '=', 'master_jenis_pemeriksaan.id')
            ->select('nonmcu_pemeriksaan.*', 'master_pegawai.nama_pegawai', 'master_petugas.nama_petugas', 'master_pegawai.jenis_kelamin', 'master_jenis_pemeriksaan.jenis_pemeriksaan')
            ->where('id_user_diperiksa', '=', $id_user_diperiksa)
            ->orderby('id', 'desc')
            ->get();

        return view('pemeriksaannonmcu.show', compact('pemeriksaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemeriksaannonmcu  $pemeriksaannonmcu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nama_pegawai = DB::table('master_pegawai')->get();
        $nama_petugas = DB::table('master_petugas')->get();
        $nama_pemeriksaan = DB::table('master_jenis_pemeriksaan')->get();
        $pemeriksaannonmcu = DB::table('nonmcu_pemeriksaan')->where('id', $id)->first();
        // dd($pemeriksaannonmcu);
        return view('pemeriksaannonmcu.edit', compact('pemeriksaannonmcu', 'nama_pegawai', 'nama_petugas', 'nama_pemeriksaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemeriksaannonmcu  $pemeriksaannonmcu
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $pemeriksaanmcu = \App\Models\Pemeriksaannonmcu::find($id);
        $request->validate([
            'id_user_diperiksa'=> 'required|numeric',
            'tgl_pemeriksaan'=> 'required',
            'id_petugas'=>'required|numeric',
            'id_jenis_pemeriksaan'=> 'required|numeric',
            'nilai'=> 'required|numeric'
        ]);

        Pemeriksaannonmcu::find($id)->update($request->all());

        return redirect()->route('pemeriksaannonmcu.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemeriksaannonmcu  $pemeriksaannonmcu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = \App\Models\Pemeriksaannonmcu::find($id);
        $transaksi->delete();
        return redirect('pemeriksaannonmcu')->with('success','Data Pemeriksaan MCU telah dihapus');
    }
}
