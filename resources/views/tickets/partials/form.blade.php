<div class="form-group">
    <label>Project</label>
    <select class="form-control" name="project_id">
        <option value="">--</option>
        @foreach($projects as $project)
            <option value="{{ $project->id }}" @selected(old('project_id', optional($ticket)->project_id) == $project->id)>{{ $project->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Title</label>
    <input class="form-control" name="title" value="{{ old('title', optional($ticket)->title) }}" required>
</div>
<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="description" required>{{ old('description', optional($ticket)->description) }}</textarea>
</div>
<div class="form-group">
    <label>Priority</label>
    <select class="form-control" name="priority">
        @foreach(['low' => 'Low', 'medium' => 'Medium', 'high' => 'High'] as $value => $label)
            <option value="{{ $value }}" @selected(old('priority', optional($ticket)->priority) === $value)>{{ $label }}</option>
        @endforeach
    </select>
</div>
@if($ticket)
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            @foreach(['open' => 'Open', 'in_progress' => 'In progress', 'resolved' => 'Resolved'] as $value => $label)
                <option value="{{ $value }}" @selected($ticket->status === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
@endif
<div class="form-group">
    <label>Assign To</label>
    <select class="form-control" name="assigned_to_id">
        <option value="">--</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" @selected(old('assigned_to_id', optional($ticket)->assigned_to_id) == $user->id)>{{ $user->name }}</option>
        @endforeach
    </select>
</div>
