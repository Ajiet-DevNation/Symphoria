<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#FFA500" />
  <link rel="shortcut icon" href="frontend/images/favicon.ico" type="image/x-icon" />
  <title>@yield('title')</title>

  <meta name="title" content="Symphoria | Your Stage, Your Story">
  <meta name="description"
    content="Join us for Symphoria 2025, a grand cultural fest uniting the seven sister colleges under Lakshmi Memorial Trust. Enjoy music, dance, drama, and fashion at AJIDS Auditorium on April 25-26, 2025.">
  <meta name="keywords"
    content="Symphoria 2025, cultural fest, AJIDS, Lakshmi Memorial Trust, Mangalore fests, student events, college fest Mangalore, music dance drama fashion, April 2025 events, AJ Institute of Dental Sciences">
  <meta name="author" content="Darshan Bhandary">
  <meta name="copyright" content="Darshan Bhandary">

  @yield('meta')

  <meta name="robots" content="index,follow">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="language" content="English">
  <meta name="revisit-after" content="2 days">
  <meta name="author" content="Darshan Bhandary">

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
    {{-- @include('includes/navbar') --}}
    <div class="section-wrapper" data-scroll-section>
      @yield('content')
      {{-- @include('includes/footer') --}}
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