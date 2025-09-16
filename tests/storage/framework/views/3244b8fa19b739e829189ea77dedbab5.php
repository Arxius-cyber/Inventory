

<?php $__env->startSection('content'); ?>
<h2>Tambah Supplier</h2>

<form action="<?php echo e(route('suppliers.store')); ?>" method="POST" class="mt-3">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Supplier</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <textarea name="address" id="address" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Telepon</label>
        <input type="text" name="phone" id="phone" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?php echo e(route('suppliers.index')); ?>" class="btn btn-secondary">Batal</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\inventory\resources\views/suppliers/create.blade.php ENDPATH**/ ?>