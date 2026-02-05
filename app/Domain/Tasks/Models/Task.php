<?php

namespace App\Domain\Tasks\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'status',
        'assignee_id',
        'reviewer_id',
        'due_at',
    ];

    protected $casts = [
        'due_at' => 'datetime',
    ];

    public function project()
    {
        return $this->belongsTo(\App\Domain\Projects\Models\Project::class);
    }

    public function assignee()
    {
        return $this->belongsTo(\App\Domain\Users\Models\User::class, 'assignee_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(\App\Domain\Users\Models\User::class, 'reviewer_id');
    }
}
