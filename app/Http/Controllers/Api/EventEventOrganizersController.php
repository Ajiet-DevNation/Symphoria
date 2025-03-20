<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventOrganizerResource;
use App\Http\Resources\EventOrganizerCollection;

class EventEventOrganizersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Event $event)
    {
        $this->authorize('view', $event);

        $search = $request->get('search', '');

        $eventOrganizers = $event
            ->eventOrganizers()
            ->search($search)
            ->latest()
            ->paginate();

        return new EventOrganizerCollection($eventOrganizers);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $this->authorize('create', EventOrganizer::class);

        $validated = $request->validate([
            'email' => ['nullable', 'max:255', 'string'],
            'name' => ['required', 'max:255', 'string'],
            'position' => ['nullable', 'max:255', 'string'],
            'phone' => ['nullable', 'max:255', 'string'],
            'img' => ['image', 'max:1024'],
        ]);

        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('public');
        }

        $eventOrganizer = $event->eventOrganizers()->create($validated);

        return new EventOrganizerResource($eventOrganizer);
    }
}
