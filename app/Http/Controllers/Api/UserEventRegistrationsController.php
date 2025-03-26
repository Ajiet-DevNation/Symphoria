<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventRegistrationResource;
use App\Http\Resources\EventRegistrationCollection;

class UserEventRegistrationsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $eventRegistrations = $user
            ->eventRegistrations()
            ->search($search)
            ->latest()
            ->paginate();

        return new EventRegistrationCollection($eventRegistrations);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', EventRegistration::class);

        $validated = $request->validate([]);

        $eventRegistration = $user->eventRegistrations()->create($validated);

        return new EventRegistrationResource($eventRegistration);
    }
}
