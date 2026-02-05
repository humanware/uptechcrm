<?php

namespace App\Domain\Leaves\Http\Controllers;

use App\Domain\Leaves\Models\LeaveRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index()
    {
        return view('leaves.index', [
            'leaves' => LeaveRequest::with(['user', 'approver'])->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('leaves.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'reason' => ['required', 'string'],
            'starts_at' => ['required', 'date'],
            'ends_at' => ['required', 'date', 'after_or_equal:starts_at'],
        ]);

        $overlap = LeaveRequest::where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'approved'])
            ->where(function ($query) use ($data) {
                $query->whereBetween('starts_at', [$data['starts_at'], $data['ends_at']])
                    ->orWhereBetween('ends_at', [$data['starts_at'], $data['ends_at']])
                    ->orWhere(function ($inner) use ($data) {
                        $inner->where('starts_at', '<=', $data['starts_at'])
                            ->where('ends_at', '>=', $data['ends_at']);
                    });
            })
            ->exists();

        if ($overlap) {
            return back()->withErrors(['starts_at' => 'Leave request overlaps with existing request.'])->withInput();
        }

        LeaveRequest::create([
            'user_id' => Auth::id(),
            'reason' => $data['reason'],
            'starts_at' => $data['starts_at'],
            'ends_at' => $data['ends_at'],
            'status' => 'pending',
        ]);

        return redirect()->route('leaves.index')->with('status', 'Leave requested.');
    }

    public function updateStatus(Request $request, LeaveRequest $leave)
    {
        $data = $request->validate([
            'status' => ['required', 'string'],
        ]);

        $leave->update([
            'status' => $data['status'],
            'approved_by_id' => Auth::id(),
        ]);

        return response()->json(['message' => 'Leave updated']);
    }
}
