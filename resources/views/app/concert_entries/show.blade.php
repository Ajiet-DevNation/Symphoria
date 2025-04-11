@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('concert-entries.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.concert_entries.show_title')
            </h4>

            <div class="mt-4 ">
                <div class="mb-4">
                    <h5>@lang('crud.concert_entries.inputs.user_id')</h5>
                    <span >{{ optional($concert_entry->user)->name ?? '-' }}</span>
                </div>
            </div>
            <div class="mt-4 ">
                <div class="mb-4">
                    <h5>@lang('crud.concert_entries.inputs.time')</h5>
                    <span>{{ $concert_entry->entry_time ? $concert_entry->entry_time->format('d M Y H:i:s') : '-' }}</span>
                </div>
            </div>
            <div class="mt-4 ">
                <div class="mb-4">
                    <h5>@lang('crud.concert_entries.inputs.verified_by')</h5>
                    <span>{{ $concert_entry->verified_by ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('concert-entries.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\ConcertEntry::class)
                <a
                    href="{{ route('concert-entries.create') }}"
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
