    
    <?php $__env->startSection('styles'); ?>
        <!-- Custom styles for this template -->
        <link href="/css/dashboard.css" rel="stylesheet">
        <link href="<?php echo e(asset('css/select2.min.css')); ?>" rel="stylesheet">
    <?php $__env->stopSection(); ?>
    
    
    <?php $__env->startSection('head'); ?>
    <?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('navigation'); ?>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3">
              <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
              </li>
            </ul>
        </nav>
    <?php $__env->stopSection(); ?>
    
    
    
    <?php $__env->startSection('page'); ?>
      <div class="container-fluid">
        <div class="row">
          <?php echo $__env->make('partials.admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <?php echo $__env->yieldContent('content'); ?>
          </main>
        </div><!-- /.row -->
      </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('adminscripts'); ?>
      
      <?php echo $__env->make('partials.admin._scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    
    <?php $__env->stopSection(); ?>
    
 
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>