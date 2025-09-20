

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Tambah Transaksi</h1>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('transactions.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select name="barang_id" id="barang_id" class="form-select" required>
                <option value="">-- Pilih Barang --</option>
                <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($barang->id); ?>"><?php echo e($barang->name); ?> (Stok: <?php echo e($barang->stock); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Jenis Transaksi</label>
            <select name="type" id="type" class="form-select" required>
                <option value="in">Barang Masuk</option>
                <option value="out">Barang Keluar</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Keterangan</label>
            <textarea name="note" id="note" class="form-control" rows="2"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?php echo e(route('transactions.index')); ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\inventory\resources\views/transactions/create.blade.php ENDPATH**/ ?>