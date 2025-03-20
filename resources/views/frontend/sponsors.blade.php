@extends('layouts.front')

@section('content')
    <header class="page-header" data-background="{{ asset('frontend/images/sponsorCom.png') }}">
        <div class="container">
            <div class="inner">
                <h6>BIGGEST BRANDS WITH BIGGEST EVENTS</h6>
                <h2>Sponsors</h2>
            </div>
            <!-- end inner -->
        </div>
        <!-- end container -->
    </header>
    <section class="content-section">
        <span class="section-bg" data-background="{{ asset('frontend/images/section-bg01.png') }}" data-scroll
            data-scroll-speed="2"></span>
        <!-- end section-bg -->
        <div class="container">
            <div class="row align-items-center">
                @if ($sponsors != null)
                    @foreach ($sponsors as $sponsor)
                        @if ($sponsor->id % 2 == 0)
                            <div class="col-lg-6">
                                <div data-scroll data-scroll-speed="-0.5">
                                    <div class="side-content right">
                                        <h2>{{ $sponsor->name }}</h2>
                                        <p>{{ $sponsor->description }}</p>
                                        <a href={{ $sponsor->site }} class="btn btn-outline-primary">Click to know more</a>
                                    </div>
                                    <!-- end side-content -->
                                </div>
                                <!-- end data-scroll -->
                            </div>
                            <!-- end col-6 -->
                            <div class="col-lg-6">
                                <div data-scroll data-scroll-speed="0.5">
                                    <figure class="side-image"> <img
                                            src="{{ $sponsor->img ? Storage::url($sponsor->img) : '' }}" alt="Image">
                                    </figure>
                                </div>
                            </div>

                            <!-- end col-6 -->
                        @else
                            <div class="spacing-50"></div>
                            <div class="col-lg-6">
                                <div data-scroll data-scroll-speed="0.5">
                                    <figure class="side-image"> <img
                                            src="{{ $sponsor->img ? Storage::url($sponsor->img) : '' }}" alt="Image">
                                    </figure>
                                </div>
                                <!-- end data-scroll -->
                            </div>
                            <!-- end col-6 -->
                            <div class="col-lg-6">
                                <div data-scroll data-scroll-speed="-0.5">
                                    <div class="side-content right">
                                        <h2>{{ $sponsor->name }}</h2>
                                        <p>{{ $sponsor->description }}</p>
                                        <a class="btn btn-outline-primary" href={{ $sponsor->site }}>Click to know more</a>
                                    </div>
                                    <!-- end side-content -->
                                </div>
                                <!-- end data-scroll -->
                            </div>
                            <!-- end col-6 -->
                        @endif
                    @endforeach
                @endif
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
@endsection
