@extends('layouts.front')

@section('content')
    <header class="page-header" 
   >
        <div class="container">
            <div class="inner">
                <h6 style="color: white">PARTICIPATE IN EXCITING EVENTS</h6>
                <h2>Our Events</h2>
            </div>
        </div>
    </header>
    <section class="content-section events-section">
        <span class="section-bg" data-background="{{ asset('frontend/images/section-bg01.png') }}" data-scroll
            data-scroll-speed="2"></span>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="event-heading">Mega Events</h2>
                    <ul class="events-grid">
                        @foreach ($events as $event)
                            @if ($event->event_type_id == 8)
                                <li class="grid-item" data-scroll data-scroll-speed="-0.5">


                                    <div class="event-box m-4">

                                        {{-- <img src="{{$event->img ? Storage::url($event->img) : '' }}" alt="Image"/> --}}

                                        <div class="content-box">
                                            <span>{{$event->date->isoFormat('DD-MM-YYYY')}}</span>
                                            <h2>
                                                <a href="{{ route('event', ['id' => $event->id]) }}">{{ $event->name }}</a>
                                                {{-- {{ $event->name }} --}}
                                            </h2>
                                            <ul>
                                                <li>
                                                    <figure><img src="{{ asset('frontend/images/icon-time.svg') }}"
                                                            alt="Image"></figure>
                                                    <p>{{ $event->date->isoFormat('hh:mm a') }} </p>
                                                </li>
                                                @if ($event->location != null)
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/icon-host.svg') }}"
                                                                alt="Image" height="26"></figure>
                                                        <p>{{ $event->location }}<br>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                    <h2 class="event-heading">General Events</h2>
                    <ul class="events-grid">
                        @foreach ($events as $event)
                            @if ($event->event_type_id == 6)
                                <li class="grid-item" data-scroll data-scroll-speed="-0.5">


                                    <div class="event-box m-4">

                                        {{-- <img src="{{$event->img ? Storage::url($event->img) : '' }}" alt="Image"/> --}}

                                        <div class="content-box">
                                            <span>{{$event->date->isoFormat('DD-MM-YYYY')}}</span>
                                            <h2>
                                                <a href="{{ route('event', ['id' => $event->id]) }}">{{ $event->name }}</a>
                                                {{-- {{ $event->name }} --}}
                                            </h2>
                                            <ul>
                                                <li>
                                                    <figure><img src="{{ asset('frontend/images/icon-time.svg') }}"
                                                            alt="Image"></figure>
                                                    <p>{{ $event->date->isoFormat('hh:mm a') }} </p>
                                                </li>
                                                @if ($event->location != null)
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/icon-host.svg') }}"
                                                                alt="Image" height="26"></figure>
                                                        <p>{{ $event->location }}<br>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <h2 class="event-heading">Gaming Events</h2>
                    <ul class="events-grid">
                        @foreach ($events as $event)
                            @if ($event->event_type_id != 6 && $event->event_type_id != 8)
                                <li class="grid-item" data-scroll data-scroll-speed="-0.5">


                                    <div class="event-box m-4">

                                        {{-- <img src="{{$event->img ? Storage::url($event->img) : '' }}" alt="Image"/> --}}

                                        <div class="content-box">
                                            <span>{{$event->date->isoFormat('DD-MM-YYYY')}}</span>
                                            <h2>
                                                <a
                                                    href="{{ route('event', ['id' => $event->id]) }}">{{ $event->name }}</a>
                                                {{-- {{ $event->name }} --}}
                                            </h2>
                                            <ul>
                                                <li>
                                                    <figure><img src="{{ asset('frontend/images/icon-time.svg') }}"
                                                            alt="Image"></figure>
                                                    <p>{{ $event->date->isoFormat('hh:mm a') }} </p>
                                                </li>
                                                @if ($event->location != null)
                                                    <li>
                                                        <figure><img src="{{ asset('frontend/images/icon-host.svg') }}"
                                                                alt="Image" height="26"></figure>
                                                        <p>{{ $event->location }}<br>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
