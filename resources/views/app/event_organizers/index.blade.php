@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\EventOrganizer::class)
                <a
                    href="{{ route('event-organizers.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.event_organizers.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.event_organizers.inputs.img')
                            </th>
                            <th class="text-left">
                                @lang('crud.event_organizers.inputs.phone')
                            </th>
                            <th class="text-left">
                                @lang('crud.event_organizers.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.event_organizers.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.event_organizers.inputs.position')
                            </th>
                            <th class="text-left">
                                @lang('crud.event_organizers.inputs.event_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($eventOrganizers as $eventOrganizer)
                        <tr>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $eventOrganizer->img ? \Storage::url($eventOrganizer->img) : '' }}"
                                />
                            </td>
                            <td>{{ $eventOrganizer->phone ?? '-' }}</td>
                            <td>{{ $eventOrganizer->email ?? '-' }}</td>
                            <td>{{ $eventOrganizer->name ?? '-' }}</td>
                            <td>{{ $eventOrganizer->position ?? '-' }}</td>
                            <td>
                                {{ optional($eventOrganizer->event)->name ?? '-'
                                }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $eventOrganizer)
                                    <a
                                        href="{{ route('event-organizers.edit', $eventOrganizer) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $eventOrganizer)
                                    <a
                                        href="{{ route('event-organizers.show', $eventOrganizer) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $eventOrganizer)
                                    <form
                                        action="{{ route('event-organizers.destroy', $eventOrganizer) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                {!! $eventOrganizers->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
