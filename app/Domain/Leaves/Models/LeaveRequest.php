<?php

namespace App\Domain\Leaves\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reason',
        'starts_at',
        'ends_at',
        'status',
        'approved_by_id',
    ];

    protected $casts = [
        'starts_at' => 'date',
        'ends_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Domain\Users\Models\User::class);
    }

    public function approver()
    {
        return $this->belongsTo(\App\Domain\Users\Models\User::class, 'approved_by_id');
    }
}
