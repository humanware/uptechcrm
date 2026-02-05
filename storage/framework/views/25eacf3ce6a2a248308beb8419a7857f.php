<div class="form-group">
    <label>Project Name</label>
    <input class="form-control" name="name" value="<?php echo e(old('name', optional($project)->name)); ?>" required>
</div>
<div class="form-group">
    <label>Client Name</label>
    <input class="form-control" name="client_name" value="<?php echo e(old('client_name', optional($project)->client_name)); ?>" required>
</div>
<div class="form-group">
    <label>Client Email</label>
    <input class="form-control" name="client_email" value="<?php echo e(old('client_email', optional($project)->client_email)); ?>">
</div>
<div class="form-group">
    <label>Requirements</label>
    <textarea class="form-control" name="requirements" required><?php echo e(old('requirements', optional($project)->requirements)); ?></textarea>
</div>
<div class="form-group">
    <label>Sample Status</label>
    <select class="form-control" name="sample_status" required>
        <?php $__currentLoopData = ['sample_in_review' => 'Sample in review', 'sample_approved' => 'Sample approved', 'sample_rejected' => 'Sample rejected']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value); ?>" <?php if(old('sample_status', optional($project)->sample_status) === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php if($project): ?>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status" required>
            <?php $__currentLoopData = ['sample' => 'Sample', 'development' => 'Development', 'completed' => 'Completed']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value); ?>" <?php if(old('status', $project->status) === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
<?php endif; ?>
<div class="form-group">
    <label>Department</label>
    <select class="form-control" name="department_id">
        <option value="">--</option>
        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($department->id); ?>" <?php if(old('department_id', optional($project)->department_id) == $department->id): echo 'selected'; endif; ?>><?php echo e($department->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="form-group">
    <label>Development Manager</label>
    <select class="form-control" name="manager_id">
        <option value="">--</option>
        <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($manager->id); ?>" <?php if(old('manager_id', optional($project)->manager_id) == $manager->id): echo 'selected'; endif; ?>><?php echo e($manager->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="form-group">
    <label>Sales Owner</label>
    <select class="form-control" name="sales_owner_id">
        <option value="">--</option>
        <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($person->id); ?>" <?php if(old('sales_owner_id', optional($project)->sales_owner_id) == $person->id): echo 'selected'; endif; ?>><?php echo e($person->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="form-group">
    <label>Start Date</label>
    <input type="date" class="form-control" name="starts_at" value="<?php echo e(old('starts_at', optional($project)->starts_at?->format('Y-m-d'))); ?>">
</div>
<div class="form-group">
    <label>End Date</label>
    <input type="date" class="form-control" name="ends_at" value="<?php echo e(old('ends_at', optional($project)->ends_at?->format('Y-m-d'))); ?>">
</div>
<?php /**PATH D:\Projects\uptechcrm\resources\views/projects/partials/form.blade.php ENDPATH**/ ?>