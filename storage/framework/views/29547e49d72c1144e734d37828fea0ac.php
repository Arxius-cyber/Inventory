

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Inventory</a>
    <ul class="navbar-nav ms-auto">
      <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->role == 'admin'): ?>
          <li class="nav-item"><a href="<?php echo e(route('dashboard')); ?>" class="nav-link">Dashboard Admin</a></li>
          <li class="nav-item"><a href="<?php echo e(route('barangs.index')); ?>" class="nav-link">Kelola Barang</a></li>
          <li class="nav-item"><a href="<?php echo e(route('categories.index')); ?>" class="nav-link">Kategori</a></li>
          <li class="nav-item"><a href="<?php echo e(route('suppliers.index')); ?>" class="nav-link">Supplier</a></li>
        <?php else: ?>
          <li class="nav-item"><a href="<?php echo e(route('dashboard')); ?>" class="nav-link">Dashboard Staf</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Transaksi Masuk</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Transaksi Keluar</a></li>
        <?php endif; ?>

        <li class="nav-item">
          <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button class="btn btn-danger btn-sm ms-3">Logout</button>
          </form>
        </li>
      <?php else: ?>
        <li class="nav-item"><a href="<?php echo e(route('login')); ?>" class="nav-link">Login</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\inventory\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>