<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Users</div>
        <div class="panel-body">
          <a href="<?php echo e(url('/users/create')); ?>" class="btn btn-success btn-sm" title="Add New User">
              <i class="fa fa-plus" aria-hidden="true"></i> Add New
          </a>
          <a href="<?php echo e(route('users.trashed')); ?>" class="btn btn-success btn-sm" title="All Posts">
                  <i class="fa fa-arrow-right" aria-hidden="true"></i> Trashed List
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
                  
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Online</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user->id); ?></td>
                        <td>
                            <?php if($user->isOnline()): ?>
                                <span style="color:green">Online</span>
                            <?php else: ?>
                                <span style="color:red">Offline</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->first_name); ?></td>
                        <td><?php echo e($user->last_name); ?></td>
                        <td>
                            <a title="Show User" href="<?php echo e(route('users.show', ['id'=> $user->id])); ?>" class="btn btn-primary"><span class="fa fa-newspaper-o"></span></a>
                            <a title="Edit article" href="<?php echo e(route('users.edit', ['id'=> $user->id])); ?>" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                            <button title="Delete user" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_user_<?php echo e($user->id); ?>"><span class="fa fa-trash-o"></span></button>
                        </td>
                    </tr>

                    <div class="modal fade" id="delete_user_<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <form class="" action="<?php echo e(route('users.destroy', ['id' => $user->id])); ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                            <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header bg-red">
                                <h4 class="modal-title" id="mySmallModalLabel">Delete user</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>

                                <div class="modal-body">
                                Are you sure to delete user: <b><?php echo e($user->title); ?> </b>?
                                </div>
                                <div class="modal-footer">
                                <a href="<?php echo e(url('/users')); ?>">
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
            </div>
            <!-- Pagination -->
            <div class="pagination justify-content-center mb-4">
                <?php echo e($users->links()); ?>

            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>