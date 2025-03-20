@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('events.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.events.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.img')</h5>
                    <x-partials.thumbnail
                        src="{{ $event->img ? \Storage::url($event->img) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.name')</h5>
                    <span>{{ $event->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.description')</h5>
                    <span>{{ $event->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.event_type_id')</h5>
                    <span>{{ optional($event->eventType)->id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.date')</h5>
                    <span>{{ $event->date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.branch')</h5>
                    <span>{{ $event->branch ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.is_registration')</h5>
                    <span>{{ $event->is_registration ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.events.inputs.location')</h5>
                    <span>{{ $event->location ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('events.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Event::class)
                <a href="{{ route('events.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
