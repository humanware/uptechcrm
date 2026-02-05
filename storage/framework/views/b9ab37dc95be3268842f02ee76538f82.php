

<?php $__env->startSection('title', 'Leave Requests'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-3">
    <a href="<?php echo e(route('leaves.create')); ?>" class="btn btn-primary">Request Leave</a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Dates</th>
                    <th>Status</th>
                    <th>Reason</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($leave->user->name); ?></td>
                        <td><?php echo e($leave->starts_at->format('Y-m-d')); ?> - <?php echo e($leave->ends_at->format('Y-m-d')); ?></td>
                        <td>
                            <select class="form-control js-leave-status" data-id="<?php echo e($leave->id); ?>">
                                <?php $__currentLoopData = ['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>" <?php if($leave->status === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                        <td><?php echo e($leave->reason); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $('.js-leave-status').on('change', function () {
        $.ajax({
            url: `/api/leaves/${$(this).data('id')}/status`,
            method: 'PATCH',
            data: {status: $(this).val()},
            headers: {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\uptechcrm\resources\views/leaves/index.blade.php ENDPATH**/ ?>