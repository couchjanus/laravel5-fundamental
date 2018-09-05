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
            <strong>Edit</strong> User
              <a href="<?php echo e(route('users.index')); ?>" class="btn btn-success btn-sm" title="All Posts">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back
              </a>
          </div>

          <div class="card-block">

          <?php echo Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]); ?>


            <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
              <?php echo Form::label('name', 'User Name', array('class' => 'col-md-3 control-label'));; ?>

              <div class="col-md-9">
                <div class="input-group">
                  <?php echo Form::text('name', old('name'), array('id' => 'name', 'class' => 'form-control')); ?>

                  <label class="input-group-addon" for="name"><i class="fa fa-fw-user" aria-hidden="true"></i></label>
                </div>
                <?php if($errors->has('name')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('name')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
            </div>



               
                            

            <div class="form-group has-feedback row <?php echo e($errors->has('roles') ? ' has-error ' : ''); ?>">
              
              <?php echo Form::label('role_list', 'User Roles*', array('class' => 'col-md-3 control-label')); ?>


              <div class="col-md-9">
                <div class="input-group">
                <?php echo Form::select('role_list[]', $roles, $user->roles, ['id' => 'role_list', 'class' => 'form-control select2', 'multiple']); ?>

                  <label class="input-group-addon" for="roles"><i class="fa fa-fw-user" aria-hidden="true"></i></label>
                </div>
                <?php if($errors->has('roles')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('roles')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
            </div>

            
            <?php echo Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . 'Update User', array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )); ?>

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
        $('').select2({
            placeholder: 'Choose A Role',
            roles: true 
        });
        $('#role_list').select2().val(<?php echo json_encode($user->roles()->allRelatedIds()->toArray()); ?>).trigger('change');


    </script>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>