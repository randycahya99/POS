@extends('layout.main')

@section('title','Product')

@section('container')
    
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Unit</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData">
				Tambah Produk
			</button>
		</div>
		<div class="card-body">
			@if ($errors->any())
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
							<th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Satuan</th>
                            <th>Kategori</th>
							<th width="45">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($product as $products)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$products->product_code}}</td>
                            <td>{{$products->product_name}}</td>
                            <td>{{$products->stock}}</td>
                            <td>{{$products->purchase_price}}</td>
                            <td>{{$products->selling_price}}</td>
                            <td>{{$products->units->unit_name}}</td>
                            <td>{{$products->categories->category_name}}</td>
							<td>
								{{-- <form method="post" action="unit/{{ $products->id }}" class="d-inline">
									@method('delete')
									@csrf
									<button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form> --}}
                                <button class="btn btn-danger btn-circle btn-sm" title="Hapus" data-toggle="modal" data-target="#hapusData{{$products['id']}}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData{{$products['id']}}">
                                    <i class="fas fa-edit"></i>
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
{{-- <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger" style="display:none"></div>
				<form action="/addProduct" method="POST">
					@csrf
					<div class="form-group">
						<label>Kode Produk</label>
						<input type="text" name="product_code" id="product_code" class="form-control" placeholder="Masukan kode produk">
					</div>
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" name="product_name" id="product_name" class="form-control" placeholder="Masukan nama produk">
                    </div>
                    <div class="form-group">
						<label>Produk Brand</label>
						<input type="text" name="product_brand" id="product_brand" class="form-control" placeholder="Masukan nama produk brand">
                    </div>
                    <div class="form-group">
						<label>Jumlah Stok</label>
						<input type="text" name="stock" id="stock" class="form-control" placeholder="Masukan jumlah produk">
                    </div>
                    <div class="form-group">
						<label>Harga Beli Produk</label>
						<input type="text" name="purchase_price" id="purchase_price" class="form-control" placeholder="Masukan harga beli produk">
                    </div>
                    <div class="form-group">
						<label>Harga Jual Produk</label>
						<input type="text" name="selling_price" id="selling_price" class="form-control" placeholder="Masukan harga jual produk">
                    </div>
                    <div class="form-group">
						<label>Satuan</label>
						<select class="form-control" name="unit_id" id="unit_id">
                            <option value="" selected>Pilih Satuan Produk</option>
                            
                            @foreach($unit as $units)
                            
                            <option value="{{ $units->id }}">{{ $units->unit_name }}</option>

                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
						<label>Satuan</label>
						<select class="form-control" name="unit_id" id="unit_id">
                            <option value="" selected>Pilih Kategori Produk</option>
                            
                            @foreach($category as $categories)
                            
                            <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>

                            @endforeach

                        </select>
                    </div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" id="batal">Batal</button>
				<button type="submit" class="btn btn-primary">Tambah Produk</button>
			</div>
		</div>
	</div>
</div> --}}

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
				<form action="addProduct" method="POST">
					@csrf
					<div class="form-group">
						<label>Kode Produk</label>
						<input type="text" name="product_code" id="product_code" class="form-control" placeholder="Masukan kode produk">
					</div>
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" name="product_name" id="product_name" class="form-control" placeholder="Masukan nama produk">
                    </div>
                    <div class="form-group">
						<label>Produk Brand</label>
						<input type="text" name="product_brand" id="product_brand" class="form-control" placeholder="Masukan nama produk brand">
                    </div>
                    <div class="form-group">
						<label>Jumlah Stok</label>
						<input type="text" name="stock" id="stock" class="form-control" placeholder="Masukan jumlah produk">
                    </div>
                    <div class="form-group">
						<label>Harga Beli Produk</label>
						<input type="text" name="purchase_price" id="purchase_price" class="form-control" placeholder="Masukan harga beli produk">
                    </div>
                    <div class="form-group">
						<label>Harga Jual Produk</label>
						<input type="text" name="selling_price" id="selling_price" class="form-control" placeholder="Masukan harga jual produk">
                    </div>
                    <div class="form-group">
						<label>Satuan</label>
						<select class="form-control" name="unit_id" id="unit_id">
                            <option value="" selected>Pilih Satuan Produk</option>
                            
                            @foreach($unit as $units)
                            
                            <option value="{{ $units->id }}">{{ $units->unit_name }}</option>

                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
						<label>Kategori</label>
						<select class="form-control" name="category_id" id="category_id">
                            <option value="" selected>Pilih Kategori Produk</option>
                            
                            @foreach($category as $categories)
                            
                            <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>

                            @endforeach

                        </select>
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="{{$products->id}}/updateProduct" method="POST">
					@csrf
					<div class="form-group">
						<label>Kode Produk</label>
                        <input type="text" name="product_code" id="product_code" class="form-control" value="{{$products['product_code']}}">
					</div>
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" name="product_name" id="product_name" class="form-control" value="{{$products['product_name']}}">
                    </div>
                    <div class="form-group">
						<label>Produk Brand</label>
						<input type="text" name="product_brand" id="product_brand" class="form-control" value="{{$products['product_brand']}}">
                    </div>
                    <div class="form-group">
						<label>Jumlah Stok</label>
						<input type="text" name="stock" id="stock" class="form-control" value="{{$products['stock']}}">
                    </div>
                    <div class="form-group">
						<label>Harga Beli Produk</label>
						<input type="text" name="purchase_price" id="purchase_price" class="form-control" value="{{$products['purchase_price']}}">
                    </div>
                    <div class="form-group">
						<label>Harga Jual Produk</label>
						<input type="text" name="selling_price" id="selling_price" class="form-control" value="{{$products['selling_price']}}">
                    </div>
                    <div class="form-group">
						<label>Satuan</label>
						<select class="form-control" name="unit_id" id="unit_id">
                            <option value="{{$products['unit_id']}}" selected>{{$products->units['unit_name']}}</option>
                            
                            @foreach($unit as $units)
                            
                            <option value="{{ $units->id }}">{{ $units->unit_name }}</option>

                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
						<label>Kategori</label>
						<select class="form-control" name="category_id" id="category_id">
                            <option value="{{$products['category_id']}}" selected>{{$products->categories['category_name']}}</option>
                            
                            @foreach($category as $categories)
                            
                            <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>

                            @endforeach

                        </select>
                    </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</form>
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
