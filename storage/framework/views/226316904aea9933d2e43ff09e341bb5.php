

<?php $__env->startSection('title', 'Projects'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-3">
    <a href="<?php echo e(route('projects.create')); ?>" class="btn btn-primary">New Project</a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Client</th>
                    <th>Status</th>
                    <th>Sample</th>
                    <th>Manager</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($project->name); ?></td>
                        <td><?php echo e($project->client_name); ?></td>
                        <td><?php echo e($project->status); ?></td>
                        <td><?php echo e($project->sample_status); ?></td>
                        <td><?php echo e(optional($project->manager)->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('projects.show', $project)); ?>" class="btn btn-sm btn-info">View</a>
                            <a href="<?php echo e(route('projects.edit', $project)); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form method="post" action="<?php echo e(route('projects.destroy', $project)); ?>" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\uptechcrm\resources\views/projects/index.blade.php ENDPATH**/ ?>