@extends('layouts.admin')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
<!-- Page Content -->
<div class="content">

  <!-- Dynamic Table Full -->
  <div class="block">
    <div class="block-header block-header-default">
      <h3 class="block-title">List <small>Users</small></h3>
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
      @if (session('error'))
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h3 class="alert-heading font-size-h4 font-w400">Error</h3>
        <p class="mb-0">{{ session('error') }}</p>
      </div>
      @endif
      <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
      <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
        <thead>
          <tr>
            <th class="text-center" style="width: 60px;">No</th>
            <th>Name</th>
            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
          $id = 1
          @endphp
          @foreach ($users as $row)
          <tr>
            <td class="text-center">{{ $id++ }}</td>
            <td class="font-w600">
              <a href="javascript:void(0)">{{ $row->name }}</a>
            </td>
            <td class="d-none d-sm-table-cell">
              {{ $row->email }}
            </td>
            <td>
              @if ($row->JK == 'P')
              Perempuan
              @else
              Laki-Laki
              @endif
            </td>
            <td>
              @if ($row->status == '1')
              <span class="badge badge-success">Online</span>
              @else
              <span class="badge badge-danger">Bloked</span>
              @endif
            </td>
            <td class="text-center">
              <div class="btn-group">
                @if ($row->status==='1')
                <a href="{{ route('admin.blokir', ['id'=>$row->id]) }}" class="btn btn-sm btn-secondary"
                  style="width: 50px; color: orange" data-toggle="tooltip" title="Block"><i class="fa fa-lock"></i></a>
                @else
                <a href="{{ route('admin.actived', ['id'=>$row->id]) }}" class="btn btn-sm btn-secondary"
                  style="width: 50px; color: green" data-toggle="tooltip" title="Actived"><i
                    class="fa fa-unlock"></i></a>
                @endif
                <a href="{{ route('admin.delete', ['id'=>$row->id]) }}" class="btn btn-sm btn-secondary"
                  style="width: 50px; color: red" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
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