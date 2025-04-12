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
                        <h2 class="passHome" style="color: #FFA500">Symphoria 2025 Catalogue</h2>
                    </div>
                    <!-- end section-title -->
                </div>
                <!-- end data-scroll -->
            </div>
            <!-- end col-12 -->
            {{-- <iframe src="https://flipbookpdf.net/web/site/20ae392eee4189c652073101cd906e44692d619b202303.pdf.html"
                frameborder="0" marginwidth="0" marginheight="0" scrolling="no"
                style="border:1px solid #CCC; margin-bottom:5px; max-width: 100%; overflow: hidden; width: 599px; height: 487px;"
                allowfullscreen></iframe> --}}
            {{-- <iframe allowfullscreen="allowfullscreen" class="fp-iframe"
                style="border: 1px solid lightgray; width: 80%; height:30rem ;"
                src="https://flipbookpdf.net/web/site/20ae392eee4189c652073101cd906e44692d619b202303.pdf.html"></iframe>
            --}}
            {{-- <iframe src="https://publuu.com/flip-book/96773/265557/page/2?embed" width="70%" height="600rem"
                frameborder="0" allowfullscreen="" class="publuuflip" scrolling="yes"></iframe> --}}

            {{-- <iframe src="https://publuu.com/flip-book/832404/1835020" width="70%" height="600rem" frameborder="0"
                allowfullscreen="" class="publuuflip" scrolling="yes"></iframe> --}}

            {{-- <iframe
                src="https://www.flipbookpdf.net/web/site/3c032a88acbf858332a96132115603cf18a2d5f7202503.pdf.html"
                width="900" height="637" frameborder="0" webkitAllowFullScreen mozallowfullscreen
                allowFullScreen></iframe> --}}
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
                        <h2 style="color: #FFA500">Welcome to Symphoria 2025!</h2>
                        <h4>Your Stage, Your Story!</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div data-scroll data-scroll-speed="0.5">
                    <div class="text-box">
                        <h3 style="color: #123052">Learn more about Symphoria-2025</h3>
                        <p style="font-weight:normal">
                            Happening for the very first time in history, Symphoria is a spectacular cultural
                            extravaganza that brings together the talented students of the seven sister colleges under
                            the Lakshmi Memorial Trust.

                            Get ready to be mesmerized by a dazzling display of music, dance, drama and fashion as our
                            students take to the stage to showcase their creativity, talent and passion.

                            Join us for two days of fun, entertainment and celebration of our cultural diversity, as we
                            unite to promote unity, creativity and self-expression. The fest is happening on April
                            25<sup>th</sup> and 26<sup>th</sup>,
                            2025, at the
                            prestigious A.J Institute Of Dental Sciences Auditorium.
                            <br><br>AJIDS Symphoria-2025 promises to be an extraordinary platform for students to
                            showcase their creativity and cultural talents. Participants will have the opportunity to
                            receive
                            constructive feedback from experts and an enthusiastic audience, inspiring them to
                            reach new heights in their pursuits. We look forward to your participation in this
                            exhilarating celebration of innovation and culture.
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
                        <h5 style="color: #123052">Learn more about A.J. Institute of Dental Sciences</h5>
                        <p style="font-weight:normal">
                            The health of the people is considered the blessing of the rich and the riches of the poor.
                            This is the foundation that supports the edifice of happiness and prosperity of a nation.

                            A.J. Institute of Dental Sciences is a brilliant, futuristic endeavor of the Laxmi Memorial
                            Education Trust (R); a premier educational organization, a brainchild of educationist &
                            philanthropist Dr. A.J. Shetty. We strive to provide a global perspective of dental
                            education to achieve the national objective of "HEALTH FOR ALL".

                            A.J. Institute Of Dental Sciences, Mangalore, fulfills its vision towards our students,
                            patients, and society through our state-of-the-art facilities and advanced technology in
                            providing oral health care.
                            </p>
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
                        <h6>Backbone of Symphoria</h6>
                        <h2>Student Organizers</h2>
                    </div>
                </div>
            </div>
            @foreach ($organizers as $organizer)
            <div class="col-lg-3 col-md-6">
                <div data-scroll data-scroll-speed="{{ $loop->even ? '0.5' : '-0.5' }}">
                    <div class="speaker">
                        <figure><img src="{{ $organizer->img ? Storage::disk('s3')->url($organizer->img) : '' }}" alt="Image">
                            <figcaption>
                                <ul>
                                    <li><a href="{{ 'mailto:' . $organizer->email }}"><i class="fab fa-google"></i></a>
                                    </li>
                                    <li><a href="{{ 'tel:+91 ' . $organizer->phone }}"><i class="fa fa-phone"></i></a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
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
{{-- <section class="content-section" style="padding-top: 0px">
    <span class="section-bg" data-background="images/section-bg06.png" data-scroll data-scroll-speed="2"></span>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div data-scroll data-scroll-speed="-0.5">
                    <div class="section-title text-center">
                        <h6>Tech Team of Symphoria</h6>
                        <h2>This Site is developed by</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div data-scroll data-scroll-speed="-0.5">
                    <div class="speaker">
                        <figure><img src="https://placehold.co/400" alt="Image">
                            <figcaption>
                                <ul>
                                    <li><a href="{{ 'mailto:' }}"><i class="fab fa-google"></i></a>
                                    </li>
                                    <li><a href="{{ 'tel:+91' }}"><i class="fa fa-phone"></i></a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
                        <div class="content-box">
                            <h4>Darshan</h4>
                            <small>Web Lead</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div data-scroll data-scroll-speed="0.5">
                    <div class="speaker">
                        <figure><img src="https://placehold.co/400" alt="Image">
                            <figcaption>
                                <ul>
                                    <li><a href="{{ 'mailto:' }}"><i class="fab fa-google"></i></a>
                                    </li>
                                    <li><a href="{{ 'tel:+91' }}"><i class="fa fa-phone"></i></a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
                        <div class="content-box">
                            <h4>Darshan</h4>
                            <small>Web Lead</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div data-scroll data-scroll-speed="-0.5">
                    <div class="speaker">
                        <figure><img src="https://placehold.co/400" alt="Image">
                            <figcaption>
                                <ul>
                                    <li><a href="{{ 'mailto:' }}"><i class="fab fa-google"></i></a>
                                    </li>
                                    <li><a href="{{ 'tel:+91' }}"><i class="fa fa-phone"></i></a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
                        <div class="content-box">
                            <h4>Darshan</h4>
                            <small>Web Lead</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div data-scroll data-scroll-speed="0.5">
                    <div class="speaker">
                        <figure><img src="https://placehold.co/400" alt="Image">
                            <figcaption>
                                <ul>
                                    <li><a href="{{ 'mailto:' }}"><i class="fab fa-google"></i></a>
                                    </li>
                                    <li><a href="{{ 'tel:+91' }}"><i class="fa fa-phone"></i></a>
                                    </li>
                                </ul>
                            </figcaption>
                        </figure>
                        <div class="content-box">
                            <h4>Darshan</h4>
                            <small>Web Lead</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- <section>
    <div class="row">
        <div class="col-12">
            <div data-scroll data-scroll-speed="-0.5">
                <div class="section-title text-center justify-content-center">
                    <h6>Tech Team of Symphoria</h6>
                    <h2>This Site is developed by</h2>
                    <img class="img-fluid" width="250" src="{{ asset('frontend/images/devnation.png') }}" alt=""
                        srcset="">
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection