<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
      <div class="panel panel-default">
          <?php echo $__env->make('partials.admin._messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="panel-heading">Add New User <a href="<?php echo e(route('users.index')); ?>" class="btn btn-success btn-sm float-right" title="All users"> <span data-feather="arrow-left"></span> Go Back</a>
        </div>
        <div class="panel-body">
          
            <div class="table-responsive">
                <?php echo Form::open(['route' => 'users.store']); ?>

                <div class="card">
                  <div class="card-block">
                      <div class="form-group has-feedback <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                        <?php echo Form::label('name', 'User Name', array('class' => 'col-md-3 control-label'));; ?>

                        <?php echo Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'User Name')); ?>

                        <?php if($errors->has('name')): ?>
                          <span class="help-block">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                          </span>
                        <?php endif; ?>
                      </div>
                      <div class="form-group has-feedback <?php echo e($errors->has('email') ? ' has-error ' : ''); ?>">
                          <?php echo Form::label('email', 'User Email', array('class' => 'col-md-3 control-label'));; ?>

                          <?php echo Form::text('email', NULL, array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'User email')); ?>

                          <?php if($errors->has('email')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('email')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                      <div class="form-group has-feedback <?php echo e($errors->has('password') ? ' has-error ' : ''); ?>">
                          <?php echo Form::label('password', 'Password', array('class' => 'col-md-3 control-label'));; ?>

                          <?php echo Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => 'password')); ?>

                          <?php if($errors->has('password')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('password')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                  </div>  
                  <div class="card-footer text-muted">
                        <?php echo Form::button('<span data-feather="save"></span>&nbsp;' . 'Create User', array('class' => 'btn btn-primary btn-sm pull-right','type' => 'submit', )); ?>

                  </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
          </div>
      </div>
    </div>
  </div>    
</div>

<?php $__env->stopSection(); ?>  

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>