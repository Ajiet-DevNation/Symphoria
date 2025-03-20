<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EventOrganizer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\EventOrganizerResource;
use App\Http\Resources\EventOrganizerCollection;
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
            ->paginate();

        return new EventOrganizerCollection($eventOrganizers);
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

        return new EventOrganizerResource($eventOrganizer);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventOrganizer $eventOrganizer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EventOrganizer $eventOrganizer)
    {
        $this->authorize('view', $eventOrganizer);

        return new EventOrganizerResource($eventOrganizer);
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

        return new EventOrganizerResource($eventOrganizer);
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

        return response()->noContent();
    }
}
