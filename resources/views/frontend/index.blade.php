  @extends('layouts.front', [
    'varient' => 'transparent'
  ])

@section('content')

  <header class="{{ $headerClass="video" }}">

    <!-- This div is  intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
    <div class="overlay"></div>
  
    <!-- The HTML5 video element that will create the background video on the header -->
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
      <source src="frontend/videos/mysore1.mp4" type="video/mp4">
    </video>
  
    <!-- The header content -->
    <div class="container h-100">
      <div class="d-flex h-100 text-center align-items-center">
        <div class="w-100 text-white">
          {{-- <h1 class="display-3">Mysore Express</h1> --}}
          <img src="frontend/images/mysore_express_logo.png" width="400" alt="">
          <p class="lead mb-0" id="header-caption"></p>
        </div>
      </div>
    </div>
  </header>
  
    <section class="content-section"  data-background="#F6FAFB">
        <span class="section-bg" data-background="{{ asset('frontend/images/section-bg05.jpg') }}" data-scroll
            data-scroll-speed="2"></span>
        <!-- end section-bg -->
        <div class="container">
            <div class="row justify-content-center g-0">
                <div class="col-12">
                    <div data-scroll data-scroll-speed="0.5">
                        <div class="section-title text-center">
                            <h2 class="passHome">Get Your Pass</h2>
                        </div>
                        <!-- end section-title -->
                    </div>
                    <!-- end data-scroll -->
                </div>
                <!-- end col-12 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div data-scroll data-scroll-speed="-0.5">
                        <div class="price-box">
                            <h5>BASE <br> PASS</h5>
                            <div class="price"> <span class="currency">₹</span> <span class="value">150</span></div>
                            <!-- end price -->
                            <ul>
                              <li class="active"> <i class="far fa-check-circle"></i>Registrants can participate in any single event only.</li>
                              <li class="active"> <i class="far fa-check-circle"></i>Registrants can also register for mega events</li>
                              {{-- <li class="reg__info__description">Does not include a concert pass</li> --}}
                              
                            </ul>
                            <a href="{{ route('register') }}" class="custom-button"> <span class="circle"
                                    aria-hidden="true"> <span class="icon arrow"></span> </span> <span
                                    class="button-text">APPLY NOW</span></a>
                        </div>
                        <!-- end price-box -->
                    </div>
                    <!-- end data-scroll -->
                </div>
                <!-- end col-3 -->
                <!-- end col-3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div data-scroll data-scroll-speed="-0.5">
                        <div class="price-box featured">
                            <h5>MEGA <br> PASS</h5>
                            <!-- end price -->
                            <ul>
                                <li class="active"> <i class="far fa-check-circle"></i> Registrants can only participate in events that come under Mega Events.
                                    <small></small>
                                </li>
                                <li class="fa-light fa-circle-xmark">Registrants cannot participate in General Events</li>
                                <li class="reg__info__description">Payment for all  Mega Events/Gaming Events is on the spot.
                                    <small></small>
                                </li>
                                <li class="fa-light fa-circle-xmark"> </li>
                                
                            </ul>
                            <a href="{{ route('register') }}" class="custom-button"> <span class="circle"
                                    aria-hidden="true"> <span class="icon arrow"></span> </span> <span
                                    class="button-text">APPLY NOW</span></a>
                        </div>
                        <!-- end price-box -->
                    </div>
                    <!-- end data-scroll -->
                </div>
                <!-- end col-3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div data-scroll data-scroll-speed="-0.5">
                        <div class="price-box">
                            <h5>PREMIUM PASS</h5>
                            <div class="price"> <span class="currency">₹</span> <span class="value">300</span></div>
                            <!-- end price -->
                            <ul>
                              <li class="active"> <i class="far fa-check-circle"></i>Registrants can participate in upto 4 General Events</li>
                              <li class="active"> <i class="far fa-check-circle"></i>Registrants can also register for mega events</li>
                              {{-- <li class="reg__info__description">Does not include a concert pass</li> --}}
                              
                            </ul>
                            <a href="{{ route('register') }}" class="custom-button"> <span class="circle"
                                    aria-hidden="true"> <span class="icon arrow"></span> </span> <span
                                    class="button-text">APPLY NOW</span></a>
                        </div>
                        <!-- end price-box -->
                    </div>
                    <!-- end data-scroll -->
                </div>
                
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <section class="content-section">
        <span class="section-bg" data-background="{{ asset('frontend/images/section-bg01.png') }}" data-scroll
            data-scroll-speed="1"></span>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div data-scroll data-scroll-speed="-0.5">
                        <div class="side-content left">
                            <h6>AAKAR 2023</h6>
                            <h2>Auroras of Adventure!</h2>
                            <p style="font-weight:normal">Set your sights on the horizon and join us as A J Institute of
                                Engineering & Technology, Mangaluru proudly presents the fifth edition of its
                                Intercollegiate Techno-Cultural Fest, "AJIET AAKAR-2023", with an enthralling theme of
                                "Auroras of Adventure". Prepare for an extraordinary experience as we embark on this
                                adventure on the 24<sup>th</sup> and 25<sup>th</sup> of March 2023, amidst the captivating
                                backdrop of the AJIET Campus.<br><br>
                                The theme "Auroras of Adventure" serves as the guiding beacon for AJIET AAKAR-2023,
                                providing students with a platform to showcase their technical and cultural talents in a
                                thrilling and adventurous environment. As participants, students will have the opportunity
                                to receive constructive feedback from industry experts and a spirited audience, igniting
                                their passion for adventure and inspiring them to push their limits further.
                            </p>
                            <a href="{{ route('all_events') }}" class="custom-button"> <span class="circle"
                                    aria-hidden="true"> <span class="icon arrow"></span> </span> <span
                                    class="button-text">DISCOVER NOW</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div data-scroll data-scroll-speed="0.5">
                        <figure class="side-image"> <img src="{{ asset('frontend/images/side-image01.png') }}"
                                alt="Image"> </figure>
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
      <span class="section-bg" data-background="{{asset('frontend/images/section-bg02.png')}}" data-scroll data-scroll-speed="2"></span>

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
            <div data-bs-toggle="tab" data-bs-target="#tab-content01"> <span class="day">Prelims</span> <small class="date">THURSDAY, MARCH 23</small> <small style="font-size:10px">Gully Cricket, Slow and Furious</small></div>
            <!-- tab-nav -->
            <div class="active" data-bs-toggle="tab" data-bs-target="#tab-content02"> <span class="day">DAY 01</span> <small class="date">FRIDAY, MARCH 24</small> </div>
            <!-- tab-nav -->
            <div data-bs-toggle="tab" data-bs-target="#tab-content03"> <span class="day">DAY 02</span> <small class="date">SATURDAY, MARCH 25</small> </div>
          </div>
          <!-- end nav -->
          <div class="tab-content">
            <div class="tab-pane fade" id="tab-content01">
              <div class="timeline">

                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">9:30AM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5>Gully Cricket 2.0<br />
                    <p></p>
                </div>

                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">2:00PM</div>
                <!-- end event-time -->
                <div class="event-description">
                    <h5>Slow and Furious</h5>
                    <p></p>
                </div>
              </div>
              <!-- end event-description -->
            </div>
            <div class="tab-pane fade show active" id="tab-content02">
              <div class="timeline">

                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">10:30AM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5>Pitch and Perfect</h5>
                  <p></p>
                </div>
                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">11:00AM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5>Vaividhya<br/>Valorant<br/>Reel It Feel It<br/>Cine Short</h5>
                  <p></p>
                </div>

                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">11:30AM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5>Code War<br />Digital Dreams <br/> JAM </h5>
                  <p></p>
                </div>
                <!-- end event-description -->
              </div>
              <!-- end timeline -->

              <!-- end timeline -->
              <div class="timeline">
                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">12:00PM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5>Quick Survey <br/>Jumanji</h5>
                  <p></p>
                </div>
              </div>
              <div class="timeline">
                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">12:30PM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5> Spyder Web</h5>
                  <p></p>
                </div>
              </div>
             
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
              <div class="timeline">
                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">2:00PM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5>Gully Cricket 2.0 (Finals)<br />Circuitronics</h5>
                  <p></p>
                </div>
                <!-- end event-description -->
              </div>
              <!-- end timeline -->
              <div class="timeline">
                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">3:30PM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5>Swara Milana</h5>
                  <p></p>
                </div>
                <!-- end event-description -->
              </div>
            </div>

            <!-- end tab-pane -->
            <div class="tab-pane fade " id="tab-content03">
              <div class="timeline">
                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">9:00AM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5>Step Up<br>Trial By Trivia</h5>
                </div>
                <!-- end event-description -->
              </div>
              <div class="timeline">
                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">9:30AM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5>Times Up<br />Blind Coding<br/>Chromatic Shades</h5>
                  <p></p>
                </div>
                <!-- end event-description -->
              </div>
              <div class="timeline">
                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">10:00AM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5>  Need For Speed<br/>Paint Me Pretty<br/>Rapid Rhythms </h5>
                  <p></p>
                </div>
                <!-- end event-description -->
              </div>
              <div class="timeline">
                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">10:30AM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5> Master CAED <br/>Artistica</h5>
                  <p></p>
                </div>
                <!-- end event-description -->
              </div>
              <!-- end timeline -->
              <!-- end timeline -->
              <div class="timeline">
                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">11:00AM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5> Robo Soccer <br/> Moves and Grooves<br/>Masquerade <br/> Clash of Pens</h5>
                  <p></p>
                </div>
                <!-- end event-description -->
              </div>
              <div class="timeline">
                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">12:00PM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5> Diamond Rush </h5>
                  <p></p>
                </div>
                <!-- end event-description -->
              </div>
              
              <div class="timeline">
                <div class="event-time"><img src="{{asset('frontend/images/icon-time.png')}}" alt="Image">1:00PM</div>
                <!-- end event-time -->
                <div class="event-description">
                  <h5>Cine Short (Finals)</h5>
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
    <section class="content-section left-white-bg" data-background="#43a872">
        <span class="section-bg" data-background="{{ asset('frontend/images/section-bg03.png') }}" data-scroll
            data-scroll-speed="1"></span>
        <!-- end section-bg -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div data-scroll data-scroll-speed="0.5">
                        <img src="frontend/images/Aakar2023Logo.png">
                        
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
                            <h3 class="countdownHeading">Celebrate<br>Aakar 2023 !!<br></h3>
                            <p>Mark your calendars for the highly anticipated Aakar 2023 Inter-Collegiate Techno-Cultural
                                Fest, taking place on March 24th, 2023 and March 25th, 2023. Join us for two unforgettable
                                days of innovation, culture, and entertainment!
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
                            <a href="{{ route('all_events') }}" class="custom-button light"> <span class="circle"
                                    aria-hidden="true"> <span class="icon arrow"></span> </span> <span
                                    class="button-text">DISCOVER NOW</span></a>
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
 
@endsection
