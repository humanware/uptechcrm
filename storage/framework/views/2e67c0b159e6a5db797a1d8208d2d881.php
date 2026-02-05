

<?php $__env->startSection('title', 'Project Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="card mb-3">
    <div class="card-body">
        <h4><?php echo e($project->name); ?></h4>
        <p><strong>Client:</strong> <?php echo e($project->client_name); ?> (<?php echo e($project->client_email); ?>)</p>
        <p><strong>Status:</strong> <?php echo e($project->status); ?></p>
        <p><strong>Sample:</strong> <?php echo e($project->sample_status); ?></p>
        <p><strong>Requirements:</strong> <?php echo e($project->requirements); ?></p>
        <a href="<?php echo e(route('projects.edit', $project)); ?>" class="btn btn-warning">Edit</a>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Tasks</span>
        <a href="<?php echo e(route('projects.tasks.create', $project)); ?>" class="btn btn-sm btn-primary">Add Task</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Assignee</th>
                    <th>Reviewer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($task->title); ?></td>
                        <td><?php echo e($task->status); ?></td>
                        <td><?php echo e(optional($task->assignee)->name); ?></td>
                        <td><?php echo e(optional($task->reviewer)->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('tasks.show', $task)); ?>" class="btn btn-sm btn-info">View</a>
                            <a href="<?php echo e(route('tasks.edit', $task)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\uptechcrm\resources\views/projects/show.blade.php ENDPATH**/ ?>