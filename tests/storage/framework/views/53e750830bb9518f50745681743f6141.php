

<?php $__env->startSection('content'); ?>
<h2>Tambah Kategori</h2>

<form action="<?php echo e(route('categories.store')); ?>" method="POST" class="mt-3">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-secondary">Batal</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\inventory\resources\views/categories/create.blade.php ENDPATH**/ ?>