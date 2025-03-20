@extends('layouts.front')

@section('content')
    <section style="background-color: #eee; ">
        <div class="container p-5">
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
                            <p class="text-white mb-4">{{ $user->uid }}</p>
                            <p class="text-white mb-4">{{ $user->transaction_id }}</p>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0 shadow-lg  profile-box">
                        <span></span><span></span>
                        <img
                            src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl={{ $user->uid != null ? $user->uid : '' }}" />
                    </div>
                </div>

                <div class="detail-card col-lg-8 mt-4 ">

                    <div class="card mb-4 shadow-lg  profile-box">
                        <span></span><span></span>
                        <div class="card-body">
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
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->email }}</p>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4 mb-md-0 shadow-lg  profile-box">
                                {{-- <span ></span><span></span> --}}
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

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
