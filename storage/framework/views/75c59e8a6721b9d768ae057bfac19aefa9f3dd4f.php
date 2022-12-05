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

        <h5 class="card-title fw-bolder mb-3">Tambah Kategori</h5>

		<form method="post" action="<?php echo e(route('pajak.store')); ?>">
			<?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="id_pajak" class="form-label">ID Kategori</label>
                <input type="text" class="form-control" id="id_pajak" name="id_pajak">
            </div>
			<div class="mb-3">
                <label for="harga_pajak" class="form-label">Harga Pajak</label>
                <input type="text" class="form-control" id="harga_pajak" name="harga_pajak">
            </div>
            <div class="mb-3">
                <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                <input type="text" class="form-control" id="jenis_kendaraan" name="jenis_kendaraan">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('pajak.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pakran_anas\resources\views/pajak/add.blade.php ENDPATH**/ ?>