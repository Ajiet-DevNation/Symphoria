<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EventRegistration;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventRegistrationResource;
use App\Http\Resources\EventRegistrationCollection;
use App\Http\Requests\EventRegistrationStoreRequest;
use App\Http\Requests\EventRegistrationUpdateRequest;

class EventRegistrationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', EventRegistration::class);

        $search = $request->get('search', '');

        $eventRegistrations = EventRegistration::search($search)
            ->latest()
            ->paginate();

        return new EventRegistrationCollection($eventRegistrations);
    }

    /**
     * @param \App\Http\Requests\EventRegistrationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRegistrationStoreRequest $request)
    {
        $this->authorize('create', EventRegistration::class);

        $validated = $request->validated();

        $eventRegistration = EventRegistration::create($validated);

        return new EventRegistrationResource($eventRegistration);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventRegistration $eventRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EventRegistration $eventRegistration)
    {
        $this->authorize('view', $eventRegistration);

        return new EventRegistrationResource($eventRegistration);
    }

    /**
     * @param \App\Http\Requests\EventRegistrationUpdateRequest $request
     * @param \App\Models\EventRegistration $eventRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(
        EventRegistrationUpdateRequest $request,
        EventRegistration $eventRegistration
    ) {
        $this->authorize('update', $eventRegistration);

        $validated = $request->validated();

        $eventRegistration->update($validated);

        return new EventRegistrationResource($eventRegistration);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventRegistration $eventRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        EventRegistration $eventRegistration
    ) {
        $this->authorize('delete', $eventRegistration);

        $eventRegistration->delete();

        return response()->noContent();
    }
}
