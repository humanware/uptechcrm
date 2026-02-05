<div class="form-group">
    <label>Project Name</label>
    <input class="form-control" name="name" value="{{ old('name', optional($project)->name) }}" required>
</div>
<div class="form-group">
    <label>Client Name</label>
    <input class="form-control" name="client_name" value="{{ old('client_name', optional($project)->client_name) }}" required>
</div>
<div class="form-group">
    <label>Client Email</label>
    <input class="form-control" name="client_email" value="{{ old('client_email', optional($project)->client_email) }}">
</div>
<div class="form-group">
    <label>Requirements</label>
    <textarea class="form-control" name="requirements" required>{{ old('requirements', optional($project)->requirements) }}</textarea>
</div>
<div class="form-group">
    <label>Sample Status</label>
    <select class="form-control" name="sample_status" required>
        @foreach(['sample_in_review' => 'Sample in review', 'sample_approved' => 'Sample approved', 'sample_rejected' => 'Sample rejected'] as $value => $label)
            <option value="{{ $value }}" @selected(old('sample_status', optional($project)->sample_status) === $value)>{{ $label }}</option>
        @endforeach
    </select>
</div>
@if($project)
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status" required>
            @foreach(['sample' => 'Sample', 'development' => 'Development', 'completed' => 'Completed'] as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $project->status) === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>
@endif
<div class="form-group">
    <label>Department</label>
    <select class="form-control" name="department_id">
        <option value="">--</option>
        @foreach($departments as $department)
            <option value="{{ $department->id }}" @selected(old('department_id', optional($project)->department_id) == $department->id)>{{ $department->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Development Manager</label>
    <select class="form-control" name="manager_id">
        <option value="">--</option>
        @foreach($managers as $manager)
            <option value="{{ $manager->id }}" @selected(old('manager_id', optional($project)->manager_id) == $manager->id)>{{ $manager->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Sales Owner</label>
    <select class="form-control" name="sales_owner_id">
        <option value="">--</option>
        @foreach($sales as $person)
            <option value="{{ $person->id }}" @selected(old('sales_owner_id', optional($project)->sales_owner_id) == $person->id)>{{ $person->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Start Date</label>
    <input type="date" class="form-control" name="starts_at" value="{{ old('starts_at', optional($project)->starts_at?->format('Y-m-d')) }}">
</div>
<div class="form-group">
    <label>End Date</label>
    <input type="date" class="form-control" name="ends_at" value="{{ old('ends_at', optional($project)->ends_at?->format('Y-m-d')) }}">
</div>
