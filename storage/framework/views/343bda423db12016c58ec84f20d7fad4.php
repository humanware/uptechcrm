

<?php $__env->startSection('title', 'Task Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <h4><?php echo e($task->title); ?></h4>
        <p><strong>Project:</strong> <?php echo e($task->project->name); ?></p>
        <p><strong>Status:</strong> <?php echo e($task->status); ?></p>
        <p><strong>Assignee:</strong> <?php echo e(optional($task->assignee)->name); ?></p>
        <p><strong>Reviewer:</strong> <?php echo e(optional($task->reviewer)->name); ?></p>
        <p><?php echo e($task->description); ?></p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\uptechcrm\resources\views/tasks/show.blade.php ENDPATH**/ ?>