<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventRuleResource;
use App\Http\Resources\EventRuleCollection;

class EventEventRulesController extends Controller
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

        $eventRules = $event
            ->eventRules()
            ->search($search)
            ->latest()
            ->paginate();

        return new EventRuleCollection($eventRules);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $this->authorize('create', EventRule::class);

        $validated = $request->validate([
            'description' => ['nullable', 'string'],
        ]);

        $eventRule = $event->eventRules()->create($validated);

        return new EventRuleResource($eventRule);
    }
}
