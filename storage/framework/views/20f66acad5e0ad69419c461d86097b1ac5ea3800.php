<?php $__env->startSection('content'); ?>
<!-- Blog Entries Column -->
<div class="col-md-8">
  
  <div class="card mb-4">
    
    <div>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
          
          <div class="card-body">
              <h2 class="card-title"><?php echo e($post->title); ?></h2>  
              <a href="<?php echo e(route('blog.show', $post->slug)); ?>"
                  class="btn btn-info">Read More &rarr;</a>
          </div>

          <div class="card-footer text-muted">
              Posted on  by&nbsp;
              <a href=""> Janus Nic</a>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- Pagination -->
    </div>
    <div class="pagination justify-content-center mb-4">
      <?php echo e($posts->links()); ?>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
  <?php echo $__env->make('blog.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<!-- /.row -->

<?php echo $__env->make('layouts.blog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>