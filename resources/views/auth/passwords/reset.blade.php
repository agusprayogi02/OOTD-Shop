@extends('layouts.auth')

@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="bg-body-dark bg-pattern" style="background-image: url('media/various/bg-pattern-inverse.png')">
        <div class="row mx-0 justify-content-center">
            <div class="hero-static col-lg-6 col-xl-4">
                <div class="content content-full overflow-hidden">

                    <!-- Header -->
                    <div class="py-30 text-center">
                        <a class="link-effect font-w700" href="{{ url('/') }}">
                            <i class="si si-fire"></i>
                            <span class="font-size-xl text-primary-dark">OOTD-</span><span
                                class="font-size-xl">SHOP</span>
                        </a>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- END Header -->

                    <form class="js-validation-reminder" action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="block block-themed block-rounded block-shadow">
                            <div class="block-header bg-gd-primary">
                                <h3 class="block-title">{{ __('Reset Password') }}</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option">
                                        <i class="si si-wrench"></i>
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $email ?? old('email') }}" required autocomplete="email"
                                            autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            value="{{ old('password') }}" required autocomplete="new-password"
                                            autofocus>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="password-confirm">{{ __('Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password" autofocus>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-asterisk mr-10"></i> {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END Reminder Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
@endsection