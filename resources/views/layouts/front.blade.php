<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#43a872" />
  <link rel="shortcut icon" href="frontend/images/favicon.ico" type="image/x-icon" />
  <title>Aakar | Auroras of Adventure</title>
  <meta name="title" content="Aakar | Auroras of Adventure">
  <meta name="description" content="A fusion of technical, cultural, literary and gaming events, it's a place to showcase your talents and have an learning and enriching experience.">
  <meta name="keywords" content="Aakar, aakar, Akaar, akaar, AJIET, ajiet, AJ, aj, AJ institute of engineering and technology, cultural, technical, fest, engineering, cs, is, ec, civil, mech, events, event">
  <meta name="robots" content="index,follow">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="language" content="English">
  <meta name="revisit-after" content="2 days">
  <meta name="author" content="AJIET DevNation">

  <link href="ico/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon" sizes="144x144">
  <link href="ico/apple-touch-icon-114-precomposed.png" rel="apple-touch-icon" sizes="114x114">
  <link href="ico/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon" sizes="72x72">
  <link href="ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon">
  <link href="ico/favicon.png" rel="shortcut icon">

  <link rel="stylesheet" href="{{asset('frontend/css/fontawesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/swiper.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/fancybox.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/style.css?v9')}}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
  <!-- Modal -->
  @isset($all_events)
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('add_events') }}" method="post">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <select name="events[]" class="form-select select-multiple-event" multiple="multiple" style="width: 100%">
                  @foreach ($all_events as $event)
                  @if ($event->eventType->type!="Mega Events"&&$event->eventType->type!="Gaming Events")
                  @if (!in_array($event->id, Auth::user()->eventRegistrations->pluck('event_id')->toArray()))
                  <option @if (old("events")){{ (in_array($event->id, old("events")) ? "selected":"") }}@endif value="{{$event->id}}">{{$event->name}}
                  </option>
                  @endif

                  @endif
                  @endforeach
                </select>
              </div>
              <div class="col-md-8 col-12"></div>
              <div class="col-md-4 col-4 mt-2">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  @endisset
  <div class="preloader">
    <div class="inner">
      <figure><img class="img-fluid" src="{{asset('frontend/images/logo2023.webp')}}" alt="Image"></figure>
      {{-- <figure><img class="img-fluid2" src="{{asset('frontend/images/transitonsponsor.webp')}}" width="25%" height="25%" alt="Image"></figure> --}}
      <div class="percentage" id="percentage">0</div>
    </div>
    <div class="loader-progress" id="loader-progress"> </div>
    <svg viewBox="0 0 1920 1080" preserveAspectRatio="none" version="1.1">
      <path d="M-4.5,1080H1920V0H0c-10.2,134.8,0.1,311.5,0,541C-0.1,769.5,0,948-4.5,1080z"></path>
    </svg>
  </div>
  <div class="page-transition">
    <svg viewBox="0 0 1920 1080" preserveAspectRatio="none" version="1.1">
      <path d="M540,1080H0V0h540c-40.28,124.78-85.13,311.48-85,541C455.13,769.53,499.81,955.48,540,1080z"></path>
    </svg>
  </div>
  <div class="smooth-scroll" style="overflow:hidden">
    <aside class="mobile-menu">
      <svg viewBox="0 0 600 1080" preserveAspectRatio="none" version="1.1">
        <path d="M540,1080H0V0h540c0,179.85,0,359.7,0,539.54C540,719.7,540,899.85,540,1080z"></path>
      </svg>
      <div class="inner">
        <div class="site-menu">
          <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('all_events')}}">Events</a></li>
            {{-- <li><a href="{{route('sponsors')}}">Sponsors</a></li> --}}
            <li><a href="{{route('contact')}}">Contact</a></li>
            <li>
              @if (!Auth::guest())
              <div class="m-2">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" style="border-radius:0.5rem;margin:0rem;padding-right:2rem;padding-left:2rem;padding-top:0.75rem;padding-bottom:0.75rem;"> <span class="text-white">Logout</span> </button>
                </form>
              </div>
              @else
              <a href="{{route('login')}}" class="btn btn-primary mt-2" style="background: #43a872;border:solid #43a872 1px;"> <span class="text-white">Login</span> </a>
              <a href="{{route('register')}}" class="btn btn-secondary mt-2" > <span class="text-white">Register</span> </a>
              @endif
            </li>
          </ul>
        </div>
      </div>
    </aside>
    <div class="search-box">
      <svg viewBox="0 0 1920 1080" preserveAspectRatio="none" version="1.1">
        <path d="M540,1080H0V0h540c-40.28,124.78-85.13,311.48-85,541C455.13,769.53,499.81,955.48,540,1080z"></path>
      </svg>
      <div class="container">
        <div class="form">
          <h6>SEARCH</h6>
          <form action="{{route('all_events')}}">
            <input type="text" placeholder="Type here to find events" name="search">
            <input type="submit" value="FIND EVENT">
          </form>
          <div class="close-btn"> <span></span> <span></span> </div>
        </div>
      </div>
    </div>
    @include('includes/navbar')
    <div class="section-wrapper" data-scroll-section>
      @yield('content')
      @include('includes/footer')
    </div>
  </div>
  <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/js/swiper.min.js')}}"></script>
  <script src="{{asset('frontend/js/fancybox.min.js')}}"></script>
  <script src="{{asset('frontend/js/isotope.min.js')}}"></script>
  <script src="{{asset('frontend/js/gsap.min.js')}}"></script>
  <script src="{{asset('frontend/js/locomotive-scroll.min.js')}}"></script>
  <script src="{{asset('frontend/js/ScrollTrigger.min.js')}}"></script>
  <script src="{{asset('frontend/js/scripts.js')}}"></script>
  <script src="{{asset('frontend/js/custom.js?v10')}}"></script>
  <script src="{{asset('frontend/js/closeMobileMenu.js?v4')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  {{-- tidio --}}
  <script src="//code.tidio.co/byzscpvhtcppdtihc0nmosmfksozmg8z.js" async></script>
  @yield('scripts')
</body>

</html>