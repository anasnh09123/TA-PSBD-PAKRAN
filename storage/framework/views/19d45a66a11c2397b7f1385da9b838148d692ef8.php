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
                                    <a type="button" class="btn btn-success rounded-3"  href="<?php echo e(route('pajak.index')); ?>"><?php echo e(__('Kategori')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-info rounded-3"  href="<?php echo e(route('join')); ?>"><?php echo e(__('Pajak')); ?></a>
                                </li>
</ul>
<h4 class="mt-5">Kategori Pajak</h4>

<a href="<?php echo e(route('pajak.create')); ?>" type="button" class="btn btn-success rounded-3">Tambah Data</a>

<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success mt-3" role="alert">
        <?php echo e($message); ?>

    </div>
<?php endif; ?>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Kategori</th>
        <th>Harga Pajak/thn</th>
        <th>jenis Kendaraan</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($data->id_pajak); ?></td>
                <td><?php echo e($data->harga_pajak); ?></td>
                <td><?php echo e($data->jenis_kendaraan); ?></td>
                <td>
                    <a href="<?php echo e(route('pajak.edit', $data->id_pajak)); ?>" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo e($data->id_pajak); ?>">
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal<?php echo e($data->id_pajak); ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="<?php echo e(route('pajak.delete', $data->id_pajak)); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pajak.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pakran_anas\resources\views/pajak/index.blade.php ENDPATH**/ ?>