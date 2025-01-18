<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use App\Models\Patient;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index()
    {
        $queues = Queue::with('patients')->get();
        return view('queues.index', compact('queues'));
    }

    public function create()
    {
        return view('queues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $queue = Queue::create($request->all());
        return redirect()->route('queues.index')->with('success', 'Queue created successfully.');
    }

    public function show($id)
    {
        $queue = Queue::with('patients')->findOrFail($id);
        return view('queues.show', compact('queue'));
    }

    public function addPatient(Request $request, $queueId)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
        ]);

        $queue = Queue::findOrFail($queueId);

        $queue->patients()->create(array_merge($request->all(), [
            'added_to_queue_at' => now(),
        ]));

        return redirect()->route('queues.show', $queueId)->with('success', 'Patient added to queue successfully.');
    }
}
