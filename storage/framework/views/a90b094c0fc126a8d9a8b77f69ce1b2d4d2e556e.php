

<?php $__env->startSection('title','Category'); ?>

<?php $__env->startSection('container'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">



	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary float-left">Kategori</h6>
			<button type="button" class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#tambahData">
				Tambah Katetori
			</button>
		</div>
		<div class="card-body">
<!-- 			<?php if($errors->any()): ?>
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
			<?php endif; ?> -->

			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="20">No</th>
							<th>Kode Kategori</th>
							<th>Nama Kategori</th>
							<th>Deskripsi Kategori</th>
							<th width="45">Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td align="center"><?php echo e($loop->iteration); ?></td>
							<td><?php echo e($categories->category_code); ?></td>
							<td><?php echo e($categories->category_name); ?></td>
							<td><?php echo e($categories->descriptions); ?></td>
							<td>
								
								<a href="<?php echo e($categories->id); ?>/deleteCategory" class="btn btn-danger btn-circle btn-sm hapusCategory">
									<i class="fas fa-trash"></i>
								</a>
								<button class="btn btn-primary btn-circle btn-sm" title="Edit" data-toggle="modal" data-target="#editData<?php echo e($categories['id']); ?>">
									<i class="fas fa-edit"></i>
								</button>
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
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel1">Tambah Data Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- <div class="alert alert-danger" style="display:none"></div> -->
				<form action="addCategory" method="POST" class="needs-validation" novalidate>
					<?php echo csrf_field(); ?>
					<div class="form-group">
						<label for="exampleFormControlInput1">Kode Kategori</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan kode kategori" name="category_code" value="<?php echo e(old('category_code')); ?>" pattern="[a-zA-Z\s0-9]+" maxlength="3" required>
<!-- 					<?php $__errorArgs = ['category_code'];
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
unset($__errorArgs, $__bag); ?> -->
						<div class="invalid-feedback">Kode Kategori tidak valid</div>  
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama Kategori</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama kategori" name="category_name" value="<?php echo e(old('category_name')); ?>" pattern="[a-zA-Z\s0-9]+" required>
<!-- 					<?php $__errorArgs = ['category_name'];
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
unset($__errorArgs, $__bag); ?> -->
						<div class="invalid-feedback">Nama Kategori tidak valid</div>  
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Deskripsi Kategori</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descriptions" placeholder="Masukan deskripsi kategori" pattern="[a-zA-Z\s0-9]+"   required><?php echo e(old('descriptions')); ?></textarea>
						<div class="invalid-feedback">Deskripsi kategori tidak valid</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Tambah Unit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit Data -->
<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade modal2" id="editData<?php echo e($categories['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel2">Edit Data Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="<?php echo e($categories->id); ?>/updateCategory" method="POST" class="needs-validation" novalidate>
					<?php echo csrf_field(); ?>
					<div class="form-group">
						<label for="exampleFormControlInput1">Kode Kategori</label>
						<input type="text" class="form-control" value="<?php echo e(($categories->category_code)); ?>"" id="exampleFormControlInput1" placeholder="Masukan kode kategori" name="category_code"  pattern="[a-zA-Z\s0-9]+"   required>
<!-- 						<?php $__errorArgs = ['category_code'];
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
unset($__errorArgs, $__bag); ?> -->
						<div class="invalid-feedback">Kode Kategori tidak valid</div>  
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Nama Kategori</label>
						<input type="text" class="form-control" value="<?php echo e(($categories->category_name)); ?>"" id="exampleFormControlInput1" placeholder="Masukan nama kategori" name="category_name"  pattern="[a-zA-Z\s0-9]+"   required>
<!-- 						<?php $__errorArgs = ['category_name'];
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
unset($__errorArgs, $__bag); ?> -->
						<div class="invalid-feedback">Nama Kategori tidak valid</div>  
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Deskripsi Kategori</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descriptions" placeholder="Masukan deskripsi kategori"  pattern="[a-zA-Z\s0-9]+"   required><?php echo e($categories->descriptions); ?></textarea>
<!-- 						<?php if($errors->has('descriptions')): ?>
						<div class="invalid-feedback">
							<?php echo e($errors->first('descriptions')); ?>

						</div>
						<?php endif; ?> -->
						<div class="invalid-feedback">Deskripsi Kategori tidak valid</div>  
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


<!-- Modal Hapus Data -->
<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="hapusData<?php echo e($categories['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<a href="<?php echo e($categories->id); ?>/deleteCategory" class="btn btn-danger">Hapus</a>
			</div> 
		</div>
	</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<script src="<?php echo e(asset('assets/adminpos/vendor/jquery/jquery.min.js')); ?>"></script>
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


    <!-- SCRIPT VALIDASI FORM IN MODAL -->
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
				url: "<?php echo e(url('/addCategory')); ?>",
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
</script> -->

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
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\POS\resources\views/category.blade.php ENDPATH**/ ?>