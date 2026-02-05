<div class="form-group">
    <label>Project</label>
    <select class="form-control" name="project_id">
        <option value="">--</option>
        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($project->id); ?>" <?php if(old('project_id', optional($ticket)->project_id) == $project->id): echo 'selected'; endif; ?>><?php echo e($project->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="form-group">
    <label>Title</label>
    <input class="form-control" name="title" value="<?php echo e(old('title', optional($ticket)->title)); ?>" required>
</div>
<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="description" required><?php echo e(old('description', optional($ticket)->description)); ?></textarea>
</div>
<div class="form-group">
    <label>Priority</label>
    <select class="form-control" name="priority">
        <?php $__currentLoopData = ['low' => 'Low', 'medium' => 'Medium', 'high' => 'High']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value); ?>" <?php if(old('priority', optional($ticket)->priority) === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php if($ticket): ?>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <?php $__currentLoopData = ['open' => 'Open', 'in_progress' => 'In progress', 'resolved' => 'Resolved']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value); ?>" <?php if($ticket->status === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
<?php endif; ?>
<div class="form-group">
    <label>Assign To</label>
    <select class="form-control" name="assigned_to_id">
        <option value="">--</option>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($user->id); ?>" <?php if(old('assigned_to_id', optional($ticket)->assigned_to_id) == $user->id): echo 'selected'; endif; ?>><?php echo e($user->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php /**PATH D:\Projects\uptechcrm\resources\views/tickets/partials/form.blade.php ENDPATH**/ ?>