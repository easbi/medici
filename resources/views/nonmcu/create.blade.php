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
                            <form action="{{route('nonmcu.store')}}" method="POST" enctype="multipart/form-data">                        
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
                                    <label for="jenis_pemeriksaan">Jenis Pemeriksaan</label>
                                    <select class="form-control" name="jenis_pemeriksaan">
                                        <option value="" selected disabled>Pilih</option>
                                        @foreach($jenis_pemeriksaan as $key => $jp)
                                        <option value="{{$key}}">{{$jp}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label>Nilai/Parameter Hasil Pemeriksaan</label>
                                    <input type="number" class="form-control" name="nilai">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Rekomendasi/Catatan</label>
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
