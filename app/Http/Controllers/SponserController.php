<?php

namespace App\Http\Controllers;

use App\Models\Sponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.sponsers.index', compact('sponsers', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Sponser::class);

        return view('app.sponsers.create');
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

        return redirect()
            ->route('sponsers.edit', $sponser)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sponser $sponser
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Sponser $sponser)
    {
        $this->authorize('view', $sponser);

        return view('app.sponsers.show', compact('sponser'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sponser $sponser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Sponser $sponser)
    {
        $this->authorize('update', $sponser);

        return view('app.sponsers.edit', compact('sponser'));
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

        return redirect()
            ->route('sponsers.edit', $sponser)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('sponsers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
