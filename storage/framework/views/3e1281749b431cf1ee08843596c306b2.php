

<?php $__env->startSection('title', 'Request Leave'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <form method="post" action="<?php echo e(route('leaves.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Reason</label>
                <textarea class="form-control" name="reason" required><?php echo e(old('reason')); ?></textarea>
            </div>
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" class="form-control" name="starts_at" value="<?php echo e(old('starts_at')); ?>" required>
            </div>
            <div class="form-group">
                <label>End Date</label>
                <input type="date" class="form-control" name="ends_at" value="<?php echo e(old('ends_at')); ?>" required>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\uptechcrm\resources\views/leaves/create.blade.php ENDPATH**/ ?>