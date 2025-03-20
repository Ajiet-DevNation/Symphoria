<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventRegistration;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.event_registrations.index',
            compact('eventRegistrations', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', EventRegistration::class);

        $events = Event::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.event_registrations.create',
            compact('events', 'users')
        );
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

        return redirect()
            ->route('event-registrations.edit', $eventRegistration)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventRegistration $eventRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, EventRegistration $eventRegistration)
    {
        $this->authorize('view', $eventRegistration);

        return view(
            'app.event_registrations.show',
            compact('eventRegistration')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventRegistration $eventRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, EventRegistration $eventRegistration)
    {
        $this->authorize('update', $eventRegistration);

        $events = Event::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view(
            'app.event_registrations.edit',
            compact('eventRegistration', 'events', 'users')
        );
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

        return redirect()
            ->route('event-registrations.edit', $eventRegistration)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('event-registrations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
