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
<!-- Page Content -->
<div class="content">
    <!-- Dynamic Table Full -->
    <h2 class="content-heading">List Barang</h2>
    <div class="block">
        <div class="block-header block-header-default">
            <div style="width: 100%" class="row">
                <h3 class="block-title col-sm-6">List Barang</h3>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('member.addBrg') }}" class="btn btn-sm btn-alt-success">Tambah Barang</a>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full">
            @if (session('pesan'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="alert-heading font-size-h4 font-w400">Success</h3>
                <p class="mb-0">{{ session('pesan') }}</p>
            </div>
            @endif
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">No.</th>
                        <th>Image</th>
                        <th style="width: 60%">Name</th>
                        <th style="width: 10%;">harga</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">stok</th>
                        <th class="d-none d-sm-table-cell" style="width: 80px;">diskon</th>
                        <th class="text-center" style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $id = 1
                    @endphp
                    @foreach ($rows as $row)
                    <tr>
                        <th class="text-center">{{$id++}}</th>
                        <td><img class="animated wobble img-thumbnail"
                                src="{{ asset('app/images/barang').'/'.$row->foto}}" alt=""></td>
                        <td class="font-w600">{{ $row->nama }}</td>
                        <td style="width: 80%">{{ 'Rp.'.$row->harga }}</td>
                        <td class="d-none d-sm-table-cell" style="width: 80px;">{{ $row->stok }}</td>
                        <td class="d-none d-sm-table-cell" style="width: 80px;">{{ $row->diskon.'%' }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit"><i
                                        class="fa fa-pencil"></i></a>
                                <a href="#" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete"><i
                                        class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->
@endsection
