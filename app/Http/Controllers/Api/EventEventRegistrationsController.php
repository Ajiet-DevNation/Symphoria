<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventRegistrationResource;
use App\Http\Resources\EventRegistrationCollection;

class EventEventRegistrationsController extends Controller
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

        $eventRegistrations = $event
            ->eventRegistrations()
            ->search($search)
            ->latest()
            ->paginate();

        return new EventRegistrationCollection($eventRegistrations);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $this->authorize('create', EventRegistration::class);

        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $eventRegistration = $event->eventRegistrations()->create($validated);

        return new EventRegistrationResource($eventRegistration);
    }
}
