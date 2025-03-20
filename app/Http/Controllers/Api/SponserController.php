<?php

namespace App\Http\Controllers\Api;

use App\Models\Sponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SponserResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SponserCollection;
use App\Http\Requests\SponserStoreRequest;
use App\Http\Requests\SponserUpdateRequest;

class SponserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Sponser::class);

        $search = $request->get('search', '');

        $sponsers = Sponser::search($search)
            ->latest()
            ->paginate();

        return new SponserCollection($sponsers);
    }

    /**
     * @param \App\Http\Requests\SponserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SponserStoreRequest $request)
    {
        $this->authorize('create', Sponser::class);

        $validated = $request->validated();
        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('public');
        }

        $sponser = Sponser::create($validated);

        return new SponserResource($sponser);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sponser $sponser
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Sponser $sponser)
    {
        $this->authorize('view', $sponser);

        return new SponserResource($sponser);
    }

    /**
     * @param \App\Http\Requests\SponserUpdateRequest $request
     * @param \App\Models\Sponser $sponser
     * @return \Illuminate\Http\Response
     */
    public function update(SponserUpdateRequest $request, Sponser $sponser)
    {
        $this->authorize('update', $sponser);

        $validated = $request->validated();

        if ($request->hasFile('img')) {
            if ($sponser->img) {
                Storage::delete($sponser->img);
            }

            $validated['img'] = $request->file('img')->store('public');
        }

        $sponser->update($validated);

        return new SponserResource($sponser);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sponser $sponser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Sponser $sponser)
    {
        $this->authorize('delete', $sponser);

        if ($sponser->img) {
            Storage::delete($sponser->img);
        }

        $sponser->delete();

        return response()->noContent();
    }
}
