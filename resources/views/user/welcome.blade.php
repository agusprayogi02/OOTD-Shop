@extends('layouts.app')

@section('content')
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end"
                    data-scrollax-parent="true">
                    <img class="one-third order-md-last img-fluid" src="app/images/bg_1.png" alt="">
                    <div class="one-forth d-flex align-items-center ftco-animate"
                        data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">#New Arrival</span>
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3">Shoes Collection 2020</h1>
                                <p class="mb-4">A small river named Duden flows by their place and supplies it with the
                                    necessary regelialia. It is a paradisematic country.</p>

                                <p><a href="#" class="btn-custom">Discover Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-flex no-gutters slider-text align-items-center justify-content-end"
                    data-scrollax-parent="true">
                    <img class="one-third order-md-last img-fluid" src="app/images/bg_2.png" alt="">
                    <div class="one-forth d-flex align-items-center ftco-animate"
                        data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">#New Arrival</span>
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3">New Shoes Winter Collection</h1>
                                <p class="mb-4">A small river named Duden flows by their place and supplies it with the
                                    necessary regelialia. It is a paradisematic country.</p>

                                <p><a href="#" class="btn-custom">Discover Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.promosi')

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Produk Baru</h2>
                <p>List Produk Baru yang Keluar Bulan ini</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($barang as $item)
            <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
                <div class="product d-flex flex-column">
                    <a href="#" class="img-prod"><img class="img-fluid" src="app/images/barang/{{ $item->foto }}"
                            alt="Colorlib Template">
                        @if ($item->diskon > 0)
                        <span class="status">{{ $item->diskon }}% Off</span>
                        @endif
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3">
                        <div class="d-flex">
                            <div class="cat">
                                <span>LIFESTYLE</span>
                            </div>
                            <div class="rating">
                                <p class="text-right mb-0">
                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                </p>
                            </div>
                        </div>
                        <h3><a href="#">{{ $item->nama}}</a></h3>
                        <div class="pricing">
                            <p class="price">
                                @if ($item->diskon > 0)
                                <span class="mr-2 price-dc">Rp.{{ $item->harga }}</span>
                                <span
                                    class="price-sale">Rp.{{ $item->harga - (($item->diskon / 100) * $item->harga) }}</span>
                                @else
                                <span>Rp.{{ $item->harga }}</span>
                                @endif
                            </p>
                        </div>
                        <p class="bottom-area d-flex px-3">
                            <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                        class="ion-ios-add ml-1"></i></span></a>
                            <a href="#" class="buy-now text-center py-2">Buy now<span><i
                                        class="ion-ios-cart ml-1"></i></span></a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



<section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div class="choose-wrap divider-one img p-5 d-flex align-items-end"
                    style="background-image: url(app/images/choose-1.jpg);">

                    <div class="text text-center text-white px-2">
                        <span class="subheading">Men's Shoes</span>
                        <h2>Men's Collection</h2>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language
                            ocean.</p>
                        <p><a href="#" class="btn btn-black px-3 py-2">Shop now</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row no-gutters choose-wrap divider-two align-items-stretch">
                    <div class="col-md-12">
                        <div class="choose-wrap full-wrap img align-self-stretch d-flex align-item-center justify-content-end"
                            style="background-image: url(app/images/choose-2.jpg);">
                            <div class="col-md-7 d-flex align-items-center">
                                <div class="text text-white px-5">
                                    <span class="subheading">Women's Shoes</span>
                                    <h2>Women's Collection</h2>
                                    <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                                        large language ocean.</p>
                                    <p><a href="#" class="btn btn-black px-3 py-2">Shop now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <div class="choose-wrap wrap img align-self-stretch bg-light d-flex align-items-center">
                                    <div class="text text-center px-5">
                                        <span class="subheading">Summer Sale</span>
                                        <h2>Extra 50% Off</h2>
                                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                                            large language ocean.</p>
                                        <p><a href="#" class="btn btn-black px-3 py-2">Shop now</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="choose-wrap wrap img align-self-stretch d-flex align-items-center"
                                    style="background-image: url(app/images/choose-3.jpg);">
                                    <div class="text text-center text-white px-5">
                                        <span class="subheading">Shoes</span>
                                        <h2>Best Sellers</h2>
                                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                                            large language ocean.</p>
                                        <p><a href="#" class="btn btn-black px-3 py-2">Shop now</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.testimoni')
@endsection
