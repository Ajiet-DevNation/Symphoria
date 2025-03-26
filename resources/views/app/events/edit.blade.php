@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('events.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.events.edit_title')
            </h4>

            <x-form
                method="PUT"
                action="{{ route('events.update', $event) }}"
                has-files
                class="mt-4"
            >
                @include('app.events.form-inputs')

                <div class="mt-4">
                    <a href="{{ route('events.index') }}" class="btn btn-light">
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <a
                        href="{{ route('events.create') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-add text-primary"></i>
                        @lang('crud.common.create')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i>
                        @lang('crud.common.update')
                    </button>
                </div>
            </x-form>
        </div>
    </div>

    @can('view-any', App\Models\EventRule::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Event Rules</h4>

            <livewire:event-event-rules-detail :event="$event" />
        </div>
    </div>
    @endcan @can('view-any', App\Models\EventRegistration::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Event Registrations</h4>

            <livewire:event-event-registrations-detail :event="$event" />
        </div>
    </div>
    @endcan @can('view-any', App\Models\EventOrganizer::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Event Organizers</h4>

            <livewire:event-event-organizers-detail :event="$event" />
        </div>
    </div>
    @endcan
</div>
@endsection
