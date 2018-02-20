<?php $__env->startSection('content'); ?>
    <h1>Users</h1>
    <a href="/users/create" class="btn btn-primary">Create User</a>
    <?php if(count($posts)>0): ?>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="well well-sm">
            <h3><a href="/users/<?php echo e($post->id); ?>"><?php echo e($post->username); ?></a></h3>
            <small>Created <?php echo e($post->created_at); ?></small>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($posts->links()); ?>

    <?php else: ?>
        <p>No users yet</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>