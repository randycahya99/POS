

<?php $__env->startSection('title','Category'); ?>

<?php $__env->startSection('container'); ?>

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
			<?php if($errors->any()): ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Gagal menambahkan data kategori dikarenakan :</strong>
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
				<strong>Silahkan perbaiki kembali data dalam form!</strong>

				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php endif; ?>

			<?php if(session('success')): ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong><?php echo e(session('success')); ?></strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php endif; ?>
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
						<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($dt->category_name); ?></td>
							<td><?php echo e($dt->descriptions); ?></td>
							<td>
								<form method="post" action="category/<?php echo e($dt->id); ?>" class="d-inline">
									<?php echo method_field('delete'); ?>
									<?php echo csrf_field(); ?>
									<button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
								</form>
								<a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target="#editData<?php echo e($dt['id']); ?>">
									<i class="fas fa-edit"></i>
								</a>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
					<?php echo csrf_field(); ?>
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama Kategori</label>
						<input type="text" class="form-control <?php $__errorArgs = ['category_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('category_name')); ?>"" id="exampleFormControlInput1" placeholder="Masukan nama kategori" name="category_name">
						<?php $__errorArgs = ['category_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<div class="invalid-feedback">
							<?php echo e($message); ?>

						</div>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Deskripsi Kategori</label>
						<textarea class="form-control <?php $__errorArgs = ['descriptions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleFormControlTextarea1" rows="3" name="descriptions" placeholder="Masukan deskripsi kategori"><?php echo e(old('descriptions')); ?></textarea>
						<?php $__errorArgs = ['descriptions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<div class="invalid-feedback">
							<?php echo e($message); ?>

						</div>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="editData<?php echo e($dt['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="editCategory/<?php echo e($dt->id); ?>" method="POST">
					<?php echo method_field('patch'); ?>
					<?php echo csrf_field(); ?>
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama Kategori</label>
						<input type="text" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(($dt->nama)); ?>"" id="exampleFormControlInput1" placeholder="Masukan nama kategori" name="nama">
						<?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<div class="invalid-feedback">
							<?php echo e($message); ?>

						</div>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Deskripsi Kategori</label>
						<textarea class="form-control <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleFormControlTextarea1" rows="3" name="deskripsi" placeholder="Masukan deskripsi kategori"><?php echo e($dt->deskripsi); ?></textarea>
						<?php if($errors->has('deskripsi')): ?>
						<div class="invalid-feedback">
							<?php echo e($errors->first('deskripsi')); ?>

						</div>
						<?php endif; ?>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\POS\resources\views/category.blade.php ENDPATH**/ ?>