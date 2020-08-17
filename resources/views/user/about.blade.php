@extends('layouts.app')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/app/images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
                    <span>About</span></p>
                <h1 class="mb-0 bread">About Us</h1>
            </div>
        </div>
    </div>
</div>

@include('layouts.promosi')

<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                style="background-image: url(/app/images/about.jpg);">
                <a href="https://vimeo.com/45830194"
                    class="icon popup-vimeo d-flex justify-content-center align-items-center">
                    <span class="icon-play"></span>
                </a>
            </div>
            <div class="col-md-7 py-md-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section-bold mb-4 mt-md-5">
                    <div class="ml-md-0">
                        <h2 class="mb-4">Stablished Sinced 1975</h2>
                    </div>
                </div>
                <div class="pb-md-5 pb-4">
                    <p>But nothing the copy said could convince her and so it didn’t take long until a few insidious
                        Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their
                        agency, where they abused her for their.</p>
                    <p>But nothing the copy said could convince her and so it didn’t take long until a few insidious
                        Copy Writers ambushed her.</p>
                    <p><a href="#" class="btn btn-primary">Shop now</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.testimoni')

@endsection
