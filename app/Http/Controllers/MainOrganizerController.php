<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainOrganizer;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.main_organizers.index',
            compact('mainOrganizers', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', MainOrganizer::class);

        return view('app.main_organizers.create');
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

        return redirect()
            ->route('main-organizers.edit', $mainOrganizer)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MainOrganizer $mainOrganizer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MainOrganizer $mainOrganizer)
    {
        $this->authorize('view', $mainOrganizer);

        return view('app.main_organizers.show', compact('mainOrganizer'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MainOrganizer $mainOrganizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MainOrganizer $mainOrganizer)
    {
        $this->authorize('update', $mainOrganizer);

        return view('app.main_organizers.edit', compact('mainOrganizer'));
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

        return redirect()
            ->route('main-organizers.edit', $mainOrganizer)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('main-organizers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
