@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
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
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->project->name }}</td>
                        <td>{{ $task->title }}</td>
                        <td>
                            <select class="form-control js-task-status" data-id="{{ $task->id }}">
                                @foreach(['in_progress' => 'In progress', 'in_review' => 'In review', 'changes_requested' => 'Changes requested', 'approved' => 'Approved'] as $value => $label)
                                    <option value="{{ $value }}" @selected($task->status === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>{{ optional($task->assignee)->name }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.js-task-status').on('change', function () {
        $.ajax({
            url: `/api/tasks/${$(this).data('id')}/status`,
            method: 'PATCH',
            data: {status: $(this).val()},
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        });
    });
</script>
@endpush
