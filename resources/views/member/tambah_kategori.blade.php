@extends('layouts.admin')

@section('content')

<div class="content">
    <h2 class="content-heading">Tambah Kategori Barang</h2>
    <div class="row">
        <div class="col-md-8">
            <!-- Horizontal Form -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tambah Kategori Barang</h3>
                </div>
                <div class="block-content">
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="alert-heading font-size-h4 font-w400">Error</h3>
                        <p class="mb-0">{{ session('error') }}</p>
                    </div>
                    @endif
                    <form action="{{ route('member.store_ktgr') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="namaK">Nama Kategori <b
                                    style="color: red">*</b></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control @error('namaK') is-invalid @enderror" id="namaK"
                                    name="namaK" placeholder="Enter Nama..">
                                @error('namaK')
                                <div class="invalid-feedback">
                                    <p>{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 ml-auto">
                                <button type="submit" class="btn btn-alt-primary">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Horizontal Form -->
        </div>
    </div>
</div>

@endsection
