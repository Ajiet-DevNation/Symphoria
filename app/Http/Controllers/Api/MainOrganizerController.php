<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\MainOrganizer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\MainOrganizerResource;
use App\Http\Resources\MainOrganizerCollection;
use App\Http\Requests\MainOrganizerStoreRequest;
use App\Http\Requests\MainOrganizerUpdateRequest;

class MainOrganizerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', MainOrganizer::class);

        $search = $request->get('search', '');

        $mainOrganizers = MainOrganizer::search($search)
            ->latest()
            ->paginate();

        return new MainOrganizerCollection($mainOrganizers);
    }

    /**
     * @param \App\Http\Requests\MainOrganizerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainOrganizerStoreRequest $request)
    {
        $this->authorize('create', MainOrganizer::class);

        $validated = $request->validated();
        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('public');
        }

        $mainOrganizer = MainOrganizer::create($validated);

        return new MainOrganizerResource($mainOrganizer);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MainOrganizer $mainOrganizer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MainOrganizer $mainOrganizer)
    {
        $this->authorize('view', $mainOrganizer);

        return new MainOrganizerResource($mainOrganizer);
    }

    /**
     * @param \App\Http\Requests\MainOrganizerUpdateRequest $request
     * @param \App\Models\MainOrganizer $mainOrganizer
     * @return \Illuminate\Http\Response
     */
    public function update(
        MainOrganizerUpdateRequest $request,
        MainOrganizer $mainOrganizer
    ) {
        $this->authorize('update', $mainOrganizer);

        $validated = $request->validated();

        if ($request->hasFile('img')) {
            if ($mainOrganizer->img) {
                Storage::delete($mainOrganizer->img);
            }

            $validated['img'] = $request->file('img')->store('public');
        }

        $mainOrganizer->update($validated);

        return new MainOrganizerResource($mainOrganizer);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MainOrganizer $mainOrganizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MainOrganizer $mainOrganizer)
    {
        $this->authorize('delete', $mainOrganizer);

        if ($mainOrganizer->img) {
            Storage::delete($mainOrganizer->img);
        }

        $mainOrganizer->delete();

        return response()->noContent();
    }
}
