@extends('layouts.afterlogin')
@section('content')
<!-- Info boxes -->

<style type="text/css">
    td.highlight {
        font-weight: bold;
        color: red;
    }
</style>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Status MCU Terakhir, @if ( Auth::user()->jenis_kelamin == "L") Bapak @else Bu @endif <b>{{ Auth::user()->nama }} </b></h5>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal Pemeriksaan</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Jenis Pemeriksaan</th>
                            <th scope="col">Nilai</th>                             
                            <th scope="col">Rekomendasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse($pemeriksaan as $pemeriksaan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pemeriksaan->tgl_pemeriksaan }}</td>
                            <td>{{ $pemeriksaan->nama }}</td>
                            <td>{{ $pemeriksaan->nama_petugas }}</td>
                            <td>{{ $pemeriksaan->jenis_pemeriksaan }}</td>
                            <td>{{ $pemeriksaan->nilai }}</td>
                            <td>{{ $pemeriksaan->rekomendasi }}</td>  
                            <td></td>                                
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