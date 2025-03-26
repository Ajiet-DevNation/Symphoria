@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('event-organizers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.event_organizers.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.event_organizers.inputs.img')</h5>
                    <x-partials.thumbnail
                        src="{{ $eventOrganizer->img ? \Storage::url($eventOrganizer->img) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.event_organizers.inputs.phone')</h5>
                    <span>{{ $eventOrganizer->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.event_organizers.inputs.email')</h5>
                    <span>{{ $eventOrganizer->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.event_organizers.inputs.name')</h5>
                    <span>{{ $eventOrganizer->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.event_organizers.inputs.position')</h5>
                    <span>{{ $eventOrganizer->position ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.event_organizers.inputs.event_id')</h5>
                    <span
                        >{{ optional($eventOrganizer->event)->name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('event-organizers.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\EventOrganizer::class)
                <a
                    href="{{ route('event-organizers.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
