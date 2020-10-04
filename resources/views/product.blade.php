@extends('layout.main')

@section('title','Product')

@section('container')




<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Produk</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData">
				Tambah Produk
			</button>
		</div>
		<div class="card-body">
<!-- 			@if ($errors->any())
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Gagal menambahkan data Produk dikarenakan :</strong>
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

<!-- 			@if(session('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>{{ session('success') }}</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif -->
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th>Kode Produk</th>
							<th>Nama Produk</th>
							<th>Stok</th>
							<th>Stauan</th>
							<th>Harga Jual</th>
							<th width="80">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($product as $products)
						<tr>
							<td align="center">{{$loop->iteration}}</td>
							<td>{{$products->product_code}}</td>
							<td>{{$products->product_name}}</td>
							<td align="center">{{$products->stock}}</td>
							<td>{{$products->units->unit_name}}</td>
							<td>@currency($products->selling_price)</td>

							<td>
								{{-- <form method="post" action="unit/{{ $products->id }}" class="d-inline">
									@method('delete')
									@csrf
									<button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
								</form> --}}
								<a href="{{$products->id}}/deleteProduct" class="btn btn-danger btn-circle btn-sm hapusProduct">
									<i class="fas fa-trash"></i>
								</a>
								<button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$products['id']}}">
									<i class="fas fa-edit"></i>
								</button>
								<button class="btn btn-success btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#detailData{{$products['id']}}">
									<i class="fas fa-eye"></i>
								</button>
								{{-- <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target="#editData{{$products['id']}}">
									<i class="fas fa-edit"></i>
								</a> --}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="addProduct" method="POST" class="needs-validation" novalidate>
					@csrf

					<div class="form-group">
						<label>Kategori</label>
						<select class="form-control" name="category_id" id="category_id" required="">
							<option value="" selected>Pilih Kategori Produk</option>

							@foreach($category as $categories)

							<option value="{{ $categories->id }}">{{ $categories->category_name }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Kategori produk tidak valid</div>
					</div>
					<div class="form-group">
						
						<input type="hidden" name="product_code" id="product_code" class="form-control" placeholder="Masukan kode produk" pattern="[a-zA-Z\s0-9]+">
						<div class="invalid-feedback">Kode produk tidak valid</div>
					</div>
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" name="product_name" id="product_name" class="form-control" placeholder="Masukan nama produk" pattern="[a-zA-Z\s0-9]+"   required>
						<div class="invalid-feedback">Nama produk tidak valid</div>
					</div>
					<div class="form-group">
						<label>Produk Brand</label>
						<input type="text" name="product_brand" id="product_brand" class="form-control" placeholder="Masukan nama produk brand" pattern="[a-zA-Z\s0-9]+"   required>
						<div class="invalid-feedback">Nama produk brand tidak valid</div>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<select class="form-control" name="unit_id" id="unit_id" required="">
							<option value="" selected>Pilih Satuan Produk</option>

							@foreach($unit as $units)

							<option value="{{ $units->id }}">{{ $units->unit_name }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Satuan produk tidak valid</div>
					</div>
					<div class="form-group">
						<label>Jumlah Stok</label>
						<input type="number" name="stock" id="stock" class="form-control" placeholder="Masukan jumlah produk" required>
						<div class="invalid-feedback">Jumlah stok tidak valid</div>
					</div>
					<div class="form-group">
						<label>Harga Beli Produk</label>
						<input type="text" name="purchase_price" id="purchase_price" class="form-control" placeholder="Masukan harga beli produk" required>
						<div class="invalid-feedback">Harga beli produk tidak valid</div>
					</div>
					<div class="form-group">
						<label>Harga Jual Produk</label>
						<input type="text" name="selling_price" id="selling_price" class="form-control" placeholder="Masukan harga jual produk" required>
						<div class="invalid-feedback">Harga jual produk tidak valid</div>
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
@foreach($product as $products)
<div class="modal fade" id="editData{{$products['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="{{$products->id}}/updateProduct" method="POST" class="needs-validation" novalidate>
					@csrf
					<div class="form-group">
						<label>Kategori</label>
						<select class="form-control" name="category_id" id="category_id" required="">
							<option value="{{$products['category_id']}}" selected>{{ !empty($products->categories) ? $products->categories['category_name']:'' }}</option>

							@foreach($category as $categories)

							<option value="{{ $categories->id }}">{{ $categories->category_name }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Kategori tidak valid</div>
					</div>
					<div class="form-group">
						<label>Kode Produk</label>
						<input type="text" name="product_code" id="product_code" class="form-control" value="{{$products['product_code']}}" pattern="[a-zA-Z\s0-9]+"   disabled="">
						<div class="invalid-feedback">Kode produk tidak valid</div>
					</div>
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" name="product_name" id="product_name" class="form-control" value="{{$products['product_name']}}" pattern="[a-zA-Z\s0-9]+"   required>
						<div class="invalid-feedback">Nama produk tidak valid</div>
					</div>
					<div class="form-group">
						<label>Produk Brand</label>
						<input type="text" name="product_brand" id="product_brand" class="form-control" value="{{$products['product_brand']}}" pattern="[a-zA-Z\s0-9]+"   required>
						<div class="invalid-feedback">Nama produk tidak valid</div>
					</div>
					<div class="form-group">
						<label>Jumlah Stok</label>
						<input type="text" name="stock" id="stock" class="form-control" value="{{$products['stock']}}" required>
						<div class="invalid-feedback">Jumlah stok tidak valid</div>
					</div>
					<div class="form-group">
						<label>Satuan</label>
						<select class="form-control" name="unit_id" id="unit_id" required="">
							<option value="{{$products['unit_id']}}" selected>{{ !empty($products->units) ? $products->units['unit_name']:'' }}</option>

							@foreach($unit as $units)

							<option value="{{ $units->id }}">{{ $units->unit_name }}</option>

							@endforeach

						</select>
						<div class="invalid-feedback">Satuan produk tidak valid</div>
					</div>
					<div class="form-group">
						<label>Harga Beli Produk</label>
						<input type="text" name="purchase_price" id="purchase_price2" class="form-control" value="{{$products->purchase_price}}" required>
						<div class="invalid-feedback">Harga beli produk tidak valid</div>
					</div>
					<div class="form-group">
						<label>Harga Jual Produk</label>
						<input type="text" name="selling_price" id="selling_price2" class="form-control" value="{{$products->purchase_price}}" required>
						<div class="invalid-feedback">Harga jual produk tidak valid</div>
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

<!-- Modal DetailData -->
@foreach($product as $products)
<div class="modal fade" id="detailData{{$products['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Data Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

					<div class="form-group row">
						<p class=" col-sm-4 font-weight-bold">Nama Produk</p>
						<div class="col-sm-8">
							<p>: {{$products->product_name}}</p>
						</div>
					</div>
					<div class="form-group row">
						<p class=" col-sm-4 font-weight-bold">Kategori</p>
						<div class="col-sm-8">
							<p>: {{$products->categories['category_name']}}</p>
						</div>
					</div>
					<div class="form-group row">
						<p class=" col-sm-4 font-weight-bold">Kode Produk</p>
						<div class="col-sm-8">
							<p>: {{$products->product_code}}</p>
						</div>
					</div>
					<div class="form-group row">
						<p class=" col-sm-4 font-weight-bold">Unit / Satuan</p>
						<div class="col-sm-8">
							<p>: {{$products->units['unit_name']}}</p>
						</div>
					</div>
					<div class="form-group row">
						<p class=" col-sm-4 font-weight-bold">Produk Brand</p>
						<div class="col-sm-8">
							<p>: {{$products->product_brand}}</p>
						</div>
					</div>
					<div class="form-group row">
						<p class=" col-sm-4 font-weight-bold">Stok Produk</p>
						<div class="col-sm-8">
							<p>: {{$products->stock}}</p>
						</div>
					</div>
					<div class="form-group row">
						<p class=" col-sm-4 font-weight-bold">Harga Jual</p>
						<div class="col-sm-8">
							<p>: @currency($products->selling_price)</p>
						</div>
					</div>
					<div class="form-group row">
						<p class=" col-sm-4 font-weight-bold">Harga Beli</p>
						<div class="col-sm-8">
							<p>: @currency($products->purchase_price)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach


	<!-- Modal Hapus Data -->
	@foreach($product as $products)
	<div class="modal fade" id="hapusData{{$products['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
					<a href="{{$products->id}}/deleteProduct" class="btn btn-danger">Hapus</a>
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


