@extends('layouts.afterlogin')
@section('content')
    <body style="background: lightgray">

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

        <div class="container mt-5 mb-5">
            <div class="row">
                @if ($message = Session::get('success'))
                <div class="col-sm-4 col-md-4">
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p>{{ $message }}</p>
                    </div>
                </div>
                @endif
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{route('mcu.store')}}" method="POST" enctype="multipart/form-data">                        
                                @csrf
                                <div class="form-group">
                                    <label for="petugas">Nama Petugas</label>
                                    <select class="form-control" name="petugas">
                                        <option value="1" selected>Sekar</option>
                                        @foreach($nama_petugas as $key => $petugas)
                                        <option value="{{$key}}">{{$petugas}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label>Tanggal Pemeriksaan</label>
                                    <input type="date" class="form-control" name="tgl_pemeriksaan">
                                </div> 
                                <div class="form-group">
                                    <label for="nama_pegawai">Nama Pegawai</label>
                                    <select class="form-control" name="nama_pegawai">
                                        <option value="" selected disabled>Pilih</option>
                                        @foreach($nama_pegawai as $key => $pegawai)
                                        <option value="{{$key}}">{{$pegawai}}</option>
                                        @endforeach
                                    </select>
                                </div>    
                                <div class="form-group">
                                    <label>Umur</label>
                                    <input type="number" class="form-control" name="umur">
                                </div>                      
                                <div class="form-group">
                                    <label>Tinggi Badan</label>
                                    <input type="number" class="form-control" name="tinggi_badan">
                                </div>
                                <div class="form-group">
                                    <label>Berat Badan</label>
                                    <input type="number" class="form-control" name="berat_badan">
                                </div>
                                <div class="form-group">
                                    <label>Suhu Badan</label>
                                    <input type="number" class="form-control" name="suhu" step="0.1">
                                </div>
                                <div class="form-group">
                                    <label>Nadi</label>
                                    <input type="number" class="form-control" name="nadi">
                                </div>
                                <div class="form-group">
                                    <label>pernapasan</label>
                                    <input type="number" class="form-control" name="pernapasan">
                                </div>
                                <div class="form-group">
                                    <label>Saturasi</label>
                                    <input type="number" class="form-control" name="saturasi">
                                </div>
                                <div class="form-group">
                                    <label>Tensi Sistol</label>
                                    <input type="number" class="form-control" name="tensi_sistol">
                                </div>
                                <div class="form-group">
                                    <label>Tensi Diastol</label>
                                    <input type="number" class="form-control" name="tensi_diastol">
                                </div>
                                <div class="form-group">
                                    <label>Asam Urat</label>
                                    <input type="number" class="form-control" name="asam_urat" step="0.1">
                                </div>
                                <div class="form-group">
                                    <label>Gula Puasa</label>
                                    <input type="number" class="form-control" name="gula_puasa">
                                </div>
                                <div class="form-group">
                                    <label>Gula Sewaktu (Opsional)</label>
                                    <input type="number" class="form-control" name="gula_sewaktu">
                                </div>
                                <div class="form-group">
                                    <label>Kolestrol</label>
                                    <input type="number" class="form-control" name="kolestrol">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Rekomendasi</label>
                                    <textarea class="form-control" name="rekomendasi" placeholder="Masukkan Rekomendasi"></textarea>
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
