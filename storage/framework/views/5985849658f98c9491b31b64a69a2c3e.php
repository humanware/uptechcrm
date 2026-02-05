

<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <form method="post" action="<?php echo e(route('profile.update')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="name" value="<?php echo e(old('name', $user->name)); ?>">
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input class="form-control" name="password" type="password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input class="form-control" name="password_confirmation" type="password">
            </div>
            <div class="form-group">
                <label>Avatar</label>
                <input class="form-control" name="avatar" type="file">
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\uptechcrm\resources\views/profile/edit.blade.php ENDPATH**/ ?>