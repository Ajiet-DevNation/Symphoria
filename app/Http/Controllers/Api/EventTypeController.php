<?php

namespace App\Http\Controllers\Api;

use App\Models\EventType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventTypeResource;
use App\Http\Resources\EventTypeCollection;
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
            ->paginate();

        return new EventTypeCollection($eventTypes);
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

        return new EventTypeResource($eventType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventType $eventType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EventType $eventType)
    {
        $this->authorize('view', $eventType);

        return new EventTypeResource($eventType);
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

        return new EventTypeResource($eventType);
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

        return response()->noContent();
    }
}
