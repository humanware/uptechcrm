

<?php $__env->startSection('title', 'Tickets'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-3">
    <a href="<?php echo e(route('tickets.create')); ?>" class="btn btn-primary">New Ticket</a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Project</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Assignee</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($ticket->title); ?></td>
                        <td><?php echo e(optional($ticket->project)->name); ?></td>
                        <td>
                            <select class="form-control js-ticket-status" data-id="<?php echo e($ticket->id); ?>">
                                <?php $__currentLoopData = ['open' => 'Open', 'in_progress' => 'In progress', 'resolved' => 'Resolved']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>" <?php if($ticket->status === $value): echo 'selected'; endif; ?>><?php echo e($label); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                        <td><?php echo e($ticket->priority); ?></td>
                        <td><?php echo e(optional($ticket->assignee)->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('tickets.show', $ticket)); ?>" class="btn btn-sm btn-info">View</a>
                            <a href="<?php echo e(route('tickets.edit', $ticket)); ?>" class="btn btn-sm btn-warning">Edit</a>
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
    $('.js-ticket-status').on('change', function () {
        $.ajax({
            url: `/api/tickets/${$(this).data('id')}/status`,
            method: 'PATCH',
            data: {status: $(this).val()},
            headers: {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Projects\uptechcrm\resources\views/tickets/index.blade.php ENDPATH**/ ?>