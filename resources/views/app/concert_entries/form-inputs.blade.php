@php $editing = isset($concert_entry) @endphp

<div class="row"> 
    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $concert_entry->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.datetime
            name="entry_time"
            label="Entry Time"
            value="{{ old('entry_time', ($editing ? optional($concert_entry->entry_time)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.text
            name="verified_by"
            label="Verified By"
            value="{{ old('verified_by', ($editing ? $concert_entry->verified_by : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
