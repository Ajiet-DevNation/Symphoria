<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', User::class);

        $search = $request->get('search', '');

        $users = User::search($search)
            ->latest()
            ->paginate();

        return new UserCollection($users);
    }

    /**
     * @param \App\Http\Requests\UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $this->authorize('create', User::class);

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('payment_screenshot')) {
            $validated['payment_screenshot'] = $request
                ->file('payment_screenshot')
                ->store('public');
        }

        if ($request->hasFile('id_card')) {
            $validated['id_card'] = $request->file('id_card')->store('public');
        }

        $user = User::create($validated);

        $user->syncRoles($request->roles);

        return new UserResource($user);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        $this->authorize('view', $user);

        return new UserResource($user);
    }

    /**
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validated();

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        if ($request->hasFile('payment_screenshot')) {
            if ($user->payment_screenshot) {
                Storage::delete($user->payment_screenshot);
            }

            $validated['payment_screenshot'] = $request
                ->file('payment_screenshot')
                ->store('public');
        }

        if ($request->hasFile('id_card')) {
            if ($user->id_card) {
                Storage::delete($user->id_card);
            }

            $validated['id_card'] = $request->file('id_card')->store('public');
        }

        $user->update($validated);

        $user->syncRoles($request->roles);

        return new UserResource($user);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $this->authorize('delete', $user);

        if ($user->payment_screenshot) {
            Storage::delete($user->payment_screenshot);
        }

        if ($user->id_card) {
            Storage::delete($user->id_card);
        }

        $user->delete();

        return response()->noContent();
    }
}
