@extends('layouts.admin')

@section('content')

<!-- Page Content -->
<!-- User Info -->
<div class="bg-image bg-image-bottom" style="background-image: url('/media/photos/photo13@2x.jpg');">
  <div class="bg-black-op-75 py-30">
    <div class="content content-full text-center">
      <!-- Avatar -->
      <div class="mb-15">
        <a class="img-link" href="{{ route('profile') }}">
          <img class="img-avatar img-avatar96 img-avatar-thumb" src="/media/profile/{{ Auth::user()->foto }}" alt="">
        </a>
      </div>
      <!-- END Avatar -->

      <!-- Personal -->
      <h1 class="h3 text-white font-w700 mb-10">{{ Auth::user()->name }}</h1>
      <h2 class="h5 text-white-op">
        {{ Str::ucfirst(Auth::user()->role) }} - <a class="text-primary-light" href="javascript:void(0)">
          {{ '@'.Auth::user()->warung ?? "Nama Warung" }}</a>
      </h2>
      <!-- END Personal -->

      <!-- Actions -->
      <a href="{{ route('profile') }}" class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5">
        <i class="fa fa-arrow-left mr-5"></i> Back to Profile
      </a>
      <!-- END Actions -->
    </div>
  </div>
</div>
<!-- END User Info -->

<!-- Main Content -->
<div class="content">
  <!-- User Profile -->
  <div class="block">
    <div class="block-header block-header-default">
      <h3 class="block-title">
        <i class="fa fa-user-circle mr-5 text-muted"></i> User Profile
      </h3>
    </div>
    <div class="block-content">
      @if (session('pesan'))
      <div class="alert alert-success" role="alert">
        {{ session('pesan') }}
      </div>
      @endif
      @if (session('error'))
      <div class="alert alert-danger" role="alert">
        {{ session('error') }}
      </div>
      @endif
      <form class="js-validation-signup" method="POST" enctype="multipart/form-data"
        action="{{ route('update_profile') }}">
        @csrf
        <div class="row items-push">
          <div class="col-lg-3">
            <p class="text-muted">
              Your account’s vital info. Your username will be publicly visible.
            </p>
          </div>
          <div class="col-lg-7 offset-lg-1">
            <div class="form-group row">
              <div class="col-12">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" class="js-maxlength form-control @error('name') is-invalid @enderror"
                  name="name" maxlength="255" data-always-show="true" data-placement="right"
                  value="{{ old('name') ?? Auth::user()->name }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <label for="alamat">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                  rows="5">{{ old('alamat') ?? Auth::user()->alamat }}</textarea>
                @error('alamat')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <label for="warung">Nama Toko</label>
                <input type="text" class="form-control @error('warung') is-invalid @enderror" name="warung" id="warung"
                  value="{{ old('warung') ?? Auth::user()->warung }}" required />
                @error('warung')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <label for="jenis">{{ __('Jenis Kelamin') }}</label>
                <select class="js-select2 form-control" name="jk" id="jenis">
                  @if (Auth::user()->JK === "L" )
                  <option selected value="L">Laki-Laki</option>
                  @else
                  <option value="L">Laki-Laki</option>
                  @endif
                  @if (Auth::user()->JK === "P" )
                  <option selected value="P">Perempuan</option>
                  @else
                  <option value="P">Perempuan</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <label for="birthdate">Tanggal Lahir</label>
                <input type="text" class="js-flatpickr form-control bg-white @error('birthdate') is-invalid @enderror"
                  id="birthdate" name="birthdate" value="{{ old('birthdate') ?? Auth::user()->birthdate }}"
                  data-alt-input="true" data-date-format="Y-m-d" data-alt-format="F j, Y">
                @error('birthdate')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-10 col-xl-6">
                <div class="push">
                  <img id="img" class="img-avatar"
                    src="{{ Request::file('foto')?? '/media/profile/'.Auth::user()->foto }}" alt="">
                </div>
                <div class="custom-file">
                  <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                  <input type="file" class="custom-file-input" id="foto-profile" name="foto"
                    data-toggle="custom-file-input">
                  <label class="custom-file-label" for="foto-profile">Choose new avatar</label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <button type="submit" class="btn btn-alt-primary">Update</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- END User Profile -->
</div>
@endsection