<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            Edit Post <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-success btn-sm  float-right" title="All posts"> <span data-feather="arrow-left"></span>  Go Back</a>
        </div>
        <div class="panel-body">
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
                <form action="<?php echo e(route('posts.update',['id' => $post->id])); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <input type="hidden" name="_method" value="PUT">
                <div class="card">
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="title">Post Title</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" class="form-control" value="<?php echo e($post->title); ?>">
                                <span class="help-block">Enter Post Title</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="content">Post Content</label>
                            <div class="col-md-9">
                                <textarea id="content" name="content" rows="9" class="form-control"><?php echo e($post->content); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Select Category</label>
                            <select name="category_id" class="form-control selectpicker">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"
                                    <?php if($key == old('category_id', $post->category_id)): ?>
                                        selected="selected"
                                    <?php endif; ?>
                                    ><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Post Tags</label>
                              <select class="form-control select2-multi" name="tags[]" multiple="multiple" id="tags">
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value='<?php echo e($tag->id); ?>' <?php echo e((collect(old('tags'))->contains($tag->id)) ? 'selected':''); ?>><?php echo e($tag->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Is Active</label>
                        <div class="col-md-9">
                              <label class="radio-inline" for="inline-radio1">
                                <input type="radio" id="inline-radio1" name="is_active" value="1" <?php if(old('is_active', $post->is_active)): ?> checked="checked" <?php endif; ?>> Yes
                              </label>
                              <label class="radio-inline" for="inline-radio2">
                                <input type="radio" id="inline-radio2" name="is_active" value="0"> No
                              </label>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                      <button type="submit" class="btn btn-primary btn-sm float-right"><span data-feather="save"></span> Update</button>
                    </div>
                
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>
</div>
<?php $__env->stopSection(); ?>  

<?php $__env->startSection('scripts'); ?>

<script>
    $('.select2-multi').select2({
        placeholder: 'Choose A Tag',
        tags: true
    });
    $('#tags').select2().val(<?php echo json_encode($post->tags()->allRelatedIds()->toArray()); ?>).trigger('change');
</script>   
<?php $__env->stopSection(); ?>
   
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>