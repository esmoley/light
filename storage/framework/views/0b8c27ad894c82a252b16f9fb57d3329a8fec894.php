<?php $__env->startSection('content'); ?>
<?php if(count($post)>0): ?>
    <h1>Edit Computer <?php echo e($post->title); ?></h1>
    <?php echo Form::open(['action' => ['Admin\ComputersController@update',$post->id], 'method' => 'POST']); ?>

        <div class="form-group">
            <?php echo e(Form::label('title','Title')); ?>

            <?php echo e(Form::text('title',$post->title,['class'=>'form-control','placeholder' => 'Title'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('enabled','Enabled')); ?>

            <?php echo e(Form::checkbox('enabled',$post->enabled,$post->enabled)); ?>

        </div>
        <?php echo e(Form::hidden('_method','PUT')); ?>

        <?php echo e(Form::submit('Submit',['class'=>'btn btn-primary'])); ?>

    <?php echo Form::close(); ?>

<?php else: ?>
<h1>Computer is not found</h1>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>