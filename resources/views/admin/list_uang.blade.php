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
{{-- <script src="{{ asset('app/js/jquery-3.2.1.min.js') }}"></script> --}}
<script type="text/JavaScript">
  // console.log("hai");
  $(document).ready(function () {
$("#modal-popin").on("show.bs.modal", function (event) {
var button = $(event.relatedTarget);
var code = button.data("nama");
var id = button.data("userid");
console.log(id);
var modal = $(this);
modal.find("#username").val(code);
modal.find("#userId").val(id);
});
});
</script>

@endsection

@section('content')
<!-- Page Content -->
<div class="content">

  <!-- Dynamic Table Full -->
  <div class="block">
    <div class="block-header block-header-default">
      <h3 class="block-title">List <small>Members</small></h3>
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
            <th>Uang</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @php
          $id = 1
          @endphp
          @foreach ($peoples as $row)
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
              <span class="font-w700">Rp.</span>{{ $row->uang }}
            </td>
            <td class="text-center">
              <div class="btn-group">
                <a href="#modal-popin" style="color: green;" class="btn btn-sm btn-secondary" data-toggle="modal"
                  data-nama="{{ $row->name }}" data-userid="{{ $row->id }}"><i class="fa fa-diamond"></i> Top Up</a>
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

<!-- Pop In Modal -->
<div class="modal fade" id="modal-popin" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
  <div class="modal-dialog modal-dialog-popin" role="document">
    <div class="modal-content">
      <form action="{{ route('admin.add_saldo') }}" method="POST">
        @csrf
        <div class="block block-themed block-transparent mb-0">
          <div class="block-header bg-primary-dark">
            <h3 class="block-title">Top Up Saldo</h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="si si-close"></i>
              </button>
            </div>
          </div>
          <div class="block-content text-center">
            <input type="hidden" id="userId" name="id">
            <div class="form-group row">
              <label class="col-lg-3 col-form-label" for="username">Username</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                  <input type="text" name="username" readonly class="form-control" id="username" placeholder="Username">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label" for="jumlah">Jumlah</label>
              <div class="col-lg-8">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      Rp.
                    </span>
                  </div>
                  <input type="number" class="form-control" required name="uang" id="jumlah" placeholder="Jumlah Saldo">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-alt-success">
            <i class="fa fa-check"></i> TopUp
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END Pop In Modal -->

@endsection