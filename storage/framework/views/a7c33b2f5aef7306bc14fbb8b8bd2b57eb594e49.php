    
    <?php $__env->startSection('styles'); ?>
    <style>

    #wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
    }

    #wrapper.toggled {
    padding-left: 250px;
    }

    #sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background: #000;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
    }

    #wrapper.toggled #sidebar-wrapper {
    width: 250px;
    }

    #page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
    }

    #wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
    }


    /* Sidebar Styles */

    .sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    margin: 0;
    padding: 0;
    list-style: none;
    }

    .sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
    }

    .sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #999999;
    }

    .sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255, 255, 255, 0.2);
    }

    .sidebar-nav li a:active, .sidebar-nav li a:focus {
    text-decoration: none;
    }

    .sidebar-nav>.sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
    }

    .sidebar-nav>.sidebar-brand a {
    color: #999999;
    }

    .sidebar-nav>.sidebar-brand a:hover {
    color: #fff;
    background: none;
    }

    @media(min-width:768px) {
    #wrapper {
        padding-left: 0;
    }
    #wrapper.toggled {
        padding-left: 250px;
    }
    #sidebar-wrapper {
        width: 0;
    }
    #wrapper.toggled #sidebar-wrapper {
        width: 250px;
    }
    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }
    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
    }


    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navigation'); ?>
       <?php echo $__env->make('shared.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>

    
    <?php $__env->startSection('page'); ?>
      <main role="main" class="container">
        <div class="row">
          <?php echo $__env->yieldContent('content'); ?>
          <?php echo $__env->yieldContent('sidebar'); ?>
        </div><!-- /.row -->
      </main>
    <?php $__env->stopSection(); ?>
    
    
<?php $__env->startSection('scripts'); ?>
    <script src="/js/jquery.min.js"></script>
    
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>