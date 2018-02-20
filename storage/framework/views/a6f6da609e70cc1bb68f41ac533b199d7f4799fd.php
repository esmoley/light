<?php $__env->startSection('content'); ?>
    <h1>Create new User</h1>
    <?php echo Form::open(['action' => 'Admin\UsersClubController@store', 'method' => 'POST']); ?>

        <div class="form-group">
            <?php echo e(Form::label('username','*Username')); ?>

            <?php echo e(Form::text('username','',['class'=>'form-control','placeholder' => 'Username'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('email','Email')); ?>

            <?php echo e(Form::text('email','',['class'=>'form-control','placeholder' => 'Email'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('password','Password')); ?>

            <?php echo e(Form::text('password','',['class'=>'form-control','placeholder' => 'Password'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('studentsid','Students id')); ?>

            <?php echo e(Form::text('studentsid','',['class'=>'form-control','placeholder' => 'Students id'])); ?>

        </div>
        <?php echo e(Form::submit('Submit',['class'=>'btn btn-primary'])); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>