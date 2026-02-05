<?php

namespace App\Domain\Projects\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'client_name',
        'client_email',
        'requirements',
        'status',
        'sample_status',
        'department_id',
        'manager_id',
        'sales_owner_id',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'starts_at' => 'date',
        'ends_at' => 'date',
    ];

    public function tasks()
    {
        return $this->hasMany(\App\Domain\Tasks\Models\Task::class);
    }

    public function department()
    {
        return $this->belongsTo(\App\Domain\Departments\Models\Department::class);
    }

    public function manager()
    {
        return $this->belongsTo(\App\Domain\Users\Models\User::class, 'manager_id');
    }

    public function salesOwner()
    {
        return $this->belongsTo(\App\Domain\Users\Models\User::class, 'sales_owner_id');
    }
}
