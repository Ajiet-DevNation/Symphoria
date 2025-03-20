<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserTeamResource;
use App\Http\Resources\UserTeamCollection;

class EventUserTeamsController extends Controller
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

        $userTeams = $event
            ->userTeams()
            ->search($search)
            ->latest()
            ->paginate();

        return new UserTeamCollection($userTeams);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $this->authorize('create', UserTeam::class);

        $validated = $request->validate([
            'team_name' => ['nullable', 'max:255', 'string'],
        ]);

        $userTeam = $event->userTeams()->create($validated);

        return new UserTeamResource($userTeam);
    }
}
