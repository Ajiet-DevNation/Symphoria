@php $editing = isset($user) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $user->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.text
            name="email"
            label="Email"
            value="{{ old('email', ($editing ? $user->email : '')) }}"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.password
            name="password"
            label="Password"
            maxlength="255"
            placeholder="Password"
            :required="!$editing"
        ></x-inputs.password>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="phone"
            label="Phone"
            value="{{ old('phone', ($editing ? $user->phone : '')) }}"
            maxlength="255"
            placeholder="Phone"
        ></x-inputs.text>
    </x-inputs.group>

<x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.select name="pass_type" label="Pass Type" required>
            @php $selected = old('pass_type', ($editing ? $user->pass_type : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Pass Type</option>
            <option value="base" {{ $selected == "base" ? 'selected' : '' }} >Base Pass</option>
            <option value="premium" {{ $selected == "premium" ? 'selected' : '' }} >Premium Pass</option>
            <option value="mega" {{ $selected == "mega" ? 'selected' : '' }} >Mega Pass</option>
            <option value="AJIET" {{ $selected == "AJIET" ? 'selected' : '' }} >AJIET Pass</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="usn"
            label="Usn"
            value="{{ old('usn', ($editing ? $user->usn : '')) }}"
            maxlength="255"
            placeholder="Usn"
        ></x-inputs.text>
    </x-inputs.group>

    {{-- <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.text
            name="uid"
            label="UID"
            value="{{ old('uid', ($editing ? $user->uid : '')) }}"
            maxlength="255"
            placeholder="Uid"
        ></x-inputs.text>
    </x-inputs.group> --}}

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="transaction_id"
            label="Transaction Id"
            value="{{ old('transaction_id', ($editing ? $user->transaction_id : '')) }}"
            placeholder="Transaction Id"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.text
            name="college_name"
            label="College Name"
            value="{{ old('college_name', ($editing ? $user->college_name : '')) }}"
            maxlength="255"
            placeholder="College Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-4">
        <x-inputs.checkbox
            name="is_paid"
            label="Is Paid"
            :checked="old('is_paid', ($editing ? $user->is_paid : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.roles.name')</h4>

        @foreach ($roles as $role)
        <div>
            <x-inputs.checkbox
                id="role{{ $role->id }}"
                name="roles[]"
                label="{{ ucfirst($role->name) }}"
                value="{{ $role->id }}"
                :checked="isset($user) ? $user->hasRole($role) : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
</div>
