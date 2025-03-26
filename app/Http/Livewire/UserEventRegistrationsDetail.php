<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EventRegistration;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserEventRegistrationsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public User $user;
    public EventRegistration $eventRegistration;
    public $eventsForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New EventRegistration';

    protected $rules = [
        'eventRegistration.event_id' => ['required', 'exists:events,id'],
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->eventsForSelect = Event::pluck('name', 'id');
        $this->resetEventRegistrationData();
    }

    public function resetEventRegistrationData()
    {
        $this->eventRegistration = new EventRegistration();

        $this->eventRegistration->event_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newEventRegistration()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.user_event_registrations.new_title');
        $this->resetEventRegistrationData();

        $this->showModal();
    }

    public function editEventRegistration(EventRegistration $eventRegistration)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.user_event_registrations.edit_title');
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

        if (!$this->eventRegistration->user_id) {
            $this->authorize('create', EventRegistration::class);

            $this->eventRegistration->user_id = $this->user->id;
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

        foreach ($this->user->eventRegistrations as $eventRegistration) {
            array_push($this->selected, $eventRegistration->id);
        }
    }

    public function render()
    {
        return view('livewire.user-event-registrations-detail', [
            'eventRegistrations' => $this->user
                ->eventRegistrations()
                ->paginate(20),
        ]);
    }
}
