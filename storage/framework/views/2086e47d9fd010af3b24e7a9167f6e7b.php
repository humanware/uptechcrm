

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo e($projectCount); ?></h3>
                <p>Projects</p>
            </div>
            <div class="icon"><i class="fas fa-folder"></i></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo e($taskCount); ?></h3>
                <p>Tasks</p>
            </div>
            <div class="icon"><i class="fas fa-tasks"></i></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo e($ticketCount); ?></h3>
                <p>Tickets</p>
            </div>
            <div class="icon"><i class="fas fa-life-ring"></i></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?php echo e($leaveCount); ?></h3>
                <p>Leave Requests</p>
            </div>
            <div class="icon"><i class="fas fa-plane"></i></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\uptechcrm\resources\views/dashboard.blade.php ENDPATH**/ ?>