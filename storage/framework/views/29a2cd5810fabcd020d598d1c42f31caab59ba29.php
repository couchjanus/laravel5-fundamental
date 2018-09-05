<?php $__env->startSection('content'); ?>

<!-- Main content -->
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Roles</div>
        <div class="panel-body">
          <a href="<?php echo e(url('/roles/create')); ?>" class="btn btn-success btn-sm" title="Add New Role">
              <i class="fa fa-plus" aria-hidden="true"></i> Add New
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
            <div class="table-responsive">
            <?php if(count($roles) > 0): ?>      
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Posted On</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($role->name); ?></td>
                            <td><?php echo e(date('d F Y', strtotime($role->created_at))); ?></td>
                            <td>
                                <a title="Read role" href="<?php echo e(route('roles.show', ['id'=> $role->id])); ?>" class="btn btn-primary"><span class="fa fa-newspaper-o"></span></a>
                                <a title="Edit role" href="<?php echo e(route('roles.edit', ['id'=> $role->id])); ?>" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                                <button title="Delete role" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_role_<?php echo e($role->id); ?>"><span class="fa fa-trash-o"></span></button>
                            </td>
                        </tr>
    
                        <div class="modal fade" id="delete_role_<?php echo e($role->id); ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <form class="" action="<?php echo e(route('roles.destroy', ['id' => $role->id])); ?>" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    
                                <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header bg-red">
                                    <h4 class="modal-title" id="mySmallModalLabel">Delete role</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
    
                                    <div class="modal-body">
                                    Are you sure to delete role: <b><?php echo e($role->name); ?> </b>?
                                    </div>
                                    <div class="modal-footer">
                                    <a href="<?php echo e(url('/roles')); ?>">
                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                    </a>
                                    <button type="submit" class="btn btn-outline" title="Delete" value="delete">Delete</button>
                                    </div>
                                </div>
                                </div>
                            </form>
                            </div>
                      
                      
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                  <?php else: ?>
                    <div class="well text-center">No entries in table.</div>
                  <?php endif; ?>
                </div>
                <!-- Pagination -->
                <div class="pagination justify-content-center mb-4">
                    
                </div>
              </div>
            </div>
          </div>
        </div>    
      </div>
    </div>
    <?php $__env->stopSection(); ?>
    

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>