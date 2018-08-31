<?php $__env->startSection('title'); ?>
	<?php echo e($user->name); ?>'s Profile
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="wrapper">
    <?php echo $__env->make('profiles.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="card-header">Dashboard</div>
				<div class="panel-body">
					<dl class="user-info">
						<dt>
							Profile
						</dt>
						<dd>
							<?php echo e($user->name); ?>

						</dd>

						<dt>
							First Name
						</dt>
						<dd>
							<?php echo e($user->first_name); ?>

						</dd>

						<?php if($user->last_name): ?>
							<dt>
								Last Name
							</dt>
							<dd>
								<?php echo e($user->last_name); ?>

							</dd>
						<?php endif; ?>

						<dt>
							Email
						</dt>
						<dd>
							<?php echo e($user->email); ?>

						</dd>

						<?php if($user->profile): ?>

							<?php if($user->profile->theme_id): ?>
								<dt>
									Theme
								</dt>
								<dd>
									<?php echo e($currentTheme->name); ?>

								</dd>
							<?php endif; ?>

							<?php if($user->profile->location): ?>
								<dt>
									Location
								</dt>
								<dd>
									<?php echo e($user->profile->location); ?> <br />
								</dd>
							<?php endif; ?>

							<?php if($user->profile->bio): ?>
								<dt>
									Bio
								</dt>
								<dd>
									<?php echo e($user->profile->bio); ?>

								</dd>
							<?php endif; ?>

							<?php if($user->profile->twitter_username): ?>
								<dt>
									Twitter Username
								</dt>
								<dd>
									<?php echo HTML::link('https://twitter.com/'.$user->profile->twitter_username, $user->profile->twitter_username, array('class' => 'twitter-link', 'target' => '_blank')); ?>

								</dd>
							<?php endif; ?>

							<?php if($user->profile->github_username): ?>
								<dt>
									GitHub Username
								</dt>
								<dd>
									<?php echo HTML::link('https://github.com/'.$user->profile->github_username, $user->profile->github_username, array('class' => 'github-link', 'target' => '_blank')); ?>

								</dd>
							<?php endif; ?>
						<?php endif; ?>

					</dl>
			</div>
          <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>