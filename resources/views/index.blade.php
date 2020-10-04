@extends('layout.main')

@section('title','Beranda')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Buat order</a>
	</div>

	<div class="row">
		<div class="col-md-7">
			<div class="row">
				<div class="col-xl-6 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemasukan Harian</div>
									<div class="mb-0 font-weight-bold text-gray-800">Rp.300.000</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-6 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pelanggan Harian</div>
									<div class="mb-0 font-weight-bold text-gray-800">12</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-users fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">Pemasukan</h6>
							<div class="btn-group">
								<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pemasukan
								</button>
								<div class="dropdown-menu">
									<a href="" class="dropdown-item">Pemasukan</a>
									<a href="" class="dropdown-item">Pengeluaran</a>
								</div>
							</div>
						</div>
						<!-- Card Body -->
						<div class="card-body">
							<div class="chart-area">
								<canvas id="myAreaChart"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card shadow mb-4">
				<div class="card-body">
					<div class="title-pemasukan text-center">
						<h6 class="font-weight-bold">Total Pemasukan</h6>
						<h3 class="font-weight-bold text-gray-900">Rp. 450.000</h3>
						<p style="font-size: 12.5px;" class="font-weight-bold">25 juni 2020 - 30 juni 2020</p>
					</div>
					<hr>
					<div class="d-flex flex-row align-items-center justify-content-between mb-2">
						<h6 class="font-weight-bold m-0 text-primary">Riwayat Transaksi</h6>
						<a href="" class="btn btn-sm btn-primary">semua</a>
					</div>
					<div class="list-transactions">
						
						<div class="row no-gutters align-items-center pb-2">
							<div class="col-auto">
								<i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
							</div>
							<div class="col mr-2 pl-3">
								<small class="font-weight-bold text-gray-900">TR0206200021</small>
								<br>
								<small class="text-gray-600">Rp. 30.000</small>
							</div>
							<div class="col-auto">
								<small>2 jam yang lalu</small>
							</div>
						</div>

						<div class="row no-gutters align-items-center pb-2">
							<div class="col-auto">
								<i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
							</div>
							<div class="col mr-2 pl-3">
								<small class="font-weight-bold text-gray-900">TR0206200021</small>
								<br>
								<small class="text-gray-600">Rp. 30.000</small>
							</div>
							<div class="col-auto">
								<small>2 jam yang lalu</small>
							</div>
						</div>

						<div class="row no-gutters align-items-center pb-2">
							<div class="col-auto">
								<i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
							</div>
							<div class="col mr-2 pl-3">
								<small class="font-weight-bold text-gray-900">TR0206200021</small>
								<br>
								<small class="text-gray-600">Rp. 30.000</small>
							</div>
							<div class="col-auto">
								<small>2 jam yang lalu</small>
							</div>
						</div>

						<div class="row no-gutters align-items-center pb-2">
							<div class="col-auto">
								<i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
							</div>
							<div class="col mr-2 pl-3">
								<small class="font-weight-bold text-gray-900">TR0206200021</small>
								<br>
								<small class="text-gray-600">Rp. 30.000</small>
							</div>
							<div class="col-auto">
								<small>2 jam yang lalu</small>
							</div>
						</div>

						<div class="row no-gutters align-items-center pb-2">
							<div class="col-auto">
								<i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
							</div>
							<div class="col mr-2 pl-3">
								<small class="font-weight-bold text-gray-900">TR0206200021</small>
								<br>
								<small class="text-gray-600">Rp. 30.000</small>
							</div>
							<div class="col-auto">
								<small>2 jam yang lalu</small>
							</div>
						</div>

						<div class="row no-gutters align-items-center pb-2">
							<div class="col-auto">
								<i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
							</div>
							<div class="col mr-2 pl-3">
								<small class="font-weight-bold text-gray-900">TR0206200021</small>
								<br>
								<small class="text-gray-600">Rp. 30.000</small>
							</div>
							<div class="col-auto">
								<small>2 jam yang lalu</small>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection