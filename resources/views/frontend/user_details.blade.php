@extends('layouts.front')

@section('meta')
<meta name="description" content="User Profile">
<meta name="keywords" content="User, Profile, SYMPHORIA-2025, AJ Institute of Dental Sciences">
<meta name="author" content="Darshan Bhandary">
<meta name="copyright" content="Darshan Bhandary">
<meta name="robots" content="index,follow">

@endsection

@php
use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp
@section('content')

<section style="background-color: #eee; mt-4">
    <div class="container p-5 mt-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> --}}
{{-- <button type="button" class="btn btn-primary">
    Launch demo modal
  </button> --}}
  @if (session('errors'))
  <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
    <strong>Failed !! </strong> {{ session('errors') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    <strong>Success !! </strong>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
@if (Auth::user()->isSuperAdmin() && !$user->concertEntry()->where('user_id', $user->id)->exists() && ($user->pass_type == 'concert' || $user->premium_pass_concert == 1))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            const myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            myModal.show();
        }, 2000); 
    });
</script>
@endif
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Concert Entry</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          By clicking confirm, you are verifying the concert entry for <strong>{{ $user->name }}</strong> at {{ now()->setTimezone('Asia/Kolkata')->format('d-m-Y h:i:s A') }} IST. <br>
          <strong>Verified By:</strong> {{ Auth::user()->name }} <br>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <form action="{{ route('markConcertEntry', ['id' => $user->id, 'time' => now(), 'verifedBy' => Auth::user()->name]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary p-2 pt-0 pb-0" >Confirm</button>
        </form>
        </div>
      </div>
    </div>
  </div>
        <div class="row">
            <div class="mt-4 col-lg-4">
                <div class="card mb-4  profile-card-background" style="border: none ;">
                    <div class="card-body text-center mt-4">
                        <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="loop"
                            colors="primary:#ffffff,secondary:#ffffff"
                            style="width:10rem;height:10rem;border:0.4rem solid #ffffff;border-radius:5rem">
                        </lord-icon>
                        <h5 class="my-3 text-white">{{ $user->name }}</h5>
                        <p class="text-white">Concert Registered:
                            @if ($user->pass_type == 'concert' || $user->premium_pass_concert == 1)
                            <i class="far fa-check-circle text-white"></i>
                            @else
                            <i class="far fa-times-circle"></i>
                            @endif
                        </p>
                        <p class="text-white"> Checked In for Concert:
                            @if ($user->concertEntry()->where('user_id', $user->id)->exists() )
                            <i class="far fa-check-circle text-white"></i>
                            @else
                            <i class="far fa-times-circle"></i>
                            @endif
                        </p>
                        <p class="text-white"><strong>Pass Type :</strong>
                            @if ($user->pass_type == 'concert')
                            Concert Pass
                            @else
                            Event Pass
                            @endif
                        </p>
                        
                        {{-- <p class="text-white">+91 {{ $user->phone }}</p>
                        <p class="text-white mb-4">{{ $user->college_name }}</p>
                        <p class="text-white mb-4">{{ $user->transaction_id }}</p> --}}
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0 shadow-lg  profile-box text-center">
                    <span></span><span></span>
                    {{-- <img
                        src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl={{ $user->uid != null ? $user->uid : '' }}" />
                    --}}
                    <div class="d-flex justify-content-center">

                        {{ QrCode::size(280)->generate(route('user_details', ['id' => $user->id])) }}
                    </div>
                </div>
            </div>
            <div class="detail-card col-lg-8 mt-4 ">

                <div class="card mb-4 shadow-lg  profile-box">
                    <span></span><span></span>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->name}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone number</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->phone}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">USN</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->usn }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mobile</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->phone }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">College Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->college_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @if (! $user->pass_type == 'concert')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4 mb-md-0 shadow-lg  profile-box">
                            {{-- <span></span><span></span> --}}
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-6" style="margin-bottom: 0rem; display:inline;">
                                        Events Registered
                                    </div>
                                    <div class="col-5" style="margin-bottom: 0rem; display:inline;text-align:right;">
                                        Payment Verified
                                    </div>
                                    <div class="col-1">
                                        @if ($user->is_paid)
                                        <div class="active"> <i class="far fa-check-circle"></i></div>
                                        @else
                                        <div class="inactive"> <i class="far fa-times-circle"></i></div>
                                        @endif


                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-responsive-md">
                                    <table class="table ">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Start Date</th>
                                                <th scope="col">Start Time</th>
                                                <th scope="col">Event Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user->eventRegistrations as $item)
                                            <tr>
                                                <td scope="row">{{ $item->event->date->isoFormat('DD/MM/YYYY') }}
                                                </td>
                                                <td>{{ $item->event->date->isoFormat('hh:mm a') }}</td>
                                                <td>{{ $item->event->name }}</td>
                                            </tr>
                                            <p class="mb-1" style="font-size: .77rem;"></p>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
                </form>

            </div>
        </div>
    </div>
</section>
@endsection