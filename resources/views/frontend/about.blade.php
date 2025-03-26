@extends('layouts.front')

@section('content')
    <header class="page-header" {{-- data-background="{{asset('frontend/images/about.png')}}" --}}>
        <div class="container">
            <div class="inner">
                <h6>KNOW MORE</h6>
                <h2>About Us</h2>
            </div>
        </div>
    </header>
    <section class="content-section" data-background="#F6FAFB">
        <span class="section-bg" data-background="{{ asset('frontend/images/section-bg02.png') }}" data-scroll
            data-scroll-speed="2"></span>
        <!-- end section-bg -->
        <div class="container">
            <div class="row justify-content-center g-0">
                <div class="col-12">
                    <div data-scroll data-scroll-speed="0.5">
                        <div class="section-title text-center">
                            <h2 class="passHome" style="color: #43a872">Aakar 2023 Catalogue</h2>
                        </div>
                        <!-- end section-title -->
                    </div>
                    <!-- end data-scroll -->
                </div>
                <!-- end col-12 -->
                {{-- <iframe src="https://flipbookpdf.net/web/site/20ae392eee4189c652073101cd906e44692d619b202303.pdf.html" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; margin-bottom:5px; max-width: 100%; overflow: hidden; width: 599px; height: 487px;" allowfullscreen></iframe> --}}
                {{-- <iframe allowfullscreen="allowfullscreen" class="fp-iframe" style="border: 1px solid lightgray; width: 80%; height:30rem ;" src="https://flipbookpdf.net/web/site/20ae392eee4189c652073101cd906e44692d619b202303.pdf.html"></iframe> --}}
                <iframe src="https://publuu.com/flip-book/96773/265557/page/2?embed" width="70%" height="600rem"  frameborder="0" allowfullscreen="" class="publuuflip" scrolling="yes"></iframe>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <section class="content-section">
        <span class="section-bg" data-background="{{ asset('frontend/images/section-bg01.png') }}" data-scroll
            data-scroll-speed="2"></span>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div data-scroll data-scroll-speed="-0.5">
                        <div class="section-title text-center">
                            <h2 style="color: #43a872">Welcome to AAKAR 2023!</h2>
                            <h4>Auroras of Adventure!</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div data-scroll data-scroll-speed="0.5">
                        <div class="text-box">
                            <h3 style="color: #123052">Learn more about AAKAR-2023</h3>
                            <p style="font-weight:normal">
                                We are thrilled to announce the fifth edition of the Intercollegiate Techno-Cultural Fest
                                "AJIET AAKAR-2023", organized by A J Institute of Engineering & Technology. The fest is
                                scheduled to take place on March 24<sup>th</sup> and 25<sup>th</sup>, 2023, at the
                                prestigious AJIET Campus.
                                <br><br>AJIET AAKAR-2023 promises to be an extraordinary platform for students to showcase
                                their technical and cultural talents. Participants will have the opportunity to receive
                                constructive feedback from industry experts and an enthusiastic audience, inspiring them to
                                reach new heights in their pursuits. We look forward to your participation in this
                                exhilarating celebration of innovation and culture

                            </p>
                        </div>
                    </div>
                    <a href="{{ route('all_events') }}" class="custom-button"> <span class="circle" aria-hidden="true">
                            <span class="icon arrow"></span> </span> <span class="button-text">DISCOVER NOW</span></a>
                    <div class="spacing-20"></div>
                    <div data-scroll data-scroll-speed="0.5"></div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div data-scroll data-scroll-speed="1">
                        <div class="text-box">
                            <h5 style="color: #123052">Learn more about AJIET</h5>
                            <p style="font-weight:normal">A J Institute of Engineering & Technology, Mangaluru is approved
                                by AICTE and the Govt. of Karnataka.
                                The campus is located within the city limits on the National Highway NH-66 in the Mangalore
                                to Udupi Highway near Kottara Chowki.</p>
                        </div>
                    </div>
                    <div data-scroll data-scroll-speed="0.5"></div>
                </div>
            </div>
        </div>
    </section>

    @if (count($organizers))
        <section class="content-section" style="padding-top: 0px">
            <span class="section-bg" data-background="images/section-bg06.png" data-scroll data-scroll-speed="2"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div data-scroll data-scroll-speed="-0.5">
                            <div class="section-title text-center">
                                <h6>Backbone of AAKAR</h6>
                                <h2>Student Organizers</h2>
                            </div>
                        </div>
                    </div>
                    @foreach ($organizers as $organizer)
                        <div class="col-md-4 col-sm-6">
                            <div data-scroll data-scroll-speed="0.5">
                                <div class="speaker">
                                    {{-- <figure> <img src="{{ $organizer->img ? Storage::url($organizer->img) : '' }}"
                                            alt="Image">
                                        <figcaption>
                                            <ul>
                                                <li><a href="{{ 'mailto:' . $organizer->email }}"><i
                                                            class="fab fa-google"></i></a></li>
                                                <li><a href="{{ 'tel:+91 ' . $organizer->phone }}"><i
                                                            class="fa fa-phone"></i></a></li>
                                            </ul>
                                        </figcaption>
                                    </figure> --}}
                                    <div class="content-box">
                                        <h4>{{ $organizer->name }}</h4>
                                        <small>{{ $organizer->position }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <section>
        <div class="row">
            <div class="col-12">
                <div data-scroll data-scroll-speed="-0.5">
                    <div class="section-title text-center justify-content-center">
                        <h6>Tech Team of AAKAR</h6>
                        <h2>This Site is developed by</h2>
                        <img class="img-fluid" width="250" src="{{ asset('frontend/images/devnation.png') }}"
                            alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
