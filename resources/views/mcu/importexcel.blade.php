@extends('layouts.afterlogin')
@section('content')
 	<center>
		<h4>Import dan Ekspor Data</h4>
	</center>
	<div class="card">
	    <div class="card-header">
	        <h5 class="card-title">Import Export Data MCU</h5>
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
 
		{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
 		
 		<div class="card-body">
 			<div class="row">
            	<div class="col-12 col-sm-6 col-md-6">
                	<div class="info-box">
                		<span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder-open"></i></span>
	                    <div class="info-box-content">
	                        <span class="info-box-text">Import Data</span>
	                        <span class="info-box-number">Klik tombol di bawah ini untuk mengupload file Excel yang berisi data MCU.</span>
	                        <span class="info-box-number"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importExcel">IMPORT EXCEL</button></span>
	                    </div>
						
						<!-- Import Excel Modal -->
						<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<form action="{{route('mcu.import_excel')}}" method="POST" enctype="multipart/form-data">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Import Data Excel MCU</h5>
										</div>
										<div class="modal-body"> 
											@csrf
											<label>Pilih file excel</label>
											<div class="form-group">
												<input type="file" name="file" required="required">
											</div> 
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Import</button>
										</div>
									</div>
								</form>
							</div>
						</div>	
					</div>
				</div>
            	<div class="col-12 col-sm-6 col-md-6">
                	<div class="info-box">                		
                		<span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-excel"></i></span>
	                    <div class="info-box-content">
	                        <span class="info-box-text">Export Data</span>
	                        <span class="info-box-number">Klik tombol di bawah ini untuk mendownload data MCU lengkap ke file Excel.</span>
	                        <span class="info-box-number"><a href="{{route('mcu.export_excel')}}" class="btn btn-success" target="_blank">EXPORT EXCEL</a></span>
	                    </div>						
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card">
	    <div class="card-header">
	        <h5 class="card-title">Import Export Data Non MCU</h5>
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
            	<div class="col-12 col-sm-6 col-md-6">
                	<div class="info-box">
                		<span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder-open"></i></span>
	                    <div class="info-box-content">
	                        <span class="info-box-text">Import Data</span>
	                        <span class="info-box-number">Klik tombol di bawah ini untuk mengupload file Excel yang berisi data non-MCU.</span>
	                        <span class="info-box-number"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importExcel2">IMPORT EXCEL</button></span>
	                    </div>
						
						<!-- Import Excel Modal -->
						<div class="modal fade" id="importExcel2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<form action="{{route('nonmcu.import_excel')}}" method="POST" enctype="multipart/form-data">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel2">Import Data Excel Non MCU</h5>
										</div>
										<div class="modal-body"> 
											@csrf
											<label>Pilih file excel</label>
											<div class="form-group">
												<input type="file" name="file" required="required">
											</div> 
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Import</button>
										</div>
									</div>
								</form>
							</div>
						</div>	
					</div>
				</div>
            	<div class="col-12 col-sm-6 col-md-6">
                	<div class="info-box">                		
                		<span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-excel"></i></span>
	                    <div class="info-box-content">
	                        <span class="info-box-text">Export Data</span>	                        
	                        <span class="info-box-number">Klik tombol di bawah ini untuk mendownload data non MCU lengkap ke file Excel.</span>
	                        <span class="info-box-number"><a href="{{route('nonmcu.export_excel')}}" class="btn btn-success" target="_blank">EXPORT EXCEL</a></span>
	                    </div>						
					</div>
				</div>
			</div>
		</div>
	</div>
 
 
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
@endsection