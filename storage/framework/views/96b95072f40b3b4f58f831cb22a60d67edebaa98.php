<!-- Categories Widget -->
<?php if($data): ?>
<div class="card my-4">
  <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($loop->iteration  % 2 == 0): ?>
                <li>
                    <a href=""><?php echo e($item->name); ?></a>
                </li>
              <?php endif; ?> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>

        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($loop->iteration  % 2 != 0): ?>
                <li>
                    <a href=""><?php echo e($item->name); ?></a>
                </li>
              <?php endif; ?> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
