<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        $userEnrolledEvents = auth()->user()?->enrolledEvents->pluck('id')->toArray() ?? [];

        return view('events.index', compact('events', 'userEnrolledEvents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'happening_time' => 'required|date',
            'image' => 'nullable|image|max:2048', // Optional, up to 2MB
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/events');
            $validatedData['image'] = str_replace('public/', 'storage/', $imagePath);
        }

        // Create the event
        Event::create($validatedData);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event=Event::find($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event=Event::find($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'happening_time' => 'required|date',
            'image' => 'nullable|image|max:2048', // Optional, up to 2MB
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/events');
            $validatedData['image'] = str_replace('public/', 'storage/', $imagePath);
        }

        // Create the event
        Event::create($validatedData);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event=Event::find($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
    public function join(Request $request, Event $event)
    {
        #dd($event);
        $user = auth()->user();

        if ($user != null && !$user?->enrolledEvents->contains($event->id)) {
            $user->enrolledEvents()->attach($event->id);
        }else if ($user == null) {
            return view('auth.register');
        }

        return redirect()->route('events.index')->with('success', 'You have joined the event successfully!');
    }

}
