@extends('layouts.admin')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/pages/be_ui_animations.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')

<div class="content">
    <h2 class="content-heading">{{ $title }}</h2>
    <div class="row">
        <div class="col-md-11">
            <!-- Full Table -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">{{ $title }}</h3>
                </div>
                <div class="block-content">
                    @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                        <p class="mb-0">{{ session('pesan') }}</p>
                    </div>
                    @endif
                    <div class="table-responsive pb-3">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 60px;">No.</th>
                                    <th>Pembeli</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>diskon</th>
                                    <th>total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $id = 1 @endphp
                                @foreach ($pesanan as $item)
                                <tr>
                                    {{-- {{dd($item->users->name)}} --}}
                                    <th class="text-center" style="width: 80px;">{{ $id++ }}</th>
                                    <td>{{ $item->users->name }}</td>
                                    <td>{{ $item->barang->nama }}</td>
                                    <td>{{ $item->barang->harga }}</td>
                                    <td>{{ $item->jumlah}}</td>
                                    <td>{{ $item->diskon }}</td>
                                    <td>{{ $item->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection