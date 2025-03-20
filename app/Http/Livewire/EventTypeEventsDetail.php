<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use App\Models\EventType;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EventTypeEventsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public EventType $eventType;
    public Event $event;
    public $eventDate;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Event';

    protected $rules = [
        'event.img' => ['nullable', 'max:255', 'string'],
        'event.name' => ['required', 'max:255', 'string'],
        'event.description' => ['nullable', 'max:255', 'string'],
        'event.branch' => ['nullable', 'max:255', 'string'],
        'eventDate' => ['required', 'date'],
        'event.is_registration' => ['required', 'boolean'],
        'event.location' => ['nullable', 'max:255', 'string'],
    ];

    public function mount(EventType $eventType)
    {
        $this->eventType = $eventType;
        $this->resetEventData();
    }

    public function resetEventData()
    {
        $this->event = new Event();

        $this->eventDate = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newEvent()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.event_type_events.new_title');
        $this->resetEventData();

        $this->showModal();
    }

    public function editEvent(Event $event)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.event_type_events.edit_title');
        $this->event = $event;

        $this->eventDate = $this->event->date->format('Y-m-d');

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

        if (!$this->event->event_type_id) {
            $this->authorize('create', Event::class);

            $this->event->event_type_id = $this->eventType->id;
        } else {
            $this->authorize('update', $this->event);
        }

        $this->event->date = \Carbon\Carbon::parse($this->eventDate);

        $this->event->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', Event::class);

        Event::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetEventData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->eventType->events as $event) {
            array_push($this->selected, $event->id);
        }
    }

    public function render()
    {
        return view('livewire.event-type-events-detail', [
            'events' => $this->eventType->events()->paginate(20),
        ]);
    }
}
