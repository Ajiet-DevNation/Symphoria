@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('sponsers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.sponsers.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.sponsers.inputs.img')</h5>
                    <x-partials.thumbnail
                        src="{{ $sponser->img ? \Storage::url($sponser->img) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sponsers.inputs.site')</h5>
                    <span>{{ $sponser->site ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sponsers.inputs.name')</h5>
                    <span>{{ $sponser->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.sponsers.inputs.description')</h5>
                    <span>{{ $sponser->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('sponsers.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Sponser::class)
                <a href="{{ route('sponsers.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
