<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="animated fadeIn">
      <?php if(Session::get('message') != Null): ?>
        <div class="row">
            <div class="col-md-9">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo e(Session::get('message')); ?>

                </div>
            </div>
        </div>
      <?php endif; ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong>Create New</strong> User
              <a href="<?php echo e(route('users.index')); ?>" class="btn btn-success btn-sm" title="All Posts">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back
              </a>
          </div>

          <div class="card-block">
          <?php echo Form::open(['route' => 'users.store']); ?>

            <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
              <?php echo Form::label('name', 'User Name', array('class' => 'col-md-3 control-label'));; ?>

              <div class="col-md-9">
                <div class="input-group">
                  <?php echo Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'User Name')); ?>

                  <label class="input-group-addon" for="name"><i class="fa fa-fw-user" aria-hidden="true"></i></label>
                </div>
                <?php if($errors->has('name')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('name')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-group has-feedback row <?php echo e($errors->has('email') ? ' has-error ' : ''); ?>">
              <?php echo Form::label('email', 'User Email', array('class' => 'col-md-3 control-label'));; ?>

              <div class="col-md-9">
                <div class="input-group">
                  <?php echo Form::text('email', NULL, array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'User email')); ?>

                  <label class="input-group-addon" for="email"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?>" aria-hidden="true"></i></label>
                </div>
                <?php if($errors->has('email')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('email')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
            </div>
          
            <div class="form-group has-feedback row <?php echo e($errors->has('password') ? ' has-error ' : ''); ?>">
              <?php echo Form::label('password', 'Password', array('class' => 'col-md-3 control-label'));; ?>

              <div class="col-md-9">
                <div class="input-group">
                  <?php echo Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => 'password')); ?>

                  <label class="input-group-addon" for="password"><i class="fa fa-fw" aria-hidden="true"></i></label>
                </div>
                <?php if($errors->has('password')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('password')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
            </div>

            <div class="form-group has-feedback row <?php echo e($errors->has('password_confirmation') ? ' has-error ' : ''); ?>">
              <?php echo Form::label('password_confirmation', 'Password Confirmation', array('class' => 'col-md-3 control-label'));; ?>

              <div class="col-md-9">
                <div class="input-group">
                  <?php echo Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'password confirmation')); ?>

                  <label class="input-group-addon" for="password_confirmation"><i class="fa fa-fw" aria-hidden="true"></i></label>
                </div>
                <?php if($errors->has('password_confirmation')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
            </div>


            <div class="form-group has-feedback row <?php echo e($errors->has('roles') ? ' has-error ' : ''); ?>">
              <?php echo Form::label('role_list', 'Roles*', array('class' => 'col-md-3 control-label')); ?>

              
              <div class="col-md-9">
                <div class="input-group">
                <?php echo Form::select('role_list[]', $roles, null, ['id' => 'role_list', 'class' => 'form-control select2', 'multiple']); ?>

                  <label class="input-group-addon" for="name"><i class="fa fa-fw" aria-hidden="true"></i></label>
                </div>
                <?php if($errors->has('roles')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('roles')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
            </div>

            <?php echo Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . 'Create User', array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )); ?>

          <?php echo Form::close(); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $('#role_list').select2({
            placeholder: 'Choose A Role',
            roles: true
        });

    </script>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>