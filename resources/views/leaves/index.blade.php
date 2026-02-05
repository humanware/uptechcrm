@extends('layouts.app')

@section('title', 'Leave Requests')

@section('content')
<div class="mb-3">
    <a href="{{ route('leaves.create') }}" class="btn btn-primary">Request Leave</a>
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
                @foreach($leaves as $leave)
                    <tr>
                        <td>{{ $leave->user->name }}</td>
                        <td>{{ $leave->starts_at->format('Y-m-d') }} - {{ $leave->ends_at->format('Y-m-d') }}</td>
                        <td>
                            <select class="form-control js-leave-status" data-id="{{ $leave->id }}">
                                @foreach(['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'] as $value => $label)
                                    <option value="{{ $value }}" @selected($leave->status === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>{{ $leave->reason }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.js-leave-status').on('change', function () {
        $.ajax({
            url: `/api/leaves/${$(this).data('id')}/status`,
            method: 'PATCH',
            data: {status: $(this).val()},
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        });
    });
</script>
@endpush
