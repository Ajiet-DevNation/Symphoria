<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;
use App\Http\Requests\EventTypeStoreRequest;
use App\Http\Requests\EventTypeUpdateRequest;

class EventTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', EventType::class);

        $search = $request->get('search', '');

        $eventTypes = EventType::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.event_types.index', compact('eventTypes', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', EventType::class);

        return view('app.event_types.create');
    }

    /**
     * @param \App\Http\Requests\EventTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventTypeStoreRequest $request)
    {
        $this->authorize('create', EventType::class);

        $validated = $request->validated();

        $eventType = EventType::create($validated);

        return redirect()
            ->route('event-types.edit', $eventType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventType $eventType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EventType $eventType)
    {
        $this->authorize('view', $eventType);

        return view('app.event_types.show', compact('eventType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventType $eventType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, EventType $eventType)
    {
        $this->authorize('update', $eventType);

        return view('app.event_types.edit', compact('eventType'));
    }

    /**
     * @param \App\Http\Requests\EventTypeUpdateRequest $request
     * @param \App\Models\EventType $eventType
     * @return \Illuminate\Http\Response
     */
    public function update(
        EventTypeUpdateRequest $request,
        EventType $eventType
    ) {
        $this->authorize('update', $eventType);

        $validated = $request->validated();

        $eventType->update($validated);

        return redirect()
            ->route('event-types.edit', $eventType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventType $eventType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, EventType $eventType)
    {
        $this->authorize('delete', $eventType);

        $eventType->delete();

        return redirect()
            ->route('event-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
