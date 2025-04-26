<?php

namespace App\Http\Controllers;

use App\Models\ConcertEntry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConcertEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', ConcertEntry::class);

        $search = $request->get('search', '');

        $concert_entries = ConcertEntry::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.concert_entries.index', compact('concert_entries', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', ConcertEntry::class);

        $users = User::pluck('name', 'id');

        return view('app.concert_entries.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id', 'unique:concert_entries,user_id'],
            'entry_time' => ['required', 'date'],
            'verified_by' => ['required', 'string', 'max:255'],
        ]);
        
        $this->authorize('create', ConcertEntry::class);

        $user = ConcertEntry::where('user_id', $request->user_id)->first();

        $concert = ConcertEntry::create($validated->validated());

        // dd($concert);

        return redirect()
            ->route('concert-entries.edit', $concert)
            ->withSuccess(__('crud.common.created'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ConcertEntry $concert_entry)
    {
        $this->authorize('view', $concert_entry);

        return view('app.concert_entries.show', compact('concert_entry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ConcertEntry $concert_entry)
    {
        $this->authorize('update', $concert_entry);

        $users = User::pluck('name', 'id');

        return view('app.concert_entries.edit',compact('concert_entry', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConcertEntry $concert_entry)
    {
        $validated = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id',  'unique:concert_entries,user_id'],
            'entry_time' => ['required', 'date'],
            'verified_by' => ['required', 'string', 'max:255'],
        ]);

        $this->authorize('update', $concert_entry);
        $concert_entry->update($validated->validated());

        return redirect()
            ->route('concert-entries.edit', $concert_entry)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ConcertEntry $concert_entry)
    {
        $this->authorize('delete', $concert_entry);

        $concert_entry->delete();

        return redirect()
            ->route('concert-entries.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
