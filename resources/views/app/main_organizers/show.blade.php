@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('main-organizers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.main_organizers.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.main_organizers.inputs.img')</h5>
                    <x-partials.thumbnail
                        src="{{ $mainOrganizer->img ? \Storage::url($mainOrganizer->img) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.main_organizers.inputs.name')</h5>
                    <span>{{ $mainOrganizer->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.main_organizers.inputs.position')</h5>
                    <span>{{ $mainOrganizer->position ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.main_organizers.inputs.phone')</h5>
                    <span>{{ $mainOrganizer->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.main_organizers.inputs.email')</h5>
                    <span>{{ $mainOrganizer->email ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('main-organizers.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\MainOrganizer::class)
                <a
                    href="{{ route('main-organizers.create') }}"
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
