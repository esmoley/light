<?php $__env->startSection('content'); ?>

<a href='/users' class="btn btn-default">Back</a>
<?php if(count($post)>0): ?>
    <h1>User <?php echo e($post->username); ?></h1>
    <small>Written on <?php echo e($post->created_at); ?></small>
    <div>
        <h4>Email: <?php echo e($post->email); ?></h4>
        <h4>Time: <?php echo e($post->time_left); ?></h4>
    </div>
    <a href="/users/<?php echo e($post->id); ?>/edit" class="btn btn-default">Edit</a>
    <?php echo Form::open(['action'=>['UsersClubController@destroy',$post->id],'method'=>'POST','class' => 'pull-right']); ?>

        <?php echo e(Form::hidden('_method','DELETE')); ?>

        <?php echo e(Form::submit('Delete',['class'=>'btn btn-danger'])); ?>

    <?php echo Form::close(); ?>

<?php else: ?>
    <h1>User is not found</h1>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>