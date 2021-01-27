<?php

namespace App\Http\Controllers;

use App\Mcu;
use App\User;

use Auth;
use DB;
use Session;
use Illuminate\Http\Request;
use App\Exports\McuExport;
use App\Imports\McuImport;
use Maatwebsite\Excel\Facades\Excel;

// use App\Exports\PemeriksaanExport;
// use App\Imports\McuImport;
// use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class McuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mcu = DB::table('mcu_pemeriksaan')
            ->join('users', 'mcu_pemeriksaan.id_user_diperiksa', '=', 'users.id')
            ->join('master_petugas', 'mcu_pemeriksaan.petugas', '=', 'master_petugas.id')  
            ->select('mcu_pemeriksaan.*', 'users.nama', 'master_petugas.nama_petugas', 'users.jenis_kelamin', 'users.unit_kerja')
            ->orderby('mcu_pemeriksaan.id','asc')
            ->get();
        // dd($mcu);
        $MaxPemeriksaan = DB::table('mcu_pemeriksaan')->max('pemeriksaan_ke');

        // Darah tinggi
        $darah_tinggi = DB::table('mcu_pemeriksaan')
            ->where('tensi_sistol', '>', 120)
            ->orWhere('tensi_diastol', '>', 80)
            ->get();

        $darah_tinggi = $darah_tinggi->where('pemeriksaan_ke', '=', $MaxPemeriksaan)->count();
        // kolestrol
        $kolestrol = DB::table('mcu_pemeriksaan')
            ->where('pemeriksaan_ke', '=', $MaxPemeriksaan)
            ->where('kolestrol', '>', 230)->count();
        
        // asam urat
        $asam_urat_p = $mcu->where('jenis_kelamin', '=', 'P')->where('asam_urat', '>', '6')->where('pemeriksaan_ke', '=', $MaxPemeriksaan)->count();        
        $asam_urat_l = $mcu->where('jenis_kelamin', '=', 'L')->where('asam_urat', '>', '7')->where('pemeriksaan_ke', '=', $MaxPemeriksaan)->count();
        $asam_urat = $asam_urat_p + $asam_urat_l;

        // Darah tinggi by pemeriksaan_ke
        $darah_tinggi_by_pemeriksaan = DB::table('mcu_pemeriksaan')->select('pemeriksaan_ke', DB::raw('if(tensi_diastol > 80 AND tensi_sistol > 120, 1, 0) as jumlah'))->get();  

        // dd($darah_tinggi_by_pemeriksaan);
        $darah_tinggi_by_pemeriksaan = $darah_tinggi_by_pemeriksaan->groupby('pemeriksaan_ke')
            ->map(function ($row) {
                return $row->sum('jumlah');
            })
            ->toArray();;
        // dd($darah_tinggi_by_pemeriksaan);
        $darah_tinggi_periode = json_encode(array_keys($darah_tinggi_by_pemeriksaan), JSON_NUMERIC_CHECK);
        $darah_tinggi_jumlah = json_encode(array_values($darah_tinggi_by_pemeriksaan), JSON_NUMERIC_CHECK);

        return view('mcu.index', compact('mcu', 'kolestrol', 'asam_urat', 'darah_tinggi', 
            'darah_tinggi_jumlah', 'darah_tinggi_periode'));
        // return view('pemeriksaan.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nama_pegawai = DB::table('users')->pluck('nama', 'id');
        $nama_petugas = DB::table('master_petugas')->pluck('nama_petugas', 'id');
        return view('mcu.create', compact('nama_pegawai', 'nama_petugas'));
    }

    public function create_import()
    {
        return view('mcu.importexcel');
    }

    public function export_excel() 
    {
        return Excel::download(new McuExport, 'mcu.xlsx');
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
        $file->move('file_import',$nama_file);
 
        // import data
        Excel::import(new McuImport, public_path('/file_import/'.$nama_file));
 
        // notifikasi dengan session
        // Session::flash('sukses','Data Berhasil Diimport!');
 
        // alihkan halaman kembali
        return redirect('/mcu');
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
            'umur' => 'required',
            'petugas' => 'required',
            'tinggi_badan' => 'required|numeric|max:200',
            'berat_badan' => 'required|numeric',
            'suhu' => 'required',
            'nadi' => 'required|numeric',
            'pernapasan' => 'required|numeric',
            'saturasi' => 'required|numeric',
            'tensi_sistol' => 'required',
            'tensi_diastol' => 'required',
            'asam_urat' => 'required',
            'gula_puasa' => 'required|numeric',
            'kolestrol' => 'required|numeric',
            'rekomendasi' => 'required'
        ]);

        # start  to renumbering pemeriksaan_ke
        $noPemeriksaanMax = DB::table('mcu_pemeriksaan')->where('id_user_diperiksa', '=', $request->nama_pegawai)->max('pemeriksaan_ke');
        if ($noPemeriksaanMax == null) {
            $noPemeriksaanMax = 1;
        } else {
            $noPemeriksaanMax++;
        }

        $pemeriksaan = Mcu::create([            
            'id_user_diperiksa'  =>  $request->nama_pegawai,
            'tgl_pemeriksaan'     => $request->tgl_pemeriksaan,
            'pemeriksaan_ke' => $noPemeriksaanMax,
            'umur' => $request->umur,
            'petugas'   => $request->petugas,
            'tinggi_badan'   => $request->tinggi_badan,
            'berat_badan'   => $request->berat_badan,
            'suhu'   => $request->suhu,
            'nadi'   => $request->nadi,
            'pernapasan'   => $request->pernapasan,
            'saturasi'   => $request->saturasi,
            'tensi_sistol'   => $request->tensi_sistol,
            'tensi_diastol' => $request->tensi_diastol,
            'asam_urat'   => $request->asam_urat,
            'gula_puasa'   => $request->gula_puasa,
            'gula_sewaktu' => $request->gula_sewaktu,
            'kolestrol'   => $request->kolestrol,
            'rekomendasi'   => $request->rekomendasi
        ]);
        // dd($request->rekomendasi);
        if($pemeriksaan){
            //redirect dengan pesan sukses
            return redirect()->route('mcu.create')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('mcu.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mcu  $mcu
     * @return \Illuminate\Http\Response
     */
    public function show($id_user_diperiksa)
    {
        $pemeriksaan = DB::table('mcu_pemeriksaan')
            ->join('users', 'mcu_pemeriksaan.id_user_diperiksa', '=', 'users.id')
            ->join('master_petugas', 'mcu_pemeriksaan.petugas', '=', 'master_petugas.id')  
            ->select('mcu_pemeriksaan.*', 'users.nama', 'master_petugas.nama_petugas', 'users.jenis_kelamin')
            ->where('id_user_diperiksa', '=', $id_user_diperiksa)
            ->orderby('id', 'desc')
            ->get();
        $data_fulan = $pemeriksaan->where('pemeriksaan_ke', $pemeriksaan->max('pemeriksaan_ke'))->first();

        // $indikator1 = '';
        // if ($data_fulan->jenis_kelamin = "P" && ($data_fulan->asam_urat > 6.0)) {
        //     $indikator1 = 'PR AU';
        // } elseif ($data_fulan->jenis_kelamin = "L" && ($data_fulan->asam_urat > 7.0)) {
        //     $indikator1 = 'LK AU';
        // } else {
        //     $indikator1 = 'SEHAT!!';
        // }
        
        return view('mcu.show', compact('data_fulan','pemeriksaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mcu  $mcu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nama_pegawai = DB::table('users')->get();
        $nama_petugas = DB::table('master_petugas')->get();
        $pemeriksaanmcu = DB::table('mcu_pemeriksaan')->where('id', $id)->first();
        // dd($nama_pegawai);
        return view('mcu.edit', compact('pemeriksaanmcu', 'nama_pegawai', 'nama_petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mcu  $mcu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pemeriksaanmcu = \App\Mcu::find($id);
        $request->validate([
            'tgl_pemeriksaan' => 'required',
            'nama_pegawai' => 'required',
            'umur' => 'required',
            'petugas' => 'required',
            'tinggi_badan' => 'required|numeric|max:200',
            'berat_badan' => 'required|numeric',
            'suhu' => 'required',
            'nadi' => 'required|numeric',
            'pernapasan' => 'required|numeric',
            'saturasi' => 'required|numeric',
            'tensi_sistol' => 'required',
            'tensi_diastol' => 'required',
            'asam_urat' => 'required',
            'gula_puasa' => 'required|numeric',
            'kolestrol' => 'required|numeric',
            'rekomendasi' => 'required'
        ]);

        Mcu::find($id)->update($request->all());

        return redirect()->route('mcu.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mcu  $mcu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mcu = \App\Mcu::find($id);
        $mcu->delete();
        return redirect('mcu')->with('success','Data Pemeriksaan MCU telah dihapus');
    }
}
