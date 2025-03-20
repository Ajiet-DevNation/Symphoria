<nav class="navbar pinned {{isset($varient)? $varient:'dark'}}" id="navbar">
  <div class="container">
    <div class="logo"> <a href="{{route('index')}}"> <img src="{{asset('frontend/images/logo2023.webp')}}" alt="Image"-> </a> </div>
    <div class="site-menu">
      <ul>
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{route('about')}}">About</a></li>
        <li><a href="{{route('all_events')}}">Events</a></li>
        {{-- <li><a href="{{route('sponsors')}}">Sponsors</a></li> --}}
        <li><a href="{{route('contact')}}">Contact</a></li>
      </ul>
    </div>
    <div class="search-button"> <img src="{{ asset('frontend/images/icon-search.svg')}}" alt="Image"> </div>
    @if (request()->is('register'))
      {{-- <a href="{{route('login')}}" class="navbar-button-logout">
        <img src="frontend/images/arrow-right-to-bracket-solid.png"  width="29px" height="30px">  
      </a> --}}
      <div class="navbar-button"> <a href="{{route('login')}}">
        <figure><img src="{{ asset('frontend/images/nav-bar-user.png')}}" alt="Image"></figure>
        Login </a> </div>
    @else
     @if (!Auth::guest())
          <a href="{{route('profile')}}" class="navbar-button-logout"> <img src="frontend/images/user-regular.png"  width="29px" height="30px"> </a>

    @else
      @if (request() -> is('login'))
      <div class="navbar-button"> <a href="{{route('register')}}">
        <figure><img src="{{ asset('frontend/images/icon-navbar-button.png')}}" alt="Image"></figure>
        Register now </a> </div>
    @else
    <div class="navbar-button"> <a href="{{route('login')}}">
      <figure><img src="{{ asset('frontend/images/nav-bar-user.png')}}" alt="Image"></figure>
      Login </a> </div>
    <div class="navbar-button"> <a href="{{route('register')}}">
      <figure><img src="{{ asset('frontend/images/icon-navbar-button.png')}}" alt="Image"></figure>
      Register Now </a> </div>
    @endif
    @endif
    @endif
    <div class="hamburger-menu">
      <button class="menu">
      <svg width="45" height="45" viewBox="0 0 100 100">
        <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
        <path class="line line2" d="M 20,50 H 80" />
        <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
      </svg>
      </button>
    </div>
    
  </div>
</nav>
