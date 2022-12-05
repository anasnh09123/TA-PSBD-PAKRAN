<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <li><?php echo e($error); ?></li>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data pemilik</h5>

		<form method="post" action="<?php echo e(route('pemilik.update', $data->id_pemilik)); ?>">
			<?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="id_pemilik" class="form-label">ID pemilik</label>
                <input type="text" class="form-control" id="id_pemilik" name="id_pemilik" value="<?php echo e($data->id_pemilik); ?>">
            </div>
			<div class="mb-3">
                <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="<?php echo e($data->nama_pemilik); ?>">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk</label>
                <input type="text" class="form-control" id="nik" name="nik" value="<?php echo e($data->nik); ?>">
            </div>
            <div class="mb-3">
                <label for="plat_nomor" class="form-label">Plat Nomor</label>
                <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" value="<?php echo e($data->plat_nomor); ?>">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('pemilik.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pakran_anas\resources\views/pemilik/edit.blade.php ENDPATH**/ ?>