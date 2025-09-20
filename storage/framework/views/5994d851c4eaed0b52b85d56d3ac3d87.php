<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Daftar Transaksi</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <a href="<?php echo e(route('transactions.create')); ?>" class="btn btn-primary mb-3">+ Tambah Transaksi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Barang</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Staf</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($trx->date->format('d-m-Y')); ?></td>
                    <td><?php echo e($trx->barang->name ?? '-'); ?></td>
                    <td>
                        <span class="badge <?php echo e($trx->type === 'in' ? 'bg-success' : 'bg-danger'); ?>">
                            <?php echo e($trx->type_label); ?>

                        </span>
                    </td>
                    <td><?php echo e($trx->quantity); ?></td>
                    <td><?php echo e($trx->user->name ?? '-'); ?></td>
                    <td><?php echo e($trx->note ?? '-'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada transaksi</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <?php echo e($transactions->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\inventory\resources\views/transactions/index.blade.php ENDPATH**/ ?>