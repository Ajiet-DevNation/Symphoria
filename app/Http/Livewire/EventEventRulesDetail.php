<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use App\Models\EventRule;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EventEventRulesDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Event $event;
    public EventRule $eventRule;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New EventRule';

    protected $rules = [
        'eventRule.description' => ['nullable', 'string'],
    ];

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->resetEventRuleData();
    }

    public function resetEventRuleData()
    {
        $this->eventRule = new EventRule();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newEventRule()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.event_event_rules.new_title');
        $this->resetEventRuleData();

        $this->showModal();
    }

    public function editEventRule(EventRule $eventRule)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.event_event_rules.edit_title');
        $this->eventRule = $eventRule;

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal()
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal()
    {
        $this->showingModal = false;
    }

    public function save()
    {
        $this->validate();

        if (!$this->eventRule->event_id) {
            $this->authorize('create', EventRule::class);

            $this->eventRule->event_id = $this->event->id;
        } else {
            $this->authorize('update', $this->eventRule);
        }

        $this->eventRule->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', EventRule::class);

        EventRule::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetEventRuleData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->event->eventRules as $eventRule) {
            array_push($this->selected, $eventRule->id);
        }
    }

    public function render()
    {
        return view('livewire.event-event-rules-detail', [
            'eventRules' => $this->event->eventRules()->paginate(20),
        ]);
    }
}
