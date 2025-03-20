<div>
    <div class="mb-4">
        @can('create', App\Models\Event::class)
        <button class="btn btn-primary" wire:click="newEvent">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Event::class)
        <button
            class="btn btn-danger"
             {{ empty($selected) ? 'disabled' : '' }} 
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="icon ion-md-trash"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal id="event-type-events-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="event.img"
                            label="Img"
                            wire:model="event.img"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="event.name"
                            label="Name"
                            wire:model="event.name"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="event.description"
                            label="Description"
                            wire:model="event.description"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="event.branch"
                            label="Branch"
                            wire:model="event.branch"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.datetime
                            name="event.date"
                            label="Date"
                            wire:model="event.date"
                            max="255"
                        ></x-inputs.datetime>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.checkbox
                            name="event.is_registration"
                            label="Is Registration"
                            wire:model="event.is_registration"
                        ></x-inputs.checkbox>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="event.location"
                            label="Location"
                            wire:model="event.location"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>
                </div>
            </div>

            @if($editing) @endif

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th>
                        <input
                            type="checkbox"
                            wire:model="allSelected"
                            wire:click="toggleFullSelection"
                            title="{{ trans('crud.common.select_all') }}"
                        />
                    </th>
                    <th class="text-left">
                        @lang('crud.event_type_events.inputs.img')
                    </th>
                    <th class="text-left">
                        @lang('crud.event_type_events.inputs.name')
                    </th>
                    <th class="text-left">
                        @lang('crud.event_type_events.inputs.description')
                    </th>
                    <th class="text-left">
                        @lang('crud.event_type_events.inputs.branch')
                    </th>
                    <th class="text-left">
                        @lang('crud.event_type_events.inputs.date')
                    </th>
                    <th class="text-left">
                        @lang('crud.event_type_events.inputs.is_registration')
                    </th>
                    <th class="text-left">
                        @lang('crud.event_type_events.inputs.location')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($events as $event)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $event->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $event->img ?? '-' }}</td>
                    <td class="text-left">{{ $event->name ?? '-' }}</td>
                    <td class="text-left">{{ $event->description ?? '-' }}</td>
                    <td class="text-left">{{ $event->branch ?? '-' }}</td>
                    <td class="text-left">{{ $event->date ?? '-' }}</td>
                    <td class="text-left">
                        {{ $event->is_registration ?? '-' }}
                    </td>
                    <td class="text-left">{{ $event->location ?? '-' }}</td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $event)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editEvent({{ $event->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">{{ $events->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
