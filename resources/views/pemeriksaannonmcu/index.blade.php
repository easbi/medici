@extends('layouts.app')
@section('content')
<!-- Info boxes -->

<style type="text/css">
    td.highlight {
        font-weight: bold;
        color: red;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal Pemeriksaan</th>
                            <th scope="col">Nama Pegawai</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Jenis Pemeriksaan</th>
                            <th scope="col">Nilai</th>                            
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse($pemeriksaans as $pemeriksaan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pemeriksaan->pemeriksaan_ke }}</td>
                            <td>{{ $pemeriksaan->tgl_pemeriksaan }}</td>
                            <td>{{ $pemeriksaan->nama_pegawai }}</td>
                            <td>{{ $pemeriksaan->nama_petugas }}</td>                            
                            <td>{{ $pemeriksaan->unit_kerja }}</td>
                            <td>{{ $pemeriksaan->tinggi_badan }}</td>
                            <td>{{ $pemeriksaan->berat_badan }}</td>
                            <td>{{ $pemeriksaan->suhu }}</td>
                            <td>{{ $pemeriksaan->nadi }}</td>
                            <td>{{ $pemeriksaan->pernapasan }}</td>
                            <td>{{ $pemeriksaan->saturasi }}</td>
                            <td>{{ $pemeriksaan->tensi_sistol }}</td>
                            <td>{{ $pemeriksaan->tensi_diastol }}</td>
                            <td>{{ $pemeriksaan->asam_urat }}</td>
                            <td>{{ $pemeriksaan->gula_puasa }}</td>
                            <td>{{ $pemeriksaan->kolestrol }}</td> 
                            <td>
                                <form action="{{ route('pemeriksaanmcu.destroy',$pemeriksaan->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('pemeriksaanmcu.show',$pemeriksaan->id_user_diperiksa) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('pemeriksaanmcu.edit',$pemeriksaan->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>                                 
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                          Data Pemeriksaan belum Tersedia.
                      </div>
                      @endforelse
                  </tbody>
              </table>  
          </div>
      </div>
  </div> 
</div>

      
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    //message with toastr
    @if(session()-> has('success'))     
    toastr.success('{{ session('success') }}', 'BERHASIL!'); 
    @elseif(session()-> has('error'))
    toastr.error('{{ session('error') }}', 'GAGAL!'); 
    @endif
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            "scrollX": true,
            "createdRow": function ( row, data, index ) {
                if ( data[16] > 230 ) {
                    $('td', row).eq(16).addClass('highlight');
                }
            }
        }
        );
    } );
</script>
@endsection