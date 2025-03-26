<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\UserTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserTeamCollection;

class UserUserTeamsController extends Controller
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

        $userTeams = $user
            ->userTeams()
            ->search($search)
            ->latest()
            ->paginate();

        return new UserTeamCollection($userTeams);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @param \App\Models\UserTeam $userTeam
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, UserTeam $userTeam)
    {
        $this->authorize('update', $user);

        $user->userTeams()->syncWithoutDetaching([$userTeam->id]);

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @param \App\Models\UserTeam $userTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user, UserTeam $userTeam)
    {
        $this->authorize('update', $user);

        $user->userTeams()->detach($userTeam);

        return response()->noContent();
    }
}
