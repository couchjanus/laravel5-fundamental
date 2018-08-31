<?php if(Session::get('message') != Null): ?>
    <div class="row">
        <div class="col-md-9">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo e(Session::get('message')); ?>

            </div>
        </div>
    </div>
<?php endif; ?>
<?php if(Session::get('error') != Null): ?>
    <div class="row">
        <div class="col-md-9">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo e(Session::get('error')); ?>

            </div>
        </div>
    </div>
<?php endif; ?>
<?php if(Session::get('info') != Null): ?>
    <div class="row">
        <div class="col-md-9">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo e(Session::get('info')); ?>

            </div>
        </div>
    </div>
<?php endif; ?>
