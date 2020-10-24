@extends('layouts.admin')

@section('content')

<div class="content">
    <h2 class="content-heading">Update Barang</h2>
    <div class="row">
        <div class="col-md-7">
            <!-- Horizontal Form -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Update Barang</h3>
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
                    <form action="{{ route('member.updateBrg', ['id'=>$barang->kd_brg]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="nama">Nama Barang</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" value="{{ $barang->nama }}" placeholder="Enter Nama..">
                                @error('nama')
                                <div class="invalid-feedback">
                                    <p>{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label " for="harga">Harga Barang</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                        id="harga" name="harga" value="{{ $barang->harga }}"
                                        placeholder="Enter Harga..">
                                    @error('harga')
                                    <div class="invalid-feedback">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label " for="stok">Jumlah Stok</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok"
                                    name="stok" value="{{ $barang->stok }}" placeholder="Enter Stok..">
                                @error('stok')
                                <div class="invalid-feedback">
                                    <p>{{ $message }}</p>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label " for="diskon">Diskon (Opsional)</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <input type="number" name="diskon" id="diskon" value="{{ $barang->diskon }}"
                                        class="form-control @error('diskon') is-invalid @enderror"
                                        placeholder="Enter Diskon">
                                    <div class="input-group-append"><span class="input-group-text">%</span></div>
                                    @error('diskon')
                                    <div class="invalid-feedback">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3">
                                <img src="{{ asset('app/images/barang/').'/'.$barang->foto }}"
                                    class="img-thumbnail mb-2" alt="">
                            </div>
                            <div class="col-lg-8">
                                <label class="col-form-label " for="foto">Ganti Gambar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" placeholder="Enter Gambar.." value="{{ $barang->foto }}"
                                        data-toggle="custom-file-input">
                                    <label for="foto" class="custom-file-label">Choose File</label>
                                    @error('foto')
                                    <div class="invalid-feedback">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label" for="kategori">Kategori</label>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <select name="kategori" id="kategori" class="form-control">
                                        @foreach ($kategori as $item)
                                        @if ($item->kd_ktgr == $barang->kd_ktgr)
                                        @php
                                        $select = 'selected';
                                        @endphp
                                        @else
                                        @php
                                        $select = '';
                                        @endphp
                                        @endif
                                        <option {{ $select }} value="{{ $item->kd_ktgr }}">{{ $item->namaK}}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                    <div class="invalid-feedback">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-9 ml-auto">
                                <button type="submit" class="btn btn-alt-primary">Update Barang</button>
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