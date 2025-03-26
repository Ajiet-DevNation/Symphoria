@php $editing = isset($mainOrganizer) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $mainOrganizer->img ? \Storage::url($mainOrganizer->img) : '' }}')"
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

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $mainOrganizer->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.text
            name="position"
            label="Position"
            value="{{ old('position', ($editing ? $mainOrganizer->position : '')) }}"
            maxlength="255"
            placeholder="Position"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.text
            name="phone"
            label="Phone"
            value="{{ old('phone', ($editing ? $mainOrganizer->phone : '')) }}"
            maxlength="255"
            placeholder="Phone"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.text
            name="email"
            label="Email"
            value="{{ old('email', ($editing ? $mainOrganizer->email : '')) }}"
            maxlength="255"
            placeholder="Email"
        ></x-inputs.text>
    </x-inputs.group>
</div>
