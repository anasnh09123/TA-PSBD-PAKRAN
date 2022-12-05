<?php $__env->startSection('content'); ?>

<form action="">
<ul class="navbar-nav ms-auto flex-row item-justify gap-5"> 
                        <!-- Authentication Links -->
                        <li class="nav-item">
                                    <a type="button" class="btn btn-success rounded-3" href="<?php echo e(route('kendaraan.index')); ?>"><?php echo e(__('Kendaraan')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3" href="<?php echo e(route('pemilik.index')); ?>"><?php echo e(__('Pemilik')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3"  href="<?php echo e(route('pajak.index')); ?>"><?php echo e(__('Kategori')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3"  href="<?php echo e(route('join')); ?>"><?php echo e(__('Pajak')); ?></a>
                                </li>
</ul>

<h4 class="mt-5">Data Kendaraan</h4>
<div class="input-group mt-3 mb-2">
  <input name="search" type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
</div>
</form>

<a href="<?php echo e(route('kendaraan.create')); ?>" type="button" class="btn btn-success rounded-3">Tambah Data</a>

<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success mt-3" role="alert">
        <?php echo e($message); ?>

    </div>
<?php endif; ?>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Plat Nomor</th>
        <th>Jenis Kendaraan</th>
        <th>Merk</th>
        <th>Waktu Pajak</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($data->plat_nomor); ?></td>
                <td><?php echo e($data->jenis_kendaraan); ?></td>
                <td><?php echo e($data->merk); ?></td>
                <td><?php echo e($data->waktu_pajak); ?></td>
                <td>
                    <a href="<?php echo e(route('kendaraan.edit', $data->plat_nomor)); ?>" type="button" class="btn btn-warning rounded-3">Ubah</a>

                 
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo e($data->plat_nomor); ?>">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal<?php echo e($data->plat_nomor); ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="<?php echo e(route('kendaraan.delete', $data->plat_nomor)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#recycle<?php echo e($data->plat_nomor); ?>">
                        Recycle
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="recycle<?php echo e($data->plat_nomor); ?>" tabindex="-1" aria-labelledby="recycleLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="recycleLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="<?php echo e(route('kendaraan.recycle', $data->plat_nomor)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<h4 class="">Recycle</h4>

<table class="table table-hover mt-2">
    <thead>
      <tr>
      <th>Plat Nomor</th>
        <th>Jenis Kendaraan</th>
        <th>Merk</th>
        <th>Waktu Pajak</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $datasrecycle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($data->plat_nomor); ?></td>
                <td><?php echo e($data->jenis_kendaraan); ?></td>
                <td><?php echo e($data->merk); ?></td>
                <td><?php echo e($data->waktu_pajak); ?></td>
                <td>
                    <a href="<?php echo e(route('kendaraan.restore', $data->plat_nomor)); ?>" type="button" class="btn btn-secondary rounded-3">Restore</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('kendaraan.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pakran_anas\resources\views/kendaraan/index.blade.php ENDPATH**/ ?>