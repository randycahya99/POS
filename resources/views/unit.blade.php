@extends('layout.main')

@section('title','Unit')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Unit</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData">
				Tambah Unit
			</button>
		</div>
		<div class="card-body">
<!-- 			@if ($errors->any())
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Gagal menambahkan data Unit dikarenakan :</strong>
				<ul>
					@foreach ($errors->all() as $error)

					<li>{{ $error }}</li>
					@endforeach
				</ul>
				<strong>Silahkan perbaiki kembali data dalam form!</strong>

				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif -->
			
<!-- 			<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none">
				<strong>Data berhasil ditambah</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div> -->

			@if(session('sukses')) @endif
			
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th>Nama Unit</th>
							<th>Deskripsi Unit</th>
							<th width="45">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($unit as $units)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$units->unit_name}}</td>
							<td>{{$units->descriptions}}</td>
							<td>
								{{-- <form method="post" action="unit/{{ $units->id }}" class="d-inline">
									@method('delete')
									@csrf
									<button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
								</form>
								<a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target="#editData{{$units['id']}}">
									<i class="fas fa-edit"></i>
								</a> --}}
								<a href="{{$units->id}}/deleteUnit" class="btn btn-danger btn-circle btn-sm hapusUnit">
									<i class="fas fa-trash"></i>
								</a>
								<button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$units['id']}}">
									<i class="fas fa-edit"></i>
								</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->


<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Unit</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- <div class="alert alert-danger" style="display:none"></div> -->
				<form action="addUnit" method="POST" class="needs-validation" novalidate>
					@csrf
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama Unit</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama unit" name="unit_name" value="{{ old('unit_name') }}" pattern="[a-zA-Z\s0-9]+" required>
<!-- 						@error('category_name')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror -->
						<div class="invalid-feedback">Nama Unit tidak valid</div>  
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Deskripsi Unit</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descriptions" placeholder="Masukan deskripsi kategori" pattern="[a-zA-Z\s0-9]+"   required>{{ old('descriptions') }}</textarea>
						<div class="invalid-feedback">Deskripsi unit tidak valid</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="batal">Batal</button>
						<button type="submit" class="btn btn-primary">Tambah Unit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit Data -->
@foreach($unit as $units)
<div class="modal fade" id="editData{{$units['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data Unit</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="{{$units->id}}/updateUnit" method="POST" class="needs-validation" novalidate>
					@csrf
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama Kategori</label>
						<input type="text" class="form-control" value="{{($units->unit_name)}}"" id="exampleFormControlInput1" placeholder="Masukan nama kategori" name="unit_name"  pattern="[a-zA-Z\s0-9]+"   required>
<!-- 						@error('category_name')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror -->
						<div class="invalid-feedback">Nama unit tidak valid</div> 
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Deskripsi Kategori</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descriptions" placeholder="Masukan deskripsi kategori"  pattern="[a-zA-Z\s0-9]+"   required>{{$units->descriptions}}</textarea>
<!-- 						@if ($errors->has('descriptions'))
						<div class="invalid-feedback">
							{{ $errors->first('descriptions') }}
						</div>
						@endif -->
						<div class="invalid-feedback">Deskripsi unit tidak valid</div>  
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach


<!-- Modal Hapus Data -->
@foreach($unit as $units)
<div class="modal fade" id="hapusData{{$units['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Apakah Anda yakin akan menghapus data ini?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<a href="{{$units->id}}/deleteUnit" class="btn btn-danger">Hapus</a>
			</div> 
		</div>
	</div>
</div>
@endforeach

@endsection

<script src="{{asset('assets/adminpos/vendor/jquery/jquery.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<!-- SCRIPT VALIDASI FORM -->
<script>
        // Self-executing function
        (function() {
        	'use strict';
        	window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                	form.addEventListener('submit', function(event) {
                		if (form.checkValidity() === false) {
                			event.preventDefault();
                			event.stopPropagation();
                		}
                		form.classList.add('was-validated');
                	}, false);
                });
            }, false);
        })();
    </script>
<!-- <script>
	$(document).ready(function(){
		$('#formSubmit').click(function(e){
			e.preventDefault();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});
			$.ajax({
				url: "{{ url('/addUnit') }}",
				method: 'post',
				data: {
					unit_name: $('#unit_name').val(),
					descriptions: $('#descriptions').val(),
				},
				success: function(result){
					if(result.errors)
					{
						$('.alert-danger').html('');

						$.each(result.errors, function(key, value){
							$('.alert-danger').show();
							$('.alert-danger').append('<li>'+value+'</li>');
						});
					}
					else
					{
						$('.alert-danger').hide();
						$('#exampleModal').modal('hide');
						window.location.href = "/unit";
					}
				}
			});
		});
	});
</script> -->

<!-- Disable Button simpan perubahan jika tidak ada perubahan pada form -->
<!-- <script type="text/javascript">
	$(document).ready(function(){
          // Untuk Menentukan apakah ada perubahan atau tidak(KOREKSI)
          var $form = $('#wkwk'),
          origForm = $form.serialize();
          $('form :input').on('change input', function() {
            // $('.change-message').toggle($form.serialize() !== origForm);
            if ($form.serialize() !== origForm) {
              $("#change-message").prop('disabled',false)//use prop()
          }else{
              $("#change-message").prop('disabled',true)//use prop()
          }
      });
      });
  </script> -->