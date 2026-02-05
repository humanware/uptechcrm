<?php

namespace App\Domain\Tickets\Http\Controllers;

use App\Domain\Projects\Models\Project;
use App\Domain\Tickets\Models\Ticket;
use App\Domain\Users\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets.index', [
            'tickets' => Ticket::with(['project', 'requester', 'assignee'])->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('tickets.create', [
            'projects' => Project::all(),
            'users' => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => ['nullable', 'exists:projects,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'priority' => ['required', 'string'],
            'assigned_to_id' => ['nullable', 'exists:users,id'],
        ]);

        $data['requested_by_id'] = Auth::id();
        $data['status'] = 'open';

        Ticket::create($data);

        return redirect()->route('tickets.index')->with('status', 'Ticket created.');
    }

    public function show(Ticket $ticket)
    {
        $ticket->load(['project', 'requester', 'assignee']);

        return view('tickets.show', ['ticket' => $ticket]);
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', [
            'ticket' => $ticket,
            'projects' => Project::all(),
            'users' => User::all(),
        ]);
    }

    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'project_id' => ['nullable', 'exists:projects,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'priority' => ['required', 'string'],
            'status' => ['required', 'string'],
            'assigned_to_id' => ['nullable', 'exists:users,id'],
        ]);

        $ticket->update($data);

        return redirect()->route('tickets.show', $ticket)->with('status', 'Ticket updated.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')->with('status', 'Ticket deleted.');
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'status' => ['required', 'string'],
        ]);

        $ticket->update($data);

        return response()->json(['message' => 'Status updated']);
    }
}
