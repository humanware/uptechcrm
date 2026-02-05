

<?php $__env->startSection('title', 'Tasks'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Assignee</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($task->project->name); ?></td>
                        <td><?php echo e($task->title); ?></td>
                        <td>
                            <select class="form-control js-task-status" data-id="<?php echo e($task->id); ?>">
                                <?php $__currentLoopData = ['in_progress' => 'In progress', 'in_review' => 'In review', 'changes_requested' => 'Changes requested', 'approved' => 'Approved']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>" <?php if($task->status === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                        <td><?php echo e(optional($task->assignee)->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('tasks.show', $task)); ?>" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $('.js-task-status').on('change', function () {
        $.ajax({
            url: `/api/tasks/${$(this).data('id')}/status`,
            method: 'PATCH',
            data: {status: $(this).val()},
            headers: {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\uptechcrm\resources\views/tasks/index.blade.php ENDPATH**/ ?>