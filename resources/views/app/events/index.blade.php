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
                @can('create', App\Models\Event::class)
                <a href="{{ route('events.create') }}" class="btn btn-primary">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.events.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.events.inputs.img')
                            </th>
                            <th class="text-left">
                                @lang('crud.events.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.events.inputs.description')
                            </th>
                            <th class="text-left">
                                @lang('crud.events.inputs.event_type_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.events.inputs.date')
                            </th>
                            <th class="text-left">
                                @lang('crud.events.inputs.branch')
                            </th>
                            <th class="text-left">
                                @lang('crud.events.inputs.is_registration')
                            </th>
                            <th class="text-left">
                                @lang('crud.events.inputs.location')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                        <tr>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $event->img ? \Storage::url($event->img) : '' }}"
                                />
                            </td>
                            <td>{{ $event->name ?? '-' }}</td>
                            <td>{{ $event->description ?? '-' }}</td>
                            <td>
                                {{ optional($event->eventType)->id ?? '-' }}
                            </td>
                            <td>{{ $event->date ?? '-' }}</td>
                            <td>{{ $event->branch ?? '-' }}</td>
                            <td>{{ $event->is_registration ?? '-' }}</td>
                            <td>{{ $event->location ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                <a
                                    href="{{route('exportSingleEvent',['id'=>$event->id])}}"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-light"
                                    >
                                    Export
                                        {{-- <i class="icon ion-md-eye"></i> --}}
                                    </button>
                                </a>
                                @can('update', $event)
                                    <a
                                        href="{{ route('events.edit', $event) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $event)
                                    <a
                                        href="{{ route('events.show', $event) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $event)
                                    <form
                                        action="{{ route('events.destroy', $event) }}"
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
                            <td colspan="9">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">{!! $events->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
