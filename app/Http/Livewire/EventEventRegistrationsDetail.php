<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EventRegistration;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EventEventRegistrationsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Event $event;
    public EventRegistration $eventRegistration;
    public $usersForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New EventRegistration';

    protected $rules = [
        'eventRegistration.user_id' => ['required', 'exists:users,id'],
    ];

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->usersForSelect = User::pluck('name', 'id');
        $this->resetEventRegistrationData();
    }

    public function resetEventRegistrationData()
    {
        $this->eventRegistration = new EventRegistration();

        $this->eventRegistration->user_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newEventRegistration()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.event_event_registrations.new_title');
        $this->resetEventRegistrationData();

        $this->showModal();
    }

    public function editEventRegistration(EventRegistration $eventRegistration)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.event_event_registrations.edit_title');
        $this->eventRegistration = $eventRegistration;

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

        if (!$this->eventRegistration->event_id) {
            $this->authorize('create', EventRegistration::class);

            $this->eventRegistration->event_id = $this->event->id;
        } else {
            $this->authorize('update', $this->eventRegistration);
        }

        $this->eventRegistration->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', EventRegistration::class);

        EventRegistration::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetEventRegistrationData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->event->eventRegistrations as $eventRegistration) {
            array_push($this->selected, $eventRegistration->id);
        }
    }

    public function render()
    {
        return view('livewire.event-event-registrations-detail', [
            'eventRegistrations' => $this->event
                ->eventRegistrations()
                ->paginate(20),
        ]);
    }
}
