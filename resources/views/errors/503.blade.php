@extends('errors::minimal')

{{-- @section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable')) --}}


@section('title', __('Service Unavailable'))

@section('content')
<div class="text-white d-flex align-items-center justify-content-center"
    style="width: 100vw; height: 100vh; background-color: #123052;">
    <div class="inner align-items-center justify-content-center">
        <center>
            <figure><img class="img-fluid d-flex align-items-center justify-content-center" style="height: auto; width: 18rem;" src="{{asset('frontend/images/logo2025Full.png')}}" alt="Image"></figure>
        </center>
        {{-- <figure><img class="img-fluid2" src="{{asset('frontend/images/transitonsponsor.webp')}}" width="25%"
                height="25%" alt="Image"></figure> --}}

        <h1 class="text-center fs-3"><strong><i>Website under maintainance !!</i></strong></h1>
    </div>
</div>

@endsection