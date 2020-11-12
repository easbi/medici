<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pemeriksaan;
use App\Models\Pegawai;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pemeriksaans = DB::table('mcu_pemeriksaan')
            ->join('master_pegawai', 'mcu_pemeriksaan.id_user_diperiksa', '=', 'master_pegawai.id')
            ->join('master_petugas', 'mcu_pemeriksaan.petugas', '=', 'master_petugas.id')  
            ->select('mcu_pemeriksaan.*', 'master_pegawai.nama_pegawai', 'master_petugas.nama_petugas', 'master_pegawai.jenis_kelamin')
            ->orderby('mcu_pemeriksaan.id','asc')
            ->get();
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
        $asam_urat_p = $pemeriksaans->where('jenis_kelamin', '=', 'P')->where('asam_urat', '>', '6')->where('pemeriksaan_ke', '=', $MaxPemeriksaan)->count();        
        $asam_urat_l = $pemeriksaans->where('jenis_kelamin', '=', 'L')->where('asam_urat', '>', '7')->where('pemeriksaan_ke', '=', $MaxPemeriksaan)->count();
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

         
        // // Asam Urat by pemeriksaan_ke
        // $asam_urat_by_pemeriksaan = $pemeriksaans
        //     ->where('asam_urat > 7.0 and jenis_kelamin = L')
        //     ->where('asam_urat > 6.9 and jenis_kelamin = P');
        

        // $asam_urat_by_pemeriksaan = $darah_tinggi_by_pemeriksaan->groupby('pemeriksaan_ke')
        //     ->map(function ($row) {
        //         return $row->sum('jumlah');
        //     })
        //     ->toArray();;
        // $asam_urat_periode = json_encode(array_keys($darah_tinggi_by_pemeriksaan), JSON_NUMERIC_CHECK);
        // $asam_urat_jumlah = json_encode(array_values($darah_tinggi_by_pemeriksaan), JSON_NUMERIC_CHECK);

        return view('pemeriksaan.index', compact('pemeriksaans', 'kolestrol', 'asam_urat', 'darah_tinggi', 
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


        $nama_pegawai = DB::table('master_pegawai')->pluck('nama_pegawai', 'id');
        $nama_petugas = DB::table('master_petugas')->pluck('nama_petugas', 'id');
        return view('pemeriksaan.create', compact('nama_pegawai', 'nama_petugas'));
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

        $pemeriksaan = Pemeriksaan::create([            
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
            return redirect()->route('pemeriksaan.create')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('pemeriksaan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user_diperiksa)
    {
        $pemeriksaan = DB::table('mcu_pemeriksaan')
            ->join('master_pegawai', 'mcu_pemeriksaan.id_user_diperiksa', '=', 'master_pegawai.id')
            ->join('master_petugas', 'mcu_pemeriksaan.petugas', '=', 'master_petugas.id')  
            ->select('mcu_pemeriksaan.*', 'master_pegawai.nama_pegawai', 'master_petugas.nama_petugas', 'master_pegawai.jenis_kelamin')
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
        
        return view('pemeriksaan.show', compact('data_fulan','pemeriksaan'));
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
        //
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


}
