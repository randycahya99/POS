@extends('layout.main')

@section('title','Order')

@section('container')


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary float-left">Order</h5>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-secondary float-left">Daftar Produk</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="20">No</th>
                                                <th>Kode</th>
                                                <th>Nama Produk</th>
                                                <th>Stok</th>
                                                <th>Harga</th>
                                                <th width="45">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($product as $products)
                                            <tr>
                                                <td align="center">{{$loop->iteration}}</td>
                                                <td>{{$products->product_code}}</td>
                                                <td>{{$products->product_name}}</td>
                                                <td>{{$products->stock}} {{$products->units->unit_name}}</td>
                                                <td>@currency($products->selling_price)</td>
                                                <td align="center">
                                                    <button type="button" class="btn  btn-sm btn-success" data-toggle="modal" data-target="#addToCart{{$products['id']}}">
                                                        <i class="fas fa-cart-plus" aria-hidden="true"></i>
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
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-secondary float-left">Keranjang</h6>
                            </div>
                            <div class="card-body">
                                <p>LalaDumdum</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-secondary float-left">Total</h6>
                    </div>
                    <div class="card-body">
                        <span class="float-lg-left">No. Transaksi </span>
                        <span class="float-lg-right p-b3">{{$format}}</span><br>
                        <span class="float-lg-left">Tanggal</span>
                        <span class="float-lg-right">{{ date('d M, Y') }}</span><br>
                        <span class="float-lg-left">Waktu</span>
                        <span class="float-lg-right p-b3">{{ date('H:i') }} WIB</span><br><hr>
                        <div class="detail-order-tr">
                            <form>
                              <div class="form-row align-items-center">
                                  <div class="col-md-12 mb-2">
                                      <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                          <div class="input-group-text">Nama</div>
                                      </div>
                                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Masukan nama pelanggan">
                                  </div>
                              </div>
                              <div class="col-md-12 mb-2">
                                  <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Diskon</div>
                                    </div>
                                    <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="Masukan jumlah Diskon">
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="alert alert-success" role="alert">
                                    <h5 class="text-center">Sub Total</h5>
                                    <h3 class="text-center">Rp. 300.000</h3>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Bayar</div>
                                </div>
                                <input type="text" class="form-control" id="bayarid" placeholder="Masukan jumlah bayar">
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>


<!-- Modal Hapus Data -->
@foreach($product as $products)
<div class="modal fade" id="addToCart{{$products['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Keranjang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Apakah Anda ingin memasukan produk ini kedalam kerangjang?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<a href="{{$products->id}}/addToCart" class="btn btn-primary">Tambah ke keranjang</a>
			</div> 
		</div>
	</div>
</div>
@endforeach

@endsection

<script src="{{asset('assets/adminpos/vendor/jquery/jquery.min.js')}}"></script>
