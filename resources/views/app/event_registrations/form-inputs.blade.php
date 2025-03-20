@php $editing = isset($eventRegistration) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="event_id" label="Event" required>
            @php $selected = old('event_id', ($editing ? $eventRegistration->event_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Event</option>
            @foreach($events as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $eventRegistration->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
