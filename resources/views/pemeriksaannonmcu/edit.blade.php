@extends('layouts.app')
@section('content')
    <body style="background: lightgray">

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('pemeriksaannonmcu.update', $pemeriksaannonmcu->id) }}" method="POST">                        
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="id_petugas">Nama Petugas</label>
                                    <select class="form-control" name="id_petugas">
                                        @foreach($nama_petugas as $petugas)
                                            <option value={{$petugas->id }} {{$petugas->id == $pemeriksaannonmcu->id_petugas ? 'selected="selected"' : ''}}>{{$petugas->nama_petugas}}</option>
                                        @endforeach                                        
                                    </select>                                    
                                </div> 
                                <div class="form-group">
                                    <label>Tanggal Pemeriksaan</label>
                                    <input type="date" class="form-control" name="tgl_pemeriksaan" readonly="readonly" value="{{ $pemeriksaannonmcu->tgl_pemeriksaan }}">
                                </div> 
                                <div class="form-group">
                                    <label for="nama_pegawai">Nama Pegawai</label>
                                    <select class="form-control" name="id_user_diperiksa">
                                        @foreach($nama_pegawai as $pegawai)
                                            <option value={{$pegawai->id }} {{$pegawai->id == $pemeriksaannonmcu->id_user_diperiksa ? 'selected="selected"' : ''}}>{{$pegawai->nama_pegawai}}</option>
                                        @endforeach                                        
                                    </select> 
                                </div>    
                                <div class="form-group">
                                    <label for="id_jenis_pemeriksaan">Jenis Pemeriksaan</label>
                                    <select class="form-control" name="id_jenis_pemeriksaan">
                                        @foreach($nama_pemeriksaan as $np)
                                            <option value={{$np->id }} {{$np->id == $pemeriksaannonmcu->id_jenis_pemeriksaan ? 'selected="selected"' : ''}}>{{$np->jenis_pemeriksaan}}</option>
                                        @endforeach                                        
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label>Nilai</label>
                                    <input type="number" class="form-control" name="nilai" value="{{ $pemeriksaannonmcu->nilai }}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Rekomendasi</label>
                                    <textarea class="form-control" name="rekomendasi" placeholder="Masukkan Rekomendasi">{{ $pemeriksaannonmcu->rekomendasi}}</textarea>
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
