<?php $__env->startComponent('mail::message'); ?>
# Introduction

## Hello There <?php echo e($contactName); ?>!

Janus Nic has sent you a message.
<?php $__env->startComponent('mail::button', ['url' => '']); ?>
Button Text
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
