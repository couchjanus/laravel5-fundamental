<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<!-- Stored in resources/views/layouts/base.blade.php -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        

        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo e(config('app.name', 'Laravel')); ?> - <?php echo $__env->yieldContent('title'); ?></title>

        <?php echo $__env->yieldContent('meta'); ?>

        

        <!-- Fonts -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

        <?php echo $__env->yieldContent('styles'); ?>

        
        <?php echo $__env->yieldContent('head'); ?>

    </head>
    <body class="<?php echo $__env->yieldContent('body_class'); ?>">
        
        
        
        <?php echo $__env->yieldContent('navigation'); ?>        
        <!-- Page Content -->
        
        <div class="container">
            <?php echo $__env->yieldContent('page'); ?>
        </div>
        
        <?php echo $__env->yieldContent('footer'); ?>
        
        
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

        
        <?php echo $__env->yieldContent('adminscripts'); ?>

        
        <?php echo $__env->yieldContent('scripts'); ?>
    
    </body>
</html>
