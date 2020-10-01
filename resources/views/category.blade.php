@extends('layout.main')

@section('title','Category')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">



	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Kategori</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData">
				Tambah Unit
			</button>
		</div>
		<div class="card-body">
			<!-- @if ($errors->any())
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Gagal menambahkan data kategori dikarenakan :</strong>
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

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kategori</th>
							<th>Deskripsi Kategori</th>
							<th width="45">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($data as $dt)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$dt->category_name}}</td>
							<td>{{$dt->descriptions}}</td>
							<td>
								{{-- <form method="post" action="category/{{ $dt->id }}" class="d-inline">
									@method('delete')
									@csrf
									<button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
								</form>
								<a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target="#editData{{$dt['id']}}">
									<i class="fas fa-edit"></i>
								</a> --}}
								<a href="{{$dt->id}}/deleteCategory" class="btn btn-danger btn-circle btn-sm hapusCategory">
									<i class="fas fa-trash"></i>
								</a>
								<button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$dt['id']}}">
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
				<div class="alert alert-danger" style="display:none"></div>
				<form action="addCategory" method="POST">
					@csrf
					<div class="form-group">
						<label>Nama Unit</label>
						<input type="text" name="category_name" id="category_name" class="form-control" placeholder="Masukan nama unit" />
					</div>
					<div class="form-group">
						<label>Deskripsi Unit</label>
						<textarea name="descriptions" class="textarea form-control" id="descriptions" cols="40" rows="5" placeholder="Masukan deskripsi unit"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-primary" id="formSubmit">Tambah Unit</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit Data -->
@foreach($data as $dt)
<div class="modal fade" id="editData{{$dt['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="{{$dt->id}}/updateCategory" method="POST" id="wkwk">
					@csrf
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama Kategori</label>
						<input type="text" class="form-control @error('category_name') is-invalid @enderror" value="{{($dt->category_name)}}"" id="exampleFormControlInput1" placeholder="Masukan nama kategori" name="category_name">
						@error('category_name')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Deskripsi Kategori</label>
						<textarea class="form-control @error('descriptions') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="descriptions" placeholder="Masukan deskripsi kategori">{{$dt->descriptions}}</textarea>
						@if ($errors->has('descriptions'))
						<div class="invalid-feedback">
							{{ $errors->first('descriptions') }}
						</div>
						@endif
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary" id="change-message">Simpan Perubahan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach


<!-- Modal Hapus Data -->
@foreach($data as $dt)
<div class="modal fade" id="hapusData{{$dt['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<a href="{{$dt->id}}/deleteCategory" class="btn btn-danger">Hapus</a>
			</div> 
		</div>
	</div>
</div>
@endforeach

@endsection

<script src="{{asset('assets/adminpos/vendor/jquery/jquery.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

@if(session('errors'))
<script type="text/javascript">
	$('#tambahData').modal('show');
</script>
@endif

<!-- SCRIPT VALIDASI FORM IN MODAL -->
<script>
	$(document).ready(function(){
		$('#formSubmit').click(function(e){
			e.preventDefault();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});
			$.ajax({
				url: "{{ url('/addCategory') }}",
				method: 'post',
				data: {
					category_name: $('#category_name').val(),
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
						window.location.href = "/category";
					}
				}
			});
		});
	});
</script>

<!-- Disable Button simpan perubahan jika tidak ada perubahan pada form -->
<!-- <script type="text/javascript">
	$(document).ready(function(){
          // Untuk Menentukan apakah ada perubahan atau tidak(KOREKSI)
          var $form = $('.needs-validation'),
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