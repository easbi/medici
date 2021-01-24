@extends('layouts.app')
@section('content')
    <body style="background: lightgray">

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('pemeriksaanmcu.update', $pemeriksaanmcu->id) }}" method="POST">                        
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="petugas">Nama Petugas</label>
                                    <select class="form-control" name="petugas">
                                        @foreach($nama_petugas as $petugas)
                                            <option value={{$petugas->id }} {{$petugas->id == $pemeriksaanmcu->petugas ? 'selected="selected"' : ''}}>{{$petugas->nama_petugas}}</option>
                                        @endforeach                                        
                                    </select>                                    
                                </div> 
                                <div class="form-group">
                                    <label>Tanggal Pemeriksaan</label>
                                    <input type="date" class="form-control" name="tgl_pemeriksaan" readonly="readonly" value="{{ $pemeriksaanmcu->tgl_pemeriksaan }}">
                                </div> 
                                <div class="form-group">
                                    <label for="nama_pegawai">Nama Pegawai</label>
                                    <select class="form-control" name="nama_pegawai">
                                        @foreach($nama_pegawai as $pegawai)
                                            <option value={{$pegawai->id }} {{$pegawai->id == $pemeriksaanmcu->id_user_diperiksa ? 'selected="selected"' : ''}}>{{$pegawai->nama_pegawai}}</option>
                                        @endforeach                                        
                                    </select> 
                                </div>    
                                <div class="form-group">
                                    <label>Umur</label>
                                    <input type="number" class="form-control" name="umur" value="{{ $pemeriksaanmcu->umur }}">
                                </div>                      
                                <div class="form-group">
                                    <label>Tinggi Badan</label>
                                    <input type="number" class="form-control" name="tinggi_badan" value="{{ $pemeriksaanmcu->tinggi_badan }}">
                                </div>
                                <div class="form-group">
                                    <label>Berat Badan</label>
                                    <input type="number" class="form-control" name="berat_badan" value="{{ $pemeriksaanmcu->berat_badan }}">
                                </div>
                                <div class="form-group">
                                    <label>Suhu Badan</label>
                                    <input type="number" class="form-control" name="suhu" step="0.1" value="{{ $pemeriksaanmcu->suhu }}">
                                </div>
                                <div class="form-group">
                                    <label>Nadi</label>
                                    <input type="number" class="form-control" name="nadi" value="{{ $pemeriksaanmcu->nadi }}">
                                </div>
                                <div class="form-group">
                                    <label>pernapasan</label>
                                    <input type="number" class="form-control" name="pernapasan" value="{{ $pemeriksaanmcu->pernapasan }}">
                                </div>
                                <div class="form-group">
                                    <label>Saturasi</label>
                                    <input type="number" class="form-control" name="saturasi" value="{{ $pemeriksaanmcu->saturasi }}">
                                </div>
                                <div class="form-group">
                                    <label>Tensi Sistol</label>
                                    <input type="number" class="form-control" name="tensi_sistol" value="{{ $pemeriksaanmcu->tensi_sistol }}">
                                </div>
                                <div class="form-group">
                                    <label>Tensi Diastol</label>
                                    <input type="number" class="form-control" name="tensi_diastol" value="{{ $pemeriksaanmcu->tensi_diastol }}">
                                </div>
                                <div class="form-group">
                                    <label>Asam Urat</label>
                                    <input type="number" class="form-control" name="asam_urat" step="0.1" value="{{ $pemeriksaanmcu->asam_urat }}">
                                </div>
                                <div class="form-group">
                                    <label>Gula Puasa</label>
                                    <input type="number" class="form-control" name="gula_puasa" value="{{ $pemeriksaanmcu->gula_puasa }}">
                                </div>
                                <div class="form-group">
                                    <label>Gula Sewaktu (Opsional)</label>
                                    <input type="number" class="form-control" name="gula_sewaktu" value="{{ $pemeriksaanmcu->gula_sewaktu }}">
                                </div>
                                <div class="form-group">
                                    <label>Kolestrol</label>
                                    <input type="number" class="form-control" name="kolestrol" value="{{ $pemeriksaanmcu->kolestrol }}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Rekomendasi</label>
                                    <textarea class="form-control" name="rekomendasi" placeholder="Masukkan Rekomendasi">{{ $pemeriksaanmcu->rekomendasi}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-md btn-warning">Reset</button>
                            </form>                                                            
                            <script>CKEDITOR.replace( 'rekomendasi' );</script> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
