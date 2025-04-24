@extends('layouts.front', [

])

@section('content')

<header class="{{ $headerClass=" video" }}">

  <!-- This div is  intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
  <div class="overlay "></div>
  <div class="overlay "></div>

  <!-- The HTML5 video element that will create the background video on the header -->
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" class="mt-4 mb-5 ">
    <source src="frontend/videos/mysore1.mp4" type="video/mp4">
  </video>

  <!-- The header content -->
  <div class="container h-100 mb-4">
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-100 text-white">
        {{-- <h1 class="display-3">Mysore Express</h1> --}}
        {{-- <img src="frontend/images/mysore_express_logo.png" width="400" alt=""> --}}
        <p class="lead mb-0" id="header-caption"></p>
      </div>
    </div>
  </div>
</header>

<section class="content-section" data-background="#F6FAFB">
  <span class="section-bg" data-background="{{ asset('frontend/images/section-bg011.png') }}" data-scroll
    data-scroll-speed="2"></span>
  <!-- end section-bg -->
  <div class="container">
    <div class="row justify-content-center g-0">
      <div class="col-12">
        <div data-scroll data-scroll-speed="0.5">
          <div class="section-title text-center">
            <h2 class="passHome text-dark">Get Your Pass</h2>
          </div>
          <!-- end section-title -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-12 -->

      <div class="col-xl-4 col-lg-6 col-md-6">
        <div data-scroll data-scroll-speed="-0.5">
          <div class="price-box">
            <h5>Event <br> PASS</h5>
            <div class="price"> <span class="currency">₹</span> <span class="value">2500</span></div>
            <!-- end price -->
            <ul>
              <li class="active"> <i class="far fa-check-circle"></i>Team Lead has to register </li>
              <li class="active"> <i class="far fa-check-circle"></i>Team of the Registered Team Lead can participate in
                the registered event only.</li>
              <li class="active"> <i class="far fa-check-circle"></i>1 Team per college </li>
              {{-- <li class="reg__info__description">Does not include a concert pass</li> --}}

            </ul>
            <a href="{{ route('register') }}" class="custom-button"> <span class="circle" aria-hidden="true"> <span
                  class="icon arrow"></span> </span> <span class="button-text">APPLY NOW</span></a>
          </div>
          <!-- end price-box -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-3 -->
      <!-- end col-3 -->
      <div class="col-xl-3 col-lg-6 col-md-6">
        <div data-scroll data-scroll-speed="0.5">
          <div class="price-box featured">
            <h5>Concert <br> PASS</h5>
            <div class="price"> <span class="currency">₹</span> <span class="value">150</span></div>
            <!-- end price -->
            <ul>
              <li class="active"> <i class="far fa-check-circle"></i> Registrants can only attend concert.
                <small></small>
              </li>
              <li class="fa-active">Registrants cannot participate in other Events</li>
              <li class="fa-active fa-circle-xmark">Individual Registeration for the concert</li>

            </ul>
            <a href="{{ route('register') }}" class="custom-button"> <span class="circle" aria-hidden="true"> <span
                  class="icon arrow"></span> </span> <span class="button-text">APPLY NOW</span></a>
          </div>
          <!-- end price-box -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-3 -->

      <!-- <div class="col-xl-3 col-lg-6 col-md-6">
        <div data-scroll data-scroll-speed="0.5">
          <div class="price-box featured">
            <h5>Premium <br> PASS</h5>
            <div class="price"> <span class="currency">₹</span> <span class="value">5500</span></div>
            {{-- <!-- end price --> --}}
      <ul>
        <li class="active"> <i class="far fa-check-circle"></i>Team Lead has to register </li>
        <li class="active"> <i class="far fa-check-circle"></i>Team of the Registered Team Lead can participate in the
          registered event only.</li>
        <li class="active"> <i class="far fa-check-circle"></i>Concert Pass is given to the 20 members of the team
          including team lead.</li>
        <li class="active"> <i class="far fa-check-circle"></i>1 Team per college </li>
        {{-- <li class="reg__info__description">Does not include a concert pass</li> --}}

      </ul>
      <a href="{{ route('register') }}" class="custom-button"> <span class="circle" aria-hidden="true"> <span
            class="icon arrow"></span> </span> <span class="button-text">APPLY NOW</span></a>
    </div>
    {{--
    <!-- end price-box --> --}}
  </div>
  {{--
  <!-- end data-scroll --> --}}
  </div> -->
  {{--
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div data-scroll data-scroll-speed="- 0.5">
      <div class="price-box featured">
        <h5>Concert <br> PASS</h5>
        <div class="price"> <span class="currency">₹</span> <span class="value">150</span></div>
        <!-- end price -->
        <ul>
          <li class="active"> <i class="far fa-check-circle"></i> Registrants can only attend concert.
          </li>
          <li class="fa-active"><i class="far fa-times-circle"></i> Registrants cannot participate in other Events</li>
          <li><i class="far fa-times-circle"></i> Individual Registeration for the concert</li>
        </ul>
        <a href="{{ route('register') }}" class="custom-button"> <span class="circle" aria-hidden="true"> <span
              class="icon arrow"></span> </span> <span class="button-text">APPLY NOW</span></a>
      </div>
      <!-- end price-box -->
    </div>
    <!-- end data-scroll -->
  </div>

  </div> --}}
  <!-- end row -->
  <!-- end container -->
</section>
<section class="content-section">
  <span class="section-bg" data-background="{{ asset('frontend/images/section-bg05backup.jpg') }}" data-scroll
    data-scroll-speed="1"></span>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div data-scroll data-scroll-speed="-0.5">
          <div class="side-content left">
            <h6>Symphoria 2025</h6>
            <h2>Your Stage, Your Story!</h2>
            <p style="font-weight:normal">Set your sights on the horizon and join us as A J Institute of
              Dental Sciences, Kuntikana, Mangaluru proudly presents the first edition of its
              Intercollegiate Cultural Fest, "Symphoria 2025", with an enthralling theme of
              "Your Stage, Your Story". Prepare for an extraordinary experience as we embark on this
              adventure on the 26<sup>th</sup> and 27<sup>th</sup> of April 2025, amidst the captivating
              backdrop of the A J Institute of Dental Sciences Campus.<br><br>
              The theme "YOUR STAGE, YOUR STORY" serves as the guiding beacon for A J Institute of Dental Sciences
              SYMPHORIA-2025,
              providing students with a platform to showcase their talents in a
              thrilling and adventurous environment. As participants, students will have the opportunity
              to receive constructive feedback from experts and a spirited audience, igniting
              their passion for adventure and inspiring them to push their limits further.
            </p>
            <a href="{{ route('all_events') }}" class="custom-button"> <span class="circle" aria-hidden="true"> <span
                  class="icon arrow"></span> </span> <span class="button-text">DISCOVER NOW</span></a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div data-scroll data-scroll-speed="0.5">
          <figure class="side-image"> <img src="{{ asset('frontend/images/side-image01.png') }}" alt="Image"> </figure>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- <section class="content-section no-top-spacing">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6">
        <div data-scroll data-scroll-speed="-0.5">
          <div class="counter-box">
            <figure><img src="{{ asset('frontend/images/icon-counter01.png') }}" alt="Image"></figure>
            <span class="odometer">25+</span>
            <h6>Events</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div data-scroll data-scroll-speed="0.5">
          <div class="counter-box">
            <figure><img src="{{ asset('frontend/images/icon-counter02.png') }}" alt="Image"></figure>
            <span class="odometer">20+</span>
            <h6>Sponsors</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div data-scroll data-scroll-speed="-1">
          <div class="counter-box">
            <figure><img src="{{ asset('frontend/images/icon-counter03.png') }}" alt="Image"></figure>
            <span class="odometer">1000+</span>
            <h6>Students<br>
              Participated</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}
{{-- Event Section of Home Page --}}
<section class="content-section" data-background="#F6FAFB">
  <span class="section-bg" data-background="{{asset('frontend/images/section-bg022.png')}}" data-scroll
    data-scroll-speed="2"></span>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div data-scroll data-scroll-speed="-0.5">
          <div class="section-title">
            <h6>SCHEDULE OF EVENT</h6>
            <h2>List of Events</h2>
          </div>
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-12 -->
      <div class="col-12">
        <div data-scroll data-scroll-speed="0.5">
          <div class="schedule-box">
            <div class="nav">
              <div data-bs-toggle="tab" data-bs-target="#tab-content01"> <span class="day">Prelims</span> <small
                  class="date">THURSDAY, APRIL 24</small>
                {{-- <small style="font-size:10px">Flash Mob</small> --}}
              </div>
              <!-- tab-nav -->
              <div class="active" data-bs-toggle="tab" data-bs-target="#tab-content02"> <span class="day">DAY 01</span>
                <small class="date">FRIDAY, APRIL 25</small>
              </div>
              <!-- tab-nav -->
              <div data-bs-toggle="tab" data-bs-target="#tab-content03"> <span class="day">DAY 02</span> <small
                  class="date">SATURDAY, APRIL 26</small> </div>
            </div>
            <!-- end nav -->
            <div class="tab-content">
              <div class="tab-pane fade" id="tab-content01">
                <div class="timeline">

                  <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">9:30AM</div>
                  <!-- end event-time -->
                  <div class="event-description">
                    <h5>Flash Mob<br />
                      <p></p>
                  </div>
                </div>
                <!-- end event-description -->
              </div>
              <div class="tab-pane fade show active" id="tab-content02">
                <div class="timeline">

                  <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">09:00 AM
                  </div>
                  <!-- end event-time -->
                  <div class="event-description">
                    <h5>Inaugration</h5>
                    <p></p>
                  </div>
                </div>
                <div class="timeline">

                  <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">10:30 AM
                  </div>
                  <!-- end event-time -->
                  <div class="event-description">
                    <h5>Dance</h5>
                    <p></p>
                  </div>
                </div>
                <div class="timeline">

                  <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">11:30 AM
                  </div>
                  <!-- end event-time -->
                  <div class="event-description">
                    <h5>The Dance Affair</h5>
                    <p></p>
                  </div>
                </div>
                <div class="timeline">

                  <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">02:00 PM
                  </div>
                  <!-- end event-time -->
                  <div class="event-description">
                    <h5>Soulful Sounds</h5>
                    <p></p>
                  </div>
                </div>
                <div class="timeline">

                  <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">06:00 PM
                  </div>
                  <!-- end event-time -->
                  <div class="event-description">
                    <h5>Runway Royale</h5>
                    <p></p>
                  </div>
                </div>
                <!-- end timeline -->

                {{-- <div class="timeline">
                  <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">1:30PM</div>
                  <!-- end event-time -->
                  <div class="event-description">
                    <h5>Paint me Pretty</h5>
                    <p></p>
                  </div>
                  <!-- end event-description -->
                </div> --}}
                <!-- end timeline -->
              </div>

              <!-- end tab-pane -->
              <div class="tab-pane fade " id="tab-content03">

                <div class="timeline">
                  <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">09:00 AM
                  </div>
                  <!-- end event-time -->
                  <div class="event-description">
                    <h5>The Entertainment Extravaganza</h5>
                    <p></p>
                  </div>
                  <!-- end event-description -->
                </div>
                <div class="timeline">
                  <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">12:00 PM
                  </div>
                  <!-- end event-time -->
                  <div class="event-description">
                    <h5>Validatory</h5>
                    <p></p>
                  </div>
                  <!-- end event-description -->
                </div>
                <!-- end event-description -->
              </div>

              <!-- end tab-pane -->
            </div>
            <!-- end tab-content -->
          </div>
          <!-- end schedule-box -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-12 -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</section>

<!-- end content-section -->
<section class="content-section left-white-bg" data-background="#FFA500">
  <span class="section-bg" data-background="{{ asset('frontend/images/section-bg033.png') }}" data-scroll
    data-scroll-speed="1">
    <div class="overlay"></div>
  </span>
  <!-- end section-bg -->
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div data-scroll data-scroll-speed="0.5">
          <img src="frontend/images/logo2025Full.png" style="height: 470px; width: auto">

          {{-- <video loop class="side-image" autoplay muted>
            <source src="frontend/images/celebrateAakar.mp4" type="video/mp4">
          </video> --}}
          <!-- end side-image -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-6 -->
      <div class="col-lg-6">
        <div data-scroll data-scroll-speed="-0.5">
          <div class="side-content right light">
            <h3 class="countdownHeading">Celebrate<br>Symphoria 2025 !!<br></h3>
            <p>Mark your calendars for the highly anticipated Symphoria 2025 Inter-Collegiate Cultural
              Fest, taking place on April 26th, 2025 and April 27th, 2025. Join us for two unforgettable
              days of culture and entertainment!
              <br><br>We eagerly anticipate your presence and look forward to meeting you soon!
            </p>
            <div class="countdown light right" id="js-countdown">
              <div class="countdown-item countdown-item">
                <div class="countdown__timer js-countdown-days"></div>
                <!-- end countdown__timer -->
                <span>Day</span>
              </div>
              <!-- end countdown-item -->
              <div class="countdown-item">
                <div class="countdown__timer js-countdown-hours"></div>
                <span>Hrs</span>
              </div>
              <!-- end countdown-item -->
              <div class="countdown-item">
                <div class="countdown__timer js-countdown-minutes"></div>
                <span>Min</span>
              </div>
              <!-- end countdown-item -->
              <div class="countdown-item">
                <div class="countdown__timer js-countdown-seconds"></div>
                <span>Sec</span>
              </div>
              <!-- end countdown-item -->
            </div>
            <!-- end countdown -->
            <a href="{{ route('all_events') }}" class="custom-button light"> <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span> </span> <span class="button-text">DISCOVER NOW</span></a>
          </div>
          <!-- end side-content -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-6 -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</section>
<section class="content-section no-bottom-spacing">
  <div class="section-bg" data-background="{{ asset('frontend/images/section-bg02.png') }}" data-scroll
    data-scroll-speed="1"></div>
  <!-- end section-bg -->
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-12">
        <div data-scroll data-scroll-speed="0.5">
          <div class="section-title text-center">
            {{-- <figure><img src="{{ asset('frontend/images/logo2025.png') }}" alt="Image"></figure> --}}
            <h6>SPONSORS AND PROMOTERS</h6>
            <h2>Our Sponsors</h2>
          </div>
          <!-- end section-title -->
        </div>
        <!-- end data-scroll -->
      </div>
      <div class="col-12"> <strong class="sponsor-title">Diamond sponsors</strong> </div>

      @foreach ($sponsors as $sponsor)
      @if ($sponsor->site == 'DIAMOND SPONSOR'  && $sponsor->img )
      <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="{{ $loop->even ? '0.5' : '-0.5' }}">
          <figure class="sponsor-logo"> <img src="{{ Storage::disk('s3')->url($sponsor->img) }}" alt="Image">
            <figcaption>{{ $sponsor->name }}</figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-2 -->
      @endif
      @endforeach

      
      <div class="clearfix spacing-50"></div>

      <!-- end col-12 -->
      <div class="col-12"> <strong class="sponsor-title">Gold Sponsors</strong> </div>
      <!-- end col-12 -->
      @foreach ($sponsors as $sponsor)
      @if ($sponsor->site == 'GOLD SPONSOR'  && $sponsor->img )
      <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="{{ $loop->even ? '0.5' : '-0.5' }}">
          <figure class="sponsor-logo"> <img src="{{ Storage::disk('s3')->url($sponsor->img) }}" alt="Image">
            <figcaption>{{ $sponsor->name }}</figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-2 -->
      @endif
      @endforeach
      <div class="clearfix spacing-50"></div>
      <!-- end clearfix -->
      <div class="col-12"> <strong class="sponsor-title">Silver sponsors</strong> </div>

      @foreach ($sponsors as $sponsor)
      @if ($sponsor->site == 'SILVER SPONSOR'  && $sponsor->img )
      <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="{{ $loop->even ? '0.5' : '-0.5' }}">
          <figure class="sponsor-logo"> <img src="{{ Storage::disk('s3')->url($sponsor->img) }}" alt="Image">
            <figcaption>{{ $sponsor->name }}</figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-2 -->
      @endif
      @endforeach
      <!-- end col-2 -->
     
      <!-- end clearfix -->
      <!-- end col-2 -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</section>
<section class="content-section">
  <div class="section-bg" data-background="{{asset('frontend/images/section-bg01-alt.png')}}" data-scroll
    data-scroll-speed="1"></div>
  <!-- end section-bg -->
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-12">
        <div data-scroll data-scroll-speed="0.5">
          <div class="section-title text-center">
            {{-- <figure><img src="images/title-shape.png" alt="Image"></figure> --}}
            {{-- <h6>Our Sister Institutions</h6> --}}
            <h2>Our Sister Institutions</h2>
          </div>
          <!-- end section-title -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-12 -->
      {{-- <div class="col-12"> <strong class="sponsor-title">Main sponsors</strong> </div> --}}
      <!-- end col-12 -->
      <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="-0.5">
          <figure class="sponsor-logo"> <img src="{{ asset('frontend/images/college/ajiet.png') }}" alt="Image">
            <figcaption><a href="https://www.ajiet.edu.in/" target="_blank">A J Institute of Engineering and
                Technology</a></figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-2 -->
      <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="0.5">
          <figure class="sponsor-logo"> <img src="{{ asset('frontend/images/college/1.png') }}" alt="Image">
            <figcaption><a href="https://lmcn.in/" target="_blank">Laxmi Memorial college of Nursing</a></figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-2 -->
      <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="-0.5">
          <figure class="sponsor-logo"> <img src="{{ asset('frontend/images/college/2.png') }}" alt="Image">
            <figcaption><a href="https://lmchm.in/" target="_blank">Laxmi Memorial college of Hotel Management</a>
            </figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-2 -->
      <div class="clearfix spacing-50"></div>
      <!-- end clearfix -->
      {{-- <div class="col-12"> <strong class="sponsor-title">Product sponsors</strong> </div> --}}
      <!-- end col-12 -->
      <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="0.5">
          <figure class="sponsor-logo"> <img src="{{ asset('frontend/images/college/3.png') }}" alt="Image">
            <figcaption><a href="https://ajimmangalore.ac.in/" target="_blank">A J Institute of Management (MSc)</a>
            </figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-2 -->
      <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="-0.5">
          <figure class="sponsor-logo"> <img src="{{ asset('frontend/images/college/4.png') }}" alt="Image">
            <figcaption><a href="https://ajimmangalore.ac.in/" target="_blank">A J Institute of Management </a>
            </figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-2 -->
      <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="0.5">
          <figure class="sponsor-logo"> <img src="{{ asset('frontend/images/college/5.png') }}" alt="Image">
            <figcaption><a href="https://ajids.edu.in/WebPages/index.aspx" target="_blank">A J Institute of Dental
                Sciences</a></figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-2 -->
      <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="-0.5">
          <figure class="sponsor-logo"> <img src="{{ asset('frontend/images/college/6.png') }}" alt="Image">
            <figcaption><a href="https://ajims.edu.in/Webpages/Index.aspx" target="_blank">A J Institute of Allied
                Health Science</a></figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-2 -->
      <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="0.5">
          <figure class="sponsor-logo"> <img src="{{ asset('frontend/images/college/7.png') }}" alt="Image">
            <figcaption><a href="https://ajims.edu.in/Webpages/Index.aspx" target="_blank">A J Institute of Management
                Medical Sciences</a></figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-2 -->
      <div class="clearfix"></div>
      <!-- end clearfix -->
      {{-- <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="-0.5">
          <figure class="sponsor-logo"> <img src="images/logo09.jpg" alt="Image">
            <figcaption><a href="#">Fleer de Leew</a></figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div> --}}
      <!-- end col-2 -->
      {{-- <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="0.5">
          <figure class="sponsor-logo"> <img src="images/logo10.jpg" alt="Image">
            <figcaption><a href="#">Armageddon</a></figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div>
      <!-- end col-2 -->
      <div class="col-lg-2 col-md-3 col-6">
        <div data-scroll data-scroll-speed="-0.5">
          <figure class="sponsor-logo"> <img src="images/logo11.jpg" alt="Image">
            <figcaption><a href="#">Georgia</a></figcaption>
          </figure>
          <!-- end sponsor-logo -->
        </div>
        <!-- end data-scroll -->
      </div> --}}
      <!-- end col-2 -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</section>
<!-- end content-section -->

@endsection
