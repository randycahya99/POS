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
				Tambah Kategori
			</button>
		</div>
		<div class="card-body">
			@if ($errors->any())
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
			@endif

			@if(session('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>{{ session('success') }}</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
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
								<form method="post" action="category/{{ $dt->id }}" class="d-inline">
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
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="createCategory" method="POST">
					@csrf
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama Kategori</label>
						<input type="text" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}"" id="exampleFormControlInput1" placeholder="Masukan nama kategori" name="category_name">
						@error('category_name')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Deskripsi Kategori</label>
						<textarea class="form-control @error('descriptions') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="descriptions" placeholder="Masukan deskripsi kategori">{{old('descriptions')}}</textarea>
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
				<form action="editCategory/{{$dt->id}}" method="POST">
					@method('patch')
					@csrf
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama Kategori</label>
						<input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{($dt->nama)}}"" id="exampleFormControlInput1" placeholder="Masukan nama kategori" name="nama">
						@error('nama')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Deskripsi Kategori</label>
						<textarea class="form-control @error('deskripsi') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="deskripsi" placeholder="Masukan deskripsi kategori">{{$dt->deskripsi}}</textarea>
						@if ($errors->has('deskripsi'))
						<div class="invalid-feedback">
							{{ $errors->first('deskripsi') }}
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