@extends('layouts.afterlogin')
@section('content')
<!-- Info boxes -->

<style type="text/css">
    td.highlight {
        font-weight: bold;
        color: red;
    }
</style>

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
        <div class="card">
            <div class="card-body">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal Pemeriksaan</th>
                            <th scope="col">Nama Pegawai</th>
                            <th scope="col">Jenis Pemeriksaan</th>
                            <th scope="col">Nilai</th>    
                            @if(Auth::user()->role == 1 OR Auth::user()->role == 3 OR Auth::user()->role == 4 OR Auth::user()->role == 5)                        
                            <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse($nonmcu as $nmp)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $nmp->tgl_pemeriksaan }}</td>
                            <td>{{ $nmp->nama }}</td> 
                            <td>{{ $nmp->jenis_pemeriksaan }}</td>                            
                            <td>{{ $nmp->nilai }}</td>
                            <td>
                                <form action="{{ route('nonmcu.destroy',$nmp->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('nonmcu.show',$nmp->id_user_diperiksa) }}">Show</a>
                                    @if(Auth::user()->role == 1)
                                    <a class="btn btn-primary" href="{{ route('nonmcu.edit',$nmp->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    @endif
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