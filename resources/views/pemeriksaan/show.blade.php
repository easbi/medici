@extends('layouts.app')
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
        <h5 class="card-title">Status MCU Terakhir, @if ($pemeriksaan[0]->jenis_kelamin == "L") Bapak @else Bu @endif <b>{{ $pemeriksaan[0]->nama_pegawai }} </b></h5>
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
                @if ($data_fulan->tensi_sistol > 120 || $data_fulan->tensi_diastol > 80)
                <div class="info-box bg-red">
                @else
                <div class="info-box bg-success">
                @endif
                  <span class="info-box-icon"><i class="fas fa-heartbeat"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Darah Tinggi</span>
                    <span class="info-box-number">{{ $data_fulan->tensi_sistol }} / {{ $data_fulan->tensi_diastol }}</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        @if ($data_fulan->jenis_kelamin == "L" && ($data_fulan->tensi_sistol > 120 || $data_fulan->tensi_diastol > 80))
                            #Saatnya pola hidup sehat, Pak
                        @elseif ($data_fulan->jenis_kelamin == "P" && ($data_fulan->tensi_sistol > 120 || $data_fulan->tensi_diastol > 80))
                            #Saatnya pola hidup sehat, Bu
                        @else 
                            #Pertahankan pola sehatnya
                        @endif
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-4 col-md-4">
                <!-- Apply any bg-* class to to the info-box to color it -->
                @if (($data_fulan->jenis_kelamin == "P" && $data_fulan->asam_urat > 6.0) || ($data_fulan->jenis_kelamin == "L" && $data_fulan->asam_urat > 7.0))
                <div class="info-box bg-red">
                @else
                <div class="info-box bg-success">
                @endif
                  <span class="info-box-icon"><i class="fas fa-user-md"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Asam Urat</span>
                    <span class="info-box-number">{{ $data_fulan->asam_urat }}</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        @if ($data_fulan->jenis_kelamin == "L" && $data_fulan->asam_urat > 7.0)
                            #Saatnya pola hidup sehat, Pak
                        @elseif ($data_fulan->jenis_kelamin == "P" && $data_fulan->asam_urat > 6.0)
                            #Saatnya pola hidup sehat, Bu
                        @else 
                            #Pertahankan pola sehatnya
                        @endif
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-4 col-md-4">
                <!-- Apply any bg-* class to to the info-box to color it -->
                @if ($data_fulan->kolestrol > 230)
                <div class="info-box bg-red">
                @else
                <div class="info-box bg-success">
                @endif
                  <span class="info-box-icon"><i class="fas fa-weight"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Kolestrol</span>
                    <span class="info-box-number">{{ $data_fulan->kolestrol }}</span>
                    <!-- The progress section is optional -->
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                        @if ($data_fulan->jenis_kelamin == "L" && $data_fulan->kolestrol > 230)
                            #Saatnya pola hidup sehat, Pak
                        @elseif ($data_fulan->jenis_kelamin == "P" && $data_fulan->kolestrol > 230)
                            #Saatnya pola hidup sehat, Bu
                        @else
                            #Pertahankan pola sehatnya
                        @endif
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <!-- /.card -->
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
                            <th scope="col">Pemeriksaan Ke</th>
                            <th scope="col">Tanggal Pemeriksaan</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Berat Badan</th>
                            <th scope="col">Tinggi Badan</th>
                            <th scope="col">Suhu</th>
                            <th scope="col">nadi</th>
                            <th scope="col">Pernapasan</th>
                            <th scope="col">Saturasi</th>
                            <th scope="col">tensi Sistol</th>
                            <th scope="col">tensi Diastol</th>
                            <th scope="col">asam urat</th>
                            <th scope="col">Gula Puasa</th>
                            <th scope="col">Gula Sewaktu</th>
                            <th scope="col">Kolestrol</th>                            
                            <th scope="col">Rekomendasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse($pemeriksaan as $pemeriksaan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pemeriksaan->pemeriksaan_ke }}</td>
                            <td>{{ $pemeriksaan->tgl_pemeriksaan }}</td>
                            <td>{{ $pemeriksaan->nama_pegawai }}</td>
                            <td>{{ $pemeriksaan->nama_petugas }}</td>
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
                            <td>{{ $pemeriksaan->gula_sewaktu }}</td>
                            <td>{{ $pemeriksaan->kolestrol }}</td>  
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