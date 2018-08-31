    
    <?php $__env->startSection('styles'); ?>
        <?php echo $__env->make('partials.styles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
    
    
    <?php $__env->startSection('head'); ?>
    <?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('navigation'); ?>
       <?php echo $__env->make('shared.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
    
    
    
    <?php $__env->startSection('page'); ?>
      <main role="main" class="container">
        <div class="row">
          <?php echo $__env->yieldContent('content'); ?>
        </div><!-- /.row -->
      </main>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('footer'); ?>
        <?php echo $__env->make('shared.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
    
    

    <?php $__env->startSection('scripts'); ?>
    <?php $__env->stopSection(); ?>
   
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>