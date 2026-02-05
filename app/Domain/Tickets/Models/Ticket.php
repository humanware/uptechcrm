<?php

namespace App\Domain\Tickets\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'status',
        'priority',
        'requested_by_id',
        'assigned_to_id',
    ];

    public function project()
    {
        return $this->belongsTo(\App\Domain\Projects\Models\Project::class);
    }

    public function requester()
    {
        return $this->belongsTo(\App\Domain\Users\Models\User::class, 'requested_by_id');
    }

    public function assignee()
    {
        return $this->belongsTo(\App\Domain\Users\Models\User::class, 'assigned_to_id');
    }
}
