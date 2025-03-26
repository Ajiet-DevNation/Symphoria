@php $editing = isset($eventType) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="type"
            label="Type"
            value="{{ old('type', ($editing ? $eventType->type : '')) }}"
            maxlength="255"
            placeholder="Type"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
