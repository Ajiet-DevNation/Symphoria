<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;

class EventController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Event::class);

        $search = $request->get('search', '');

        $events = Event::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.events.index', compact('events', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Event::class);

        $eventTypes = EventType::pluck('type', 'id');

        return view('app.events.create', compact('eventTypes'));
    }

    /**
     * @param \App\Http\Requests\EventStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        $this->authorize('create', Event::class);

        $validated = $request->validated();
        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('public');
        }

        $event = Event::create($validated);

        return redirect()
            ->route('events.edit', $event)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Event $event)
    {
        $this->authorize('view', $event);

        return view('app.events.show', compact('event'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Event $event)
    {
        $this->authorize('update', $event);

        $eventTypes = EventType::pluck('type', 'id');

        return view('app.events.edit', compact('event', 'eventTypes'));
    }

    /**
     * @param \App\Http\Requests\EventUpdateRequest $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        $this->authorize('update', $event);

        $validated = $request->validated();
        if ($request->hasFile('img')) {
            if ($event->img) {
                Storage::delete($event->img);
            }

            $validated['img'] = $request->file('img')->store('public');
        }

        $event->update($validated);

        return redirect()
            ->route('events.edit', $event)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Event $event)
    {
        $this->authorize('delete', $event);

        if ($event->img) {
            Storage::delete($event->img);
        }

        $event->delete();

        return redirect()
            ->route('events.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
