<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(__('You are logged in!')); ?>

                </div>
                <ul class="navbar-nav ms-4 flex-row item-justify gap-4"> 
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
                                    <a type="button" class="btn btn-info rounded-3"  href="<?php echo e(route('join')); ?>"><?php echo e(__('Pajak')); ?></a>
                                </li>
</ul>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pemilik.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pakran_anas\resources\views/home.blade.php ENDPATH**/ ?>