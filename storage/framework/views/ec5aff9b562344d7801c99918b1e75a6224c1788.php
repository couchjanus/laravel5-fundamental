<?php $__env->startSection('jumbotron'); ?>
    <div class="jumbotron">
        <div class="container">
            <h1>Contact Us</h1>
            <h2>Your message will be delivered to our clandestine team</h2>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div role="main" class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title map">
                        <gmap-map map-type-id="roadmap"
                                style="width: 100%; height: 300px;"
                        >
                        </gmap-map>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="border: none;">
                                <span class="fa fa-calendar" style="color: #FFC200; padding-right: 5px;" aria-hidden></span>
                                <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-8">

            <p>
                Send us your questions, comments, and suggestions and someone will be in touch within
                24 hours.
            </p>

            <?php echo Form::open(['route' => 'contact.store']); ?>


            <div class="form-group">
                <?php echo Form::label('name', 'Your Name'); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('email', 'E-mail Address'); ?>

                <?php echo Form::text('email', null, ['class' => 'form-control']); ?>

            </div>

            <div class="form-group">
                <?php echo Form::label('msg', 'Message'); ?>

                <?php echo Form::textarea('msg', null, ['class' => 'form-control']); ?>

            </div>

            <div class="form-group">
            </div>

            <?php echo Form::submit('Submit', ['class' => 'btn btn-info']); ?>


            <?php echo Form::close(); ?>

            <br />
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>