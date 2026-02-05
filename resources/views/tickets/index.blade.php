@extends('layouts.app')

@section('title', 'Tickets')

@section('content')
<div class="mb-3">
    <a href="{{ route('tickets.create') }}" class="btn btn-primary">New Ticket</a>
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
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->title }}</td>
                        <td>{{ optional($ticket->project)->name }}</td>
                        <td>
                            <select class="form-control js-ticket-status" data-id="{{ $ticket->id }}">
                                @foreach(['open' => 'Open', 'in_progress' => 'In progress', 'resolved' => 'Resolved'] as $value => $label)
                                    <option value="{{ $value }}" @selected($ticket->status === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>{{ $ticket->priority }}</td>
                        <td>{{ optional($ticket->assignee)->name }}</td>
                        <td>
                            <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-sm btn-warning">Edit</a>
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
    $('.js-ticket-status').on('change', function () {
        $.ajax({
            url: `/api/tickets/${$(this).data('id')}/status`,
            method: 'PATCH',
            data: {status: $(this).val()},
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        });
    });
</script>
@endpush
