<?php

namespace App\Http\Controllers\Api;

use App\Models\EventType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventCollection;

class EventTypeEventsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventType $eventType
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, EventType $eventType)
    {
        $this->authorize('view', $eventType);

        $search = $request->get('search', '');

        $events = $eventType
            ->events()
            ->search($search)
            ->latest()
            ->paginate();

        return new EventCollection($events);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventType $eventType
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, EventType $eventType)
    {
        $this->authorize('create', Event::class);

        $validated = $request->validate([
            'img' => ['image', 'max:1024'],
            'name' => ['required', 'max:255', 'string'],
            'description' => ['nullable', 'string'],
            'date' => ['required', 'date'],
            'branch' => ['nullable', 'max:255', 'string'],
            'is_registration' => ['required', 'boolean'],
            'location' => ['nullable', 'max:255', 'string'],
        ]);

        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('public');
        }

        $event = $eventType->events()->create($validated);

        return new EventResource($event);
    }
}
