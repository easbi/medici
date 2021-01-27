@extends('layouts.afterlogin')
@section('content')
<!-- Info boxes -->

<style type="text/css">
    td.highlight {
        font-weight: bold;
        color: red;
    }
</style>


@if ($message = Session::get('success'))
<div class="col-sm-4 col-md-4">
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ $message }}</p>
    </div>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Status MCU Terakhir</h5>
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
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-heartbeat"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Darah Tinggi</span>
                        <span class="info-box-number">{{ $darah_tinggi }} orang</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-md"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Asam Urat</span>
                        <span class="info-box-number">{{ $asam_urat }} Orang</span>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-4 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-weight"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Kolestrol</span>
                        <span class="info-box-number">{{ $kolestrol }} Orang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Grafik Status MCU</h5>
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
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-center">
                            <strong>Darah Tinggi</strong>
                        </p>
                        <div class="chart">
                            <canvas id="myChart1"></canvas>
                            <script type="text/javascript">
                                var ctx = document.getElementById('myChart1').getContext('2d');
                                var chart = new Chart(ctx, {
                                            // The type of chart we want to create
                                            type: 'line',
                                            // The data for our dataset
                                            data: {
                                                labels: <?php echo $darah_tinggi_periode; ?>,
                                                datasets: [{
                                                    label: 'Kasus Darah Tinggi',
                                                    backgroundColor: 'rgb(255, 99, 132)',
                                                    borderColor: 'rgb(255, 99, 132)',
                                                    data: <?php echo $darah_tinggi_jumlah; ?>
                                                }]
                                            },

                                            // Configuration options go here
                                            options: {
                                                tooltips :{
                                                    mode: 'nearest'
                                                },
                                                animation: {
                                                    duration: 2000,
                                                    easing : 'easeInBounce'
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Asam Urat</strong>
                                </p>
                                <div class="chart">
                                    <canvas id="myChart"></canvas>
                                    <script type="text/javascript">
                                        var ctx = document.getElementById('myChart').getContext('2d');
                                        var chart = new Chart(ctx, {
                                            // The type of chart we want to create
                                            type: 'line',

                                            // The data for our dataset
                                            data: {
                                                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                                datasets: [{
                                                    label: 'Kasus Asam Urat',
                                                    backgroundColor: 'rgb(255, 99, 132)',
                                                    borderColor: 'rgb(255, 99, 132)',
                                                    data: [0, 10, 5, 2, 20, 30, 45]
                                                }]
                                            },

                                            // Configuration options go here
                                            options: {}
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Kolestrol</strong>
                                </p>
                                <div class="chart">
                                    <canvas id="myChart3"></canvas>
                                    <script type="text/javascript">
                                        var ctx = document.getElementById('myChart3').getContext('2d');
                                        var chart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                                datasets: [{
                                                    label: 'Kasus Kolestrol',
                                                    backgroundColor: 'rgb(255, 99, 132)',
                                                    borderColor: 'rgb(255, 99, 132)',
                                                    data: [0, 10, 5, 2, 20, 30, 45]
                                                }]
                                            },
                                            options: {}
                                        });
                                    </script>
                                </div>
                            </div>
                        </div> <!-- /.row -->
                    </div>
                </div><!-- /.card -->
            </div><!-- /.col -->
        </div>

        @if(Auth::user()->role == 1 OR Auth::user()->role == 3 OR Auth::user()->role == 4 OR Auth::user()->role == 5)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pemeriksaan Ke</th>
                                    <th scope="col">Tanggal Pemeriksaan</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Suhu</th>
                                    <th scope="col">nadi</th>
                                    <th scope="col">Pernapasan</th>
                                    <th scope="col">Saturasi</th>
                                    <th scope="col">tensi Sistol</th>
                                    <th scope="col">tensi Diastol</th>
                                    <th scope="col">asam urat</th>
                                    <th scope="col">Gula Puasa</th>
                                    <th scope="col">Kolestrol</th> 
                                    @if(Auth::user()->role == 1 OR Auth::user()->role == 3 OR Auth::user()->role == 4 OR Auth::user()->role == 5)
                                    <th scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @forelse($mcu as $pemeriksaan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pemeriksaan->pemeriksaan_ke }}</td>
                                    <td>{{ $pemeriksaan->tgl_pemeriksaan }}</td>
                                    <td>{{ $pemeriksaan->nama }}</td>                          
                                    <td>{{ $pemeriksaan->unit_kerja }}</td>
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
                                        <form action="{{ route('mcu.destroy',$pemeriksaan->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('mcu.show',$pemeriksaan->id_user_diperiksa) }}">Show</a>
                                            @if(Auth::user()->role == 1)
                                                <a class="btn btn-primary" href="{{ route('mcu.edit',$pemeriksaan->id) }}">Edit</a>
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
        @endif

      
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