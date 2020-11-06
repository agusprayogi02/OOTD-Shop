@extends('layouts.app')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/app/images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span><a
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
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $id = 1; @endphp
                            @foreach ($histori as $item)
                            <tr>
                                <td>{{$id++}}</td>
                                <td>{{$item->barang->nama}}</td>
                                <td>{{$item->jumlah}}</td>
                                <td>{{$item->jumlah * $item->barang->harga}}</td>
                                <td>{{$item->barang->harga * $item->barang->diskon /100}}</td>
                                <td>{{$item->jumlah * $item->barang->harga - ($item->barang->harga * $item->barang->diskon /100)}}
                                </td>
                                <td>
                                    @if ($item->ready == 0)
                                    <div class="badge badge-info">Belum dikirim</div>
                                    @elseif($item->ready == 1)
                                    <div class="badge badge-success">Sudah dikirim</div>
                                    @else
                                    <div class="badge badge-danger">Ditolak</div>
                                    @endif
                                </td>
                                <td><a class="btn btn-primary" href="{{ route('user.history') }}"><i
                                            class="icon-backward"> </i> Back</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection