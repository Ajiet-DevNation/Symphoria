<?php

namespace App\Http\Controllers;

use App\Models\ConcertEntry;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConcertController extends Controller
{
    public function store(Request $request, $id, $time, $verifedBy)
{
    $validated = Validator::make([
        'user_id' => $id,
        'entry_time' => $time,
        'verified_by' => $verifedBy,
    ], [
        'user_id' => ['required', 'exists:users,id'],
        'entry_time' => ['required', 'date'],
        'verified_by' => ['required', 'string', 'max:255'],
    ]);

    $this->authorize('create', ConcertEntry::class);

    $user = ConcertEntry::where('user_id', $id)->first();
    
    if ($user) {
        return redirect()->route('user_details', $id)->with('errors', 'Concert entry already marked.');
    }

    $concert = ConcertEntry::create($validated->validated());
    // dd($concert);

    return redirect()->route('user_details', $id)->with('success', 'Concert entry marked successfully.');
}
}
