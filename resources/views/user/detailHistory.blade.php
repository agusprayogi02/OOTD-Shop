@extends('layouts.app')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/app/images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span><a
                            href="{{ route('user.history') }}">History</a></span> <span>Detail</span></p>
                <h1 class="mb-0 bread">Detail</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>jumlah</th>
                                <th>SubTotal</th>
                                <th>Diskon</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $id = 1; @endphp
                            @foreach ($histori as $item)
                            @if ($item->user ==1)
                            <tr class="text-center">
                                <td>{{ $id++ }}</td>
                                <td>{{ $item->kd_transaksi }}</td>
                                <td>Rp {{ $item->diskon }}</td>
                                <td>Rp {{ $item->delivery }}</td>
                                <td>Rp {{ $item->subTotal }}</td>
                                <td>Rp {{ $item->total }}</td>
                                <td>
                                    @if ($item->status == 0)
                                    <span class="badge badge-danger">Belum Terkonfirmasi</span>
                                    @elseif($item->status == 1)
                                    <span class="badge badge-warning">Dalam Perjalanan</span>
                                    @else
                                    <span class="badge badge-success">Diterima</span>
                                    @endif
                                </td>
                                <td class="row">
                                    <a href="" class="col-5 btn btn-info"><i class="icon-info2"></i> Detail</a>
                                    |
                                    <a href="{{ route('user.history.delete', ['id'=>$item->kd_transaksi]) }}"
                                        class="col-5 btn btn-danger"><i class="icon-delete"></i> Delete</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
