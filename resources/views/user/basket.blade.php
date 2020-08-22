@extends('layouts.app')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('/app/images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
                    <span>Cart</span></p>
                <h1 class="mb-0 bread">My Wishlist</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    @if (session('pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session('pesan') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Diskon</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($barang))
                            @foreach ($barang as $item => $dt)
                            {{-- {{dd($item)}} --}}
                            <tr class="text-center">
                                <td class="product-remove"><a
                                        href="{{ route('user.cart.delete', ['id'=>$item]) }}"><span
                                            class="ion-ios-close"></span></a></td>

                                <td class="image-prod">
                                    <div class="img"
                                        style="background-image:url(/app/images/barang/{{ $dt['foto'] }});">
                                    </div>
                                </td>

                                <td class="product-name">
                                    <h3>{{ $dt['nama'] }}</h3>
                                </td>
                                <td>Rp.{{ $dt['diskon'] }}</td>
                                <td class="price">Rp.{{ $dt['harga'] }}</td>

                                <td class="quantity">
                                    <div class="input-group d-flex">
                                        <span class="input-group-btn mr-2">
                                            <a href="{{ route('user.minus', ['id'=>$item]) }}"
                                                style="background-color: red; color: white"
                                                class="quantity-left-minus btn" data-type="minus" data-field="">
                                                <i class="ion-ios-remove"></i>
                                            </a>
                                        </span>
                                        <input type="text" disabled id="quantity" name="quantity"
                                            class="quantity form-control input-number" value="{{ $dt['jumlah'] }}"
                                            min="1" max="100">
                                        <span class="input-group-btn ml-2">
                                            <a href="{{ route('user.plus', ['id'=>$item]) }}"
                                                style="background-color: green; color: white"
                                                class="quantity-right-plus btn" data-type="plus" data-field="">
                                                <i class="ion-ios-add"></i>
                                            </a>
                                        </span>
                                    </div>
                                </td>

                                <td class="total">Rp.{{ $dt['total'] }}</td>
                            </tr><!-- END TR-->
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>$20.60</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <p class="d-flex">
                        <span>Discount</span>
                        <span>$3.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>$17.60</span>
                    </p>
                </div>
                <p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
