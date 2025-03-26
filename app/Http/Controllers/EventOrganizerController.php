<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventOrganizer;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventOrganizerStoreRequest;
use App\Http\Requests\EventOrganizerUpdateRequest;

class EventOrganizerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', EventOrganizer::class);

        $search = $request->get('search', '');

        $eventOrganizers = EventOrganizer::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.event_organizers.index',
            compact('eventOrganizers', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', EventOrganizer::class);

        $events = Event::pluck('name', 'id');

        return view('app.event_organizers.create', compact('events'));
    }

    /**
     * @param \App\Http\Requests\EventOrganizerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventOrganizerStoreRequest $request)
    {
        $this->authorize('create', EventOrganizer::class);

        $validated = $request->validated();
        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('public');
        }

        $eventOrganizer = EventOrganizer::create($validated);

        return redirect()
            ->route('event-organizers.edit', $eventOrganizer)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventOrganizer $eventOrganizer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EventOrganizer $eventOrganizer)
    {
        $this->authorize('view', $eventOrganizer);

        return view('app.event_organizers.show', compact('eventOrganizer'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventOrganizer $eventOrganizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, EventOrganizer $eventOrganizer)
    {
        $this->authorize('update', $eventOrganizer);

        $events = Event::pluck('name', 'id');

        return view(
            'app.event_organizers.edit',
            compact('eventOrganizer', 'events')
        );
    }

    /**
     * @param \App\Http\Requests\EventOrganizerUpdateRequest $request
     * @param \App\Models\EventOrganizer $eventOrganizer
     * @return \Illuminate\Http\Response
     */
    public function update(
        EventOrganizerUpdateRequest $request,
        EventOrganizer $eventOrganizer
    ) {
        $this->authorize('update', $eventOrganizer);

        $validated = $request->validated();
        if ($request->hasFile('img')) {
            if ($eventOrganizer->img) {
                Storage::delete($eventOrganizer->img);
            }

            $validated['img'] = $request->file('img')->store('public');
        }

        $eventOrganizer->update($validated);

        return redirect()
            ->route('event-organizers.edit', $eventOrganizer)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventOrganizer $eventOrganizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, EventOrganizer $eventOrganizer)
    {
        $this->authorize('delete', $eventOrganizer);

        if ($eventOrganizer->img) {
            Storage::delete($eventOrganizer->img);
        }

        $eventOrganizer->delete();

        return redirect()
            ->route('event-organizers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
