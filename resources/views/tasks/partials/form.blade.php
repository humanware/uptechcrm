<div class="form-group">
    <label>Title</label>
    <input class="form-control" name="title" value="{{ old('title', optional($task)->title) }}" required>
</div>
<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="description">{{ old('description', optional($task)->description) }}</textarea>
</div>
@if($task)
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            @foreach(['in_progress' => 'In progress', 'in_review' => 'In review', 'changes_requested' => 'Changes requested', 'approved' => 'Approved'] as $value => $label)
                <option value="{{ $value }}" @selected($task->status === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
@endif
<div class="form-group">
    <label>Assignee</label>
    <select class="form-control" name="assignee_id">
        <option value="">--</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" @selected(old('assignee_id', optional($task)->assignee_id) == $user->id)>{{ $user->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Reviewer</label>
    <select class="form-control" name="reviewer_id">
        <option value="">--</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" @selected(old('reviewer_id', optional($task)->reviewer_id) == $user->id)>{{ $user->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Due Date</label>
    <input type="datetime-local" class="form-control" name="due_at" value="{{ old('due_at', optional($task)->due_at?->format('Y-m-d\TH:i')) }}">
</div>
