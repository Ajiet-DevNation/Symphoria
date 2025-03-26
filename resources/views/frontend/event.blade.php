@extends('layouts.front')

@section('content')
    <header class="page-header" data-background="{{ asset('frontend/images/event.png') }}">
        <div class="container">
            <div class="inner">
                <h6>PARTICIPATE IN</h6>
                <h2>{{ $event->name }}</h2>
            </div>
        </div>
    </header>
    <section class="content-section">
        <span class="section-bg" 
        data-background="{{ asset('frontend/images/section-bg06.png') }}" data-scroll
            data-scroll-speed="2"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div data-scroll data-scroll-speed="0.5">
                        <figure class="image-box justify-content-center"> <img
                                src="{{ $event->img ? Storage::url($event->img) : '' }}" alt="Image" /> </figure>
                    </div>
                </div>
                <div class="col-xl-10">
                    <div data-scroll data-scroll-speed="-0.5">
                        <div class="event-detail-box">
                            <small>{{ $event->date->isoFormat('DD-MM-YYYY') }}</small>
                            <h3>{{ $event->name }}</h3>
                            <ul class="infos">
                                <li>
                                    <figure><img src="{{ asset('frontend/images/icon-time.png') }}" alt="Image"></figure>
                                    {{ $event->date->isoFormat('hh:mm a') }}<br>
                                </li>
                                @if ($event->location != null)
                                    <li>
                                        <figure><img src="{{ asset('frontend/images/icon-host.svg') }}" alt="Image"
                                                height="26"></figure>{{ $event->location }}
                                    </li>
                                @endif
                                @if ($event->is_registration)
                                    <li> <a href="{{ route('register') }}" class="custom-button"> <span class="circle"
                                                aria-hidden="true"> <span class="icon arrow"></span> </span> <span
                                                class="button-text">Register Now</span></a> </li>
                                @endif
                            </ul>
                            <h5><strong>Description</strong> </h5>
                            <p> {{ $event->description }}</p>
                            <h5><strong>Rules</strong> </h5>
                            <ul>
                                @if ($eventRule != null)
                                    @foreach ($eventRule as $item)
                                        <li>{{ $item->description }}</li>
                                    @endforeach
                                @endif
                            </ul>
                            {{-- <h5 class="mt-4"><strong>Organizers</strong> </h5>

                            @foreach ($event->eventOrganizers as $item)
                                <div class="col-md-6 col-12 mt-2">
                                    <p>Name: {{ $item->name }}
                                        @if ($item->email)
                                            <br><span>Email: {{ $item->email }}</span>
                                        @endif
                                        @if ($item->phone)
                                            <br> <span>Phone: {{ $item->phone }}</span>
                                        @endif
                                    </p>
                                </div>
                            @endforeach --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
