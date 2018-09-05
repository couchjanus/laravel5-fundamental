<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Edit Role</div>
        <div class="panel-body">
          <a href="<?php echo e(url('/roles')); ?>" class="btn btn-success btn-sm" title="Go to Role">
              <i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back
          </a>
            <br/>
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

            <br/>
    
    <?php echo Form::model($role, ['method' => 'PUT', 'route' => ['roles.update', $role->id]]); ?>


        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    <?php echo Form::label('name', 'Name*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('name')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('name')); ?>

                        </p>
                    <?php endif; ?>
                </div>
                
                <div class="col-md-12 form-group">
                    <?php echo Form::label('permission_list', 'Permissions:'); ?>

                    <?php echo Form::select('permission_list[]', $permissions, $role->permissions, ['id' => 'permission_list', 'class' => 'form-control', 'multiple']); ?>

                           
                </div>
            </div>
            
        </div>
    
    <?php echo Form::submit('Update', ['class' => 'btn btn-danger']); ?>

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
            placeholder: 'Choose A Permissions',
            permissions: true 
        });
        $('#permission_list').select2().val(<?php echo json_encode($role->permissions()->allRelatedIds()->toArray()); ?>).trigger('change');

    </script>
   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>