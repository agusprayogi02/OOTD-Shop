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
      <h3 class="block-title">List <small>Pesanan</small></h3>
    </div>
    <div class="block-content block-content-full">
      <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
      <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
        <thead>
          <tr>
            <th class="text-center" style="width: 60px;">No.</th>
            <th>Pembeli</th>
            <th>Produk</th>
            <th>total</th>
            <th>Penjual</th>
            <th>Status</th>
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
            <td>{{ $item->total }}</td>
            <td>
              @foreach ($users as $user)
              @if ($user->id === $item->barang->id)
              {{ $user->name }}
              @endif
              @endforeach
            </td>
            <td>
              @if ($item->ready == 0)
              <div class="badge badge-warning">Belum dikirim</div>
              @elseif($item->ready == 1)
              <div class="badge badge-success">Sudah dikirim</div>
              @else
              <div class="badge badge-danger">Ditolak</div>
              @endif
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