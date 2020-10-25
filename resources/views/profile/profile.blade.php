@extends('layouts.admin')

@section('content')

<!-- Page Content -->
<!-- User Info -->
<div class="bg-image bg-image-bottom" style="background-image: url('/media/photos/photo13@2x.jpg');">
  <div class="bg-primary-dark-op py-30">
    <div class="text-right mr-5">
      <a class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mr-30 px-4" href="{{ route('edit_profile') }}">
        <i class="fa fa-pencil"></i> Edit Profile
      </a>
    </div>
    <div class="content content-full text-center">
      <!-- Avatar -->
      <div class="mb-15">
        <a class="img-link" href="{{ route('profile') }}">
          <img class="img-avatar img-avatar96 img-avatar-thumb" src="/media/profile/{{ Auth::user()->foto}}" alt="">
        </a>
      </div>
      <!-- END Avatar -->

      <!-- Personal -->
      <h1 class="h3 text-white font-w700 mb-10">
        {{Auth::user()->name}}
      </h1>
      <h2 class="h5 text-white-op">
        {{ Str::upper(Auth::user()->role) }} -
        @if (Auth::user()->role == 'member' )
        <a class="text-primary-light" href="javascript:void(0)">{{ " @". Auth::user()->warung ?? "Nama Warung" }}</a>
        @else
        <a class="text-primary-light" href="javascript:void(0)"> @Pemilik Usaha</a>
        @endif
      </h2>
      <h3 class="text-white-op h5"><i class="fa fa-birthday-cake">{{ "  ".Auth::user()->birthdate }}</i></h3>
      <h3 class="text-white-op h5"><i class="fa fa-address-card">{{ "  ".Auth::user()->alamat }}</i></h3>
      <!-- END Personal -->

      <div class="row justify-content-center">
        <div class="block block-rounded text-center col-3">
          <div class="block-content">
            <h3>My Saldo</h3>
            <hr>
            <h4>Rp. {{ Auth::user()->uang }}</h4>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- END User Info -->

@endsection