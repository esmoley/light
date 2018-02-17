<?php echo Form::open(['action' => '_con\MainController@store', 'method' => 'post']); ?>

<div class="form-group">
    <?php echo e(Form::label('username_connect','*username_connect')); ?>

    <?php echo e(Form::text('username_connect','',['class'=>'form-control','placeholder' => 'username_connect'])); ?>

</div>
<div class="form-group">
    <?php echo e(Form::label('password_connect','*password_connect')); ?>

    <?php echo e(Form::text('password_connect','',['class'=>'form-control','placeholder' => 'password_connect'])); ?>

</div>
<div class="form-group">
    <?php echo e(Form::label('pc_name','*pc_name')); ?>

    <?php echo e(Form::text('pc_name','',['class'=>'form-control','placeholder' => 'pc_name'])); ?>

</div>
<div class="form-group">
    <?php echo e(Form::label('mac','*mac')); ?>

    <?php echo e(Form::text('mac','',['class'=>'form-control','placeholder' => 'mac'])); ?>

</div>
<div class="form-group">
    <?php echo e(Form::label('status','*status')); ?>

    <?php echo e(Form::text('status','',['class'=>'form-control','placeholder' => 'status'])); ?>

</div>

<?php echo e(Form::submit('Submit',['class'=>'btn btn-primary'])); ?>

<?php echo Form::close(); ?>