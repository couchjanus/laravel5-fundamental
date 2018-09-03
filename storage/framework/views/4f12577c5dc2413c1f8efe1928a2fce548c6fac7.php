<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">Posts <a href="<?php echo e(url('/posts/create')); ?>" class="btn btn-success btn-sm float-right" title="Add New Post">
        <span data-feather="plus"></span> Add New
      </a></div>
        <div class="panel-body">
            <?php if(Session::get('message') != Null): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo e(Session::get('message')); ?>

                    </div>
                </div>
            </div>
          <?php endif; ?>
            <div class="table-responsive">
              <table class="table table-hover table-striped table-sm">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Posted On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($post->title); ?></td>
                        <td><?php echo e(date('d F Y', strtotime($post->created_at))); ?></td>
                        <td>
                            <a title="Read article" href="<?php echo e(route('posts.show', ['id'=> $post->id])); ?>" class="btn btn-primary"><span data-feather="eye"></span></a>&nbsp;<a title="Edit article" href="<?php echo e(route('posts.edit', ['id'=> $post->id])); ?>" class="btn btn-warning"><span data-feather="edit"></span></a>&nbsp;<button title="Delete post" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_post_<?php echo e($post->id); ?>"><span data-feather="delete"></span></button>
                        </td>
                    </tr>

                    <div class="modal fade" id="delete_post_<?php echo e($post->id); ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <form class="" action="<?php echo e(route('posts.destroy', ['id' => $post->id])); ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                            <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header bg-red">
                                <h4 class="modal-title" id="mySmallModalLabel">Delete post</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>

                                <div class="modal-body">
                                Are you sure to delete post: <b><?php echo e($post->title); ?> </b>?
                                </div>
                                <div class="modal-footer">
                                <a href="<?php echo e(url('/posts')); ?>">
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
                <?php echo e($posts->links()); ?>

            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>