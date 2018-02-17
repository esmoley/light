<?php $__env->startSection('content'); ?>
    <h1>Create new User</h1>
    <?php echo Form::open(['action' => 'Admin\GcUsersController@store', 'method' => 'POST']); ?>

        <div class="form-group">
            <?php echo e(Form::label('name','Name')); ?>

            <?php echo e(Form::text('name','',['class'=>'form-control','placeholder' => 'Name'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('email','Email')); ?>

            <?php echo e(Form::text('email','',['class'=>'form-control','placeholder' => 'Email'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('password','Password')); ?>

            <?php echo e(Form::text('password','',['class'=>'form-control','placeholder' => 'Password'])); ?>

        </div>
        <?php echo e(Form::submit('Submit',['class'=>'btn btn-primary'])); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>