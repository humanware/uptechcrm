

<?php $__env->startSection('title', 'New Ticket'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <form method="post" action="<?php echo e(route('tickets.store')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('tickets.partials.form', ['ticket' => null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\uptechcrm\resources\views/tickets/create.blade.php ENDPATH**/ ?>