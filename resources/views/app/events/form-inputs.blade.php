@php $editing = isset($event) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $event->img ? \Storage::url($event->img) : '' }}')"
        >
            <x-inputs.partials.label
                name="img"
                label="Img"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input type="file" name="img" id="img" @change="fileChosen" />
            </div>

            @error('img') @include('components.inputs.partials.error') @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $event->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="description" label="Description"
            >{{ old('description', ($editing ? $event->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.select name="event_type_id" label="Event Type" required>
            @php $selected = old('event_type_id', ($editing ? $event->event_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Event Type</option>
            @foreach($eventTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.datetime
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($event->date)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.text
            name="branch"
            label="Branch"
            value="{{ old('branch', ($editing ? $event->branch : '')) }}"
            maxlength="255"
            placeholder="Branch"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="is_registration"
            label="Is Registration"
            :checked="old('is_registration', ($editing ? $event->is_registration : 1))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.text
            name="location"
            label="Location"
            value="{{ old('location', ($editing ? $event->location : '')) }}"
            maxlength="255"
            placeholder="Location"
        ></x-inputs.text>
    </x-inputs.group>
</div>
