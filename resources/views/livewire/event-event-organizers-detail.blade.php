<div>
    <div class="mb-4">
        @can('create', App\Models\EventOrganizer::class)
        <button class="btn btn-primary" wire:click="newEventOrganizer">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\EventOrganizer::class)
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

    <x-modal id="event-event-organizers-modal" wire:model="showingModal">
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
                    <x-inputs.group class="col-sm-12 col-lg-4">
                        <x-inputs.textarea
                            name="eventOrganizer.email"
                            label="Email"
                            wire:model="eventOrganizer.email"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12 col-lg-4">
                        <x-inputs.textarea
                            name="eventOrganizer.name"
                            label="Name"
                            wire:model="eventOrganizer.name"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12 col-lg-4">
                        <x-inputs.textarea
                            name="eventOrganizer.position"
                            label="Position"
                            wire:model="eventOrganizer.position"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12 col-lg-4">
                        <x-inputs.textarea
                            name="eventOrganizer.phone"
                            label="Phone"
                            wire:model="eventOrganizer.phone"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <div
                            image-url="{{ $editing && $eventOrganizer->img ? \Storage::url($eventOrganizer->img) : '' }}"
                            x-data="imageViewer()"
                            @refresh.window="refreshUrl()"
                        >
                            <x-inputs.partials.label
                                name="eventOrganizerImg"
                                label="Img"
                            ></x-inputs.partials.label
                            ><br />

                            <!-- Show the image -->
                            <template x-if="imageUrl">
                                <img
                                    :src="imageUrl"
                                    class="
                                        object-cover
                                        rounded
                                        border border-gray-200
                                    "
                                    style="width: 100px; height: 100px;"
                                />
                            </template>

                            <!-- Show the gray box when image is not available -->
                            <template x-if="!imageUrl">
                                <div
                                    class="
                                        border
                                        rounded
                                        border-gray-200
                                        bg-gray-100
                                    "
                                    style="width: 100px; height: 100px;"
                                ></div>
                            </template>

                            <div class="mt-2">
                                <input
                                    type="file"
                                    name="eventOrganizerImg"
                                    id="eventOrganizerImg{{ $uploadIteration }}"
                                    wire:model="eventOrganizerImg"
                                    @change="fileChosen"
                                />
                            </div>

                            @error('eventOrganizerImg')
                            @include('components.inputs.partials.error')
                            @enderror
                        </div>
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
                        @lang('crud.event_event_organizers.inputs.email')
                    </th>
                    <th class="text-left">
                        @lang('crud.event_event_organizers.inputs.name')
                    </th>
                    <th class="text-left">
                        @lang('crud.event_event_organizers.inputs.position')
                    </th>
                    <th class="text-left">
                        @lang('crud.event_event_organizers.inputs.phone')
                    </th>
                    <th class="text-left">
                        @lang('crud.event_event_organizers.inputs.img')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($eventOrganizers as $eventOrganizer)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $eventOrganizer->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">
                        {{ $eventOrganizer->email ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $eventOrganizer->name ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $eventOrganizer->position ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $eventOrganizer->phone ?? '-' }}
                    </td>
                    <td class="text-left">
                        <x-partials.thumbnail
                            src="{{ $eventOrganizer->img ? \Storage::url($eventOrganizer->img) : '' }}"
                        />
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $eventOrganizer)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editEventOrganizer({{ $eventOrganizer->id }})"
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
                    <td colspan="6">{{ $eventOrganizers->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
