<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\EventOrganizer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EventEventOrganizersDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public Event $event;
    public EventOrganizer $eventOrganizer;
    public $eventOrganizerImg;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New EventOrganizer';

    protected $rules = [
        'eventOrganizer.email' => ['nullable', 'max:255', 'string'],
        'eventOrganizer.name' => ['required', 'max:255', 'string'],
        'eventOrganizer.position' => ['nullable', 'max:255', 'string'],
        'eventOrganizer.phone' => ['nullable', 'max:255', 'string'],
        'eventOrganizerImg' => ['image', 'max:1024'],
    ];

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->resetEventOrganizerData();
    }

    public function resetEventOrganizerData()
    {
        $this->eventOrganizer = new EventOrganizer();

        $this->eventOrganizerImg = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newEventOrganizer()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.event_event_organizers.new_title');
        $this->resetEventOrganizerData();

        $this->showModal();
    }

    public function editEventOrganizer(EventOrganizer $eventOrganizer)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.event_event_organizers.edit_title');
        $this->eventOrganizer = $eventOrganizer;

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

        if (!$this->eventOrganizer->event_id) {
            $this->authorize('create', EventOrganizer::class);

            $this->eventOrganizer->event_id = $this->event->id;
        } else {
            $this->authorize('update', $this->eventOrganizer);
        }

        if ($this->eventOrganizerImg) {
            $this->eventOrganizer->img = $this->eventOrganizerImg->store(
                'public'
            );
        }

        $this->eventOrganizer->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', EventOrganizer::class);

        collect($this->selected)->each(function (string $id) {
            $eventOrganizer = EventOrganizer::findOrFail($id);

            if ($eventOrganizer->img) {
                Storage::delete($eventOrganizer->img);
            }

            $eventOrganizer->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetEventOrganizerData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->event->eventOrganizers as $eventOrganizer) {
            array_push($this->selected, $eventOrganizer->id);
        }
    }

    public function render()
    {
        return view('livewire.event-event-organizers-detail', [
            'eventOrganizers' => $this->event->eventOrganizers()->paginate(20),
        ]);
    }
}
