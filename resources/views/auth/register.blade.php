@extends('layouts.auth')

@section('content')

@section('css_before')
<!-- Stylesheets -->
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="js/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="js/plugins/jquery-tags-input/jquery.tagsinput.min.css">
<link rel="stylesheet" href="js/plugins/jquery-auto-complete/jquery.auto-complete.min.css">
<link rel="stylesheet" href="js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
<link rel="stylesheet" href="js/plugins/dropzonejs/dist/dropzone.css">
<link rel="stylesheet" href="js/plugins/flatpickr/flatpickr.min.css">
@endsection

@section('js_after')
<!-- Page JS Plugins -->
<script src="js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js"></script>
<script src="js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="js/plugins/select2/js/select2.full.min.js"></script>
<script src="js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
<script src="js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
<script src="js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="js/plugins/dropzonejs/dropzone.min.js"></script>
<script src="js/plugins/flatpickr/flatpickr.min.js"></script>

<!-- Page JS Code -->
<script src="js/pages/be_forms_plugins.min.js"></script>

<!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins) -->
<script>
    jQuery(function(){ Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']); });
</script>
@endsection
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="bg-body-dark bg-pattern" style="background-image: url('media/various/bg-pattern-inverse.png');">
        <div class="row mx-0 justify-content-center">
            <div class="hero-static col-lg-6 col-xl-6">
                <div class="content content-full overflow-hidden">
                    <!-- Header -->
                    <div class="py-30 text-center">
                        <a class="link-effect font-w700" href="{{ route('home')}}">
                            <i class="si si-fire"></i>
                            <span class="font-size-xl text-primary-dark">OOTD-</span><span
                                class="font-size-xl">SHOP</span>
                        </a>
                        <h1 class="h4 font-w700 mt-30 mb-10">Create New Account</h1>
                        <h2 class="h5 font-w400 text-muted mb-0">We’re excited to have you on board!</h2>
                    </div>
                    <!-- END Header -->

                    <!-- Sign Up Form -->
                    <!-- jQuery Validation functionality is initialized with .js-validation-signup class in js/pages/op_auth_signup.min.js which was auto compiled from _es6/pages/op_auth_signup.js -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-signup" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="block block-themed block-rounded block-shadow">
                            <div class="block-header bg-gd-emerald">
                                <h3 class="block-title">Please add your details</h3>
                            </div>
                            <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input id="name" type="text"
                                            class="js-maxlength form-control @error('name') is-invalid @enderror"
                                            name="name" maxlength="255" data-always-show="true" data-placement="right"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="signup-email">Email</label>
                                        <input id="signup-email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="signup-password">Password</label>
                                        <input type="password"
                                            class="js-pw-strength1 form-control @error('password') is-invalid @enderror"
                                            id="signup-password" name="password" required autocomplete="new-password">
                                        <div class="js-pw-strength1-progress pw-strength-progress mt-5"></div>
                                        <p class="js-pw-strength1-feedback form-text"></p>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="jenis">{{ __('Jenis Kelamin') }}</label>
                                        <select class="js-select2 form-control" name="jk" id="jenis">
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror"
                                            name="alamat" id="alamat" rows="5">{{old('alamat')}}</textarea>
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="birthdate">Tanggal Lahir</label>
                                        <input type="text"
                                            class="js-flatpickr form-control bg-white @error('birthdate') is-invalid @enderror"
                                            id="birthdate" name="birthdate" value="{{old('birthdate')}}"
                                            data-alt-input="true" data-date-format="Y-m-d" data-alt-format="F j, Y">
                                        @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="role">Daftar Sebagai</label>
                                        <select name="role" class="js-select2 form-control" id="role">
                                            <option value="user">User</option>
                                            <option value="member">Member</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-sm-6 push">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signup-terms"
                                                name="signup-terms">
                                            <label class="custom-control-label" for="signup-terms">I agree to Terms
                                                &amp; Conditions</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-sm-right push">
                                        <button type="submit" class="btn btn-alt-success">
                                            <i class="fa fa-plus mr-10"></i> Create Account
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content bg-body-light">
                                <div class="form-group text-center">
                                    <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="#"
                                        data-toggle="modal" data-target="#modal-terms">
                                        <i class="fa fa-book text-muted mr-5"></i> Read Terms
                                    </a>
                                    <a class="link-effect text-muted mr-10 mb-5 d-inline-block"
                                        href="{{ route('login')}}">
                                        <i class="fa fa-user text-muted mr-5"></i> Sign In
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END Sign Up Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<!-- Terms Modal -->
<div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Terms &amp; Conditions</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <p>Harus Setuju Wkwkwk</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                    <i class="fa fa-check"></i> Perfect
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END Terms Modal -->
@endsection