@extends('layouts.app')

@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('/app/images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
                    <span>Shop</span></p>
                <h1 class="mb-0 bread">Shop</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-10 order-md-last">
                <div class="row">
                    @foreach ($barang as $item)
                    <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                        <div class="product d-flex flex-column">
                            <a href="#" class="img-prod">
                                <img class="img-fluid" src="/app/images/barang/{{ $item->foto }}"
                                    alt="{{ $item->nama }}">
                                @if ($item->diskon > 0)
                                <span class="status">{{ $item->diskon }}% Off</span>
                                @endif
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 mt-auto">
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
                {{-- <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                            <ul>
                                <li><a href="#">&lt;</a></li>
                                <li class="active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&gt;</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="sidebar">
                    <div class="sidebar-box-2">
                        <h2 class="heading">Categories</h2>
                        <div class="fancy-collapse-panel">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        @foreach ($kategori as $kt)
                                        @if (request()->id == $kt->kd_ktgr)
                                        <h6 class="panel-title">
                                            <a style="font-weight: bold; color: #dbcc8f"
                                                href="{{ route('shop.get', ['id'=>$kt->kd_ktgr]) }}">{{ $kt->namaK }}</a>
                                        </h6>
                                        @else
                                        <h6>
                                            <a style="color: black"
                                                href="{{ route('shop.get', ['id'=>$kt->kd_ktgr]) }}">{{ $kt->namaK }}</a>
                                        </h6>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-box-2">
                    <h2 class="heading">Price Range</h2>
                    <form method="post" class="colorlib-form-2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="guests">Price from:</label>
                                    <div class="form-field">
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="people" id="people" class="form-control">
                                            <option value="100">100</option>
                                            <option value="500">500</option>
                                            <option value="1000">1.000</option>
                                            <option value="5000">5.000</option>
                                            <option value="10000">10.000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="guests">Price to:</label>
                                    <div class="form-field">
                                        <i class="icon icon-arrow-down3"></i>
                                        <select name="people" id="people" class="form-control">
                                            <option value="5000">5.000</option>
                                            <option value="10000">10.000</option>
                                            <option value="30000">30.000</option>
                                            <option value="50000">50.000</option>
                                            <option value="100000">100.000</option>
                                            <option value="500000">500.000</option>
                                            <option value="1000000">1.000.000</option>
                                            <option value="10000000">10.000.000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button style="width: 100%" class="btn btn-primary" type="submit">Set</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection
