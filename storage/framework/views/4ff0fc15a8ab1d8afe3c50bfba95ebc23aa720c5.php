<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" href="#">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="<?php echo e(url('/')); ?>">
          <?php echo e(config('app.name', 'Laravel')); ?></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
        </a>
        <!-- Authentication Links -->
        <?php if(auth()->guard()->guest()): ?>
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('login')); ?>"><?php echo e(__('Sign in')); ?></a>
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('register')); ?>"><?php echo e(__('Sign up')); ?></a>
        <?php else: ?>
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('logout')); ?>"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           <?php echo e(__('Logout')); ?></a>
          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                      <?php echo csrf_field(); ?>
          </form>
        <?php endif; ?>

      </div>
    </div>
  </header>


  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
          <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
              <?php echo e(config('app.name', 'Laravel')); ?>

          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
              <span class="navbar-toggler-icon"></span>
          </button>

         
      </div>
  </nav>


  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 text-muted" href="<?php echo e(url('/')); ?>">Home</a>
      <a class="p-2 text-muted" href="/blog">Blog</a>
      <a class="p-2 text-muted" href="/about">About</a>
      <a class="p-2 text-muted" href="/contact">Contact</a>
      <a class="p-2 text-muted" href="#">Culture</a>
      <a class="p-2 text-muted" href="#">Business</a>
      <a class="p-2 text-muted" href="#">Politics</a>
      <a class="p-2 text-muted" href="#">Opinion</a>
      <a class="p-2 text-muted" href="#">Science</a>
      <a class="p-2 text-muted" href="#">Health</a>
      <a class="p-2 text-muted" href="#">Style</a>
      <a class="p-2 text-muted" href="#">Travel</a>
    </nav>
  </div>
</div>