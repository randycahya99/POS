@extends('layout.main')


@section('title','Unit')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">


	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Unit</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
				Tambah Unit
			</button>
		</div>
		<div class="card-body">
			@if ($errors->any())
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
			@endif

			
<!-- 			<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none">
				<strong>Data berhasil ditambah</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div> -->

			@if(session('sukses'))

			@endif
			
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Unit</th>
							<th>Deskripsi Unit</th>
							<th width="45">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($data as $dt)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$dt->unit_name}}</td>
							<td>{{$dt->descriptions}}</td>
							<td>
								<form method="post" action="unit/{{ $dt->id }}" class="d-inline">
									@method('delete')
									@csrf
									<button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
								</form>
								<a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target="#editData{{$dt['id']}}">
									<i class="fas fa-edit"></i>
								</a>
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
<!-- <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="addUnit" method="POST">
					@csrf
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama Unit</label>
						<input type="text" class="form-control @error('unit_name') is-invalid @enderror" value="{{ old('unit_name') }}"" id="exampleFormControlInput1" placeholder="Masukan nama unit" name="unit_name">
						@error('unit_name')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Deskripsi Unit</label>
						<textarea class="form-control @error('descriptions') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="descriptions" placeholder="Masukan deskripsi unit">{{old('descriptions')}}</textarea>
						@error('descriptions')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Unit</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger" style="display:none"></div>
				<form class="image-upload" method="post" action="addUnit">
					@csrf
					<div class="form-group">
						<label>Nama Unit</label>
						<input type="text" name="unit_name" id="unit_name" class="form-control" placeholder="Masukan nama unit" />
					</div>
					<div class="form-group">
						<label>Deskripsi Unit</label>
						<textarea name="descriptions" class="textarea form-control" id="descriptions" cols="40" rows="5" placeholder="Masukan deskripsi unit"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" id="batal">Batal</button>
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
				<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="updateUnit/{{$dt->id}}" method="POST">
					@method('patch')
					@csrf
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama Unit</label>
						<input type="text" class="form-control @error('unit_name') is-invalid @enderror" value="{{($dt->unit_name)}}"" id="exampleFormControlInput1" placeholder="Masukan nama Unit" name="unit_name">
						@error('unit_name')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Deskripsi Unit</label>
						<textarea class="form-control @error('descriptions') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="descriptions" placeholder="Masukan deskripsi Unit">{{$dt->descriptions}}</textarea>
						@if ($errors->has('descriptions'))
						<div class="invalid-feedback">
							{{ $errors->first('descriptions') }}
						</div>
						@endif
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
@endsection
<script src="{{asset('assets/adminpos/vendor/jquery/jquery.min.js')}}"></script>
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

	// Untuk menghilangkan data pada form dimodal ketika di close
	// $(document).ready(function(){
	// 	$('#exampleModal').on('hidden.bs.modal', function () {
	// 		$(this).find('form').trigger('reset');
	// 	});
	// });
</script>