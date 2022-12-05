<?php $__env->startSection('content'); ?>
<ul class="navbar-nav ms-auto flex-row item-justify gap-5"> 
                        <!-- Authentication Links -->
                        <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3" href="<?php echo e(route('kendaraan.index')); ?>"><?php echo e(__('Kendaraan')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3" href="<?php echo e(route('pemilik.index')); ?>"><?php echo e(__('Pemilik')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3"  href="<?php echo e(route('pajak.index')); ?>"><?php echo e(__('Kategori')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-success rounded-3"  href="<?php echo e(route('join')); ?>"><?php echo e(__('Pajak')); ?></a>
                                </li>
</ul>
<h4 class="mt-5">Pajak Kendaraan</h4>

<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success mt-3" role="alert">
        <?php echo e($message); ?>

    </div>
<?php endif; ?>

<form action="">
<div class="input-group mb-3">
  <input name="search" type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
</div>
</form>

<table class="table table-hover mt-2">
    <thead>
      <tr>
      <th>Id Pemilik</th>
        <th>Plat Nomor</th>
        <th>Nama Pemilik</th>
        <th>Jenis Kendaraan</th>
        <th>Merk </th>
        <th>Waktu Pajak</th>
        <th>Harga Pajak</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($data->id_pemilik); ?></td>
                <td><?php echo e($data->plat_nomor); ?></td>
                <td><?php echo e($data->nama_pemilik); ?></td>
                <td><?php echo e($data->jenis_kendaraan); ?></td>
                <td><?php echo e($data->merk); ?></td>
                <td><?php echo e($data->waktu_pajak); ?></td>
                <td><?php echo e($data->harga_pajak); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pemilik.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pakran_anas\resources\views/join.blade.php ENDPATH**/ ?>