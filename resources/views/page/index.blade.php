@extends('page.layout')
@section('title','Trang chủ')
<head>
    <style>
        .single-slider {
    /* background-color: rgb(69 68 68 / 70%)!important; */
}
        i{
            /* font-size:100px; */
        }
        i {
    padding-top: 10px;
}
        img.primary-image {
    max-height: 190px;
}
img.secondary-image{
    max-height: 190px;
}
    </style>
</head>
@section('page_content')

@section('hide')
    <ul class="category-nav__menu " id="js-cat-nav">

        @foreach($category2 as $ctg2)

        <li class="category-nav__menu__item has-children">
            <a href="#" ><i class="fa fa-coffee"></i> {{$ctg2->category_name}}</a>
            <div class="category-nav__submenu">
                <div class="category-nav__submenu--inner">
                    {{-- danh muc con --}}
                    @foreach($ctg2->subcategory as $ctg3)

                    <ul>
                        <li>
                            <a href="{{Route('p.subcategory',['id' => $ctg3->id])}}" >{{$ctg3->subcategory_name}}</a>
                        </li>

                    </ul>

                    @endforeach

                </div>
            </div>
        </li>

        @endforeach


    </ul>
@endsection

        <!-- Main Wrapper Start -->
        <main id="content" class="main-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Hero Area Start -->
                        <div class="row custom-row pb--40 pb-sm--30">
                            <div class="col-lg-9 offset-lg-3">
                                @include('page.banner')
                            </div>
                        </div>
                        <!-- Hero Area End -->

                        <!-- Promo area Start -->
                        <div class="row section-padding section-sm-padding">
                            <div class="col-md-6">
                                <div class="promo-box mb-sm--20">
                                    <a href="#"><img src="{{asset('public/page/img/home8-banner1-1.jpg')}}" alt="promo"></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="promo-box">
                                    <a href=""><img src="{{asset('public/page/img/home8-banner1-2.jpg')}}" alt="promo"></a>
                                </div>
                            </div>
                        </div>
                        <!-- Promo area End -->

                        <div class="row section-padding section-sm-padding">
                            <div class="col-lg-4 col-xl-3">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Corporate area start -->
                                        <div class="corporate corporate-vertical bg--white mb--40">
                                            <div class="corporate__single">
                                                <div class="corporate__icon">
                                                    <i class="fa fa-refresh"></i>
                                                </div>
                                                <div class="corporate__content">
                                                    <h3 class="corporate__title">Miễn phí đổi trả</h3>
                                                    <p class="corporate__text">Trong vòng 30 ngày kể từ khi nhận hàng!</p>
                                                </div>
                                            </div>
                                            <div class="corporate__single">
                                                <div class="corporate__icon">
                                                    <i class="fa fa-paper-plane-o"></i>
                                                </div>
                                                <div class="corporate__content">
                                                    <h3 class="corporate__title">Miễn phí giao hàng</h3>
                                                    <p class="corporate__text">Miễn phí cho tất cả đơn hàng</p>
                                                </div>
                                            </div>
                                            <div class="corporate__single">
                                                <div class="corporate__icon">
                                                    <i class="fa fa-credit-card-alt"></i>
                                                </div>
                                                <div class="corporate__content">
                                                    <h3 class="corporate__title">Thanh toán bảo mật</h3>
                                                    <p class="corporate__text">An toàn 100%</p>
                                                </div>
                                            </div>
                                            <div class="corporate__single">
                                                <div class="corporate__icon">
                                                    <i class="fa fa-support"></i>
                                                </div>
                                                <div class="corporate__content">
                                                    <h3 class="corporate__title">Hổ trợ 24/7</h3>
                                                    <p class="corporate__text">Đội ngũ hổ trợ 24giờ</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Corporate area end -->
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-12">
                                        <!-- Best Seller Product Carousel Start-->
                                        <div class="best-products-area mb-smlg--40">
                                            <div class="section-title title-1 brand-color mb--20">
                                                <h2>Sách bán chạy nhất</h2>
                                            </div>
                                            <div class="best-products-carousel owl-carousel js-best-product-carousel">
                                                {{-- theo tung the loai --}}
                                                <div class="best-products-group">
                                                    <div class="section-title title-1 brand-color mb--20">
                                                        <h2 style="font-size: 16px;    padding-top: 4px;">Sách văn học</h2>
                                                    </div>
                                                    @foreach($loai5s as $loai)
                                                    <div class="product-box horizontal horizontal--small bg--white color-2">
                                                        <div class="product-box__img">
                                                            <img src="{{asset('public\upload\products/')}}/{{$loai->book_image}}" alt="product" class="primary-image">
                                                        <img src="{{asset('public\upload\products/')}}/{{$loai->book_image}}" alt="product" class="secondary-image">
                                                        </div>
                                                        <div class="product-box__content">
                                                            <h3 class="product-box__title"><a href="single-product.html">{{$loai->book_title}}</a></h3>
                                                            <div class="ratings">
                                                                @if($loai->book_tbc)
                                                                @if($loai->book_tbc<1.5)
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                @elseif($loai->book_tbc<2.5 && $loai->book_tbc >=1.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                @elseif($loai->book_tbc<3.5 && $loai->book_tbc >=2.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>

                                                                    @elseif($loai->book_tbc <4.5 && $loai->book_tbc >= 3.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    @elseif($loai->book_tbc >=4.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                @endif
                                                                @endif
                                                                <div class="bui-review-score__badge">
                                                                    @if($loai->book_tbc)
                                                                        {{$loai->book_tbc}}
                                                                    @else
                                                                    ?
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="product-box__price">
                                                                @if(isset($loai->book_sale))
                                                                <span class="regular-price"> {{number_format($loai->book_sale, 0, '.', '.')}}    vnđ</span>
                                                            <span class="sale-price">{{number_format($loai->book_price, 0, '.', '.')}} vnđ</span>
                                                            @else
                                                            <span class="sale-price">{{number_format($loai->book_price, 0, '.', '.')}} vnđ</span>
                                                            @endif
                                                            {{-- <span class="sale-price">{{$loai->book_price}}</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                </div>
                                                <div class="best-products-group">
                                                    <div class="section-title title-1 brand-color mb--20">
                                                        <h2 style="font-size: 16px;    padding-top: 4px;">Sách kinh tế</h2>
                                                    </div>
                                                    @foreach($loai2s as $loai)
                                                    <div class="product-box horizontal horizontal--small bg--white color-2">
                                                        <div class="product-box__img">
                                                            <img src="{{asset('public\upload\products/')}}/{{$loai->book_image}}" alt="product" class="primary-image">
                                                        <img src="{{asset('public\upload\products/')}}/{{$loai->book_image}}" alt="product" class="secondary-image">
                                                        </div>
                                                        <div class="product-box__content">
                                                            <h3 class="product-box__title"><a href="single-product.html">{{$loai->book_title}}</a></h3>
                                                            <div class="ratings">
                                                                @if($loai->book_tbc)
                                                                @if($loai->book_tbc<1.5)
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                @elseif($loai->book_tbc<2.5 && $loai->book_tbc >=1.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                @elseif($loai->book_tbc<3.5 && $loai->book_tbc >=2.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>

                                                                    @elseif($loai->book_tbc <4.5 && $loai->book_tbc >= 3.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    @elseif($loai->book_tbc >=4.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                @endif
                                                                @endif
                                                                <div class="bui-review-score__badge">
                                                                    @if($loai->book_tbc)
                                                                        {{$loai->book_tbc}}
                                                                    @else
                                                                    ?
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="product-box__price">
                                                                @if(isset($loai->book_sale))
                                                                <span class="regular-price"> {{number_format($loai->book_sale, 0, '.', '.')}}    vnđ</span>
                                                            <span class="sale-price">{{number_format($loai->book_price, 0, '.', '.')}} vnđ</span>
                                                            @else
                                                            <span class="sale-price">{{number_format($loai->book_price, 0, '.', '.')}} vnđ</span>
                                                            @endif
                                                            {{-- <span class="sale-price">{{$loai->book_price}}</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                </div>
                                                <div class="best-products-group">
                                                    <div class="section-title title-1 brand-color mb--20">
                                                        <h2 style="font-size: 16px;    padding-top: 4px;">Sách kĩ năng sống</h2>
                                                    </div>
                                                    @foreach($loai41s as $loai)
                                                    <div class="product-box horizontal horizontal--small bg--white color-2">
                                                        <div class="product-box__img">
                                                            <img src="{{asset('public\upload\products/')}}/{{$loai->book_image}}" alt="product" class="primary-image">
                                                        <img src="{{asset('public\upload\products/')}}/{{$loai->book_image}}" alt="product" class="secondary-image">
                                                        </div>
                                                        <div class="product-box__content">
                                                            <h3 class="product-box__title"><a href="single-product.html">{{$loai->book_title}}</a></h3>
                                                            <div class="ratings">
                                                                @if($loai->book_tbc)
                                                                @if($loai->book_tbc<1.5)
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                @elseif($loai->book_tbc<2.5 && $loai->book_tbc >=1.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                @elseif($loai->book_tbc<3.5 && $loai->book_tbc >=2.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>

                                                                    @elseif($loai->book_tbc <4.5 && $loai->book_tbc >= 3.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    @elseif($loai->book_tbc >=4.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                @endif
                                                                @endif
                                                                <div class="bui-review-score__badge">
                                                                    @if($loai->book_tbc)
                                                                        {{$loai->book_tbc}}
                                                                    @else
                                                                    ?
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="product-box__price">
                                                                @if(isset($loai->book_sale))
                                                                <span class="regular-price"> {{number_format($loai->book_sale, 0, '.', '.')}}    vnđ</span>
                                                            <span class="sale-price">{{number_format($loai->book_price, 0, '.', '.')}} vnđ</span>
                                                            @else
                                                            <span class="sale-price">{{number_format($loai->book_price, 0, '.', '.')}} vnđ</span>
                                                            @endif
                                                            {{-- <span class="sale-price">{{$loai->book_price}}</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                </div>
                                                <div class="best-products-group">
                                                    <div class="section-title title-1 brand-color mb--20">
                                                        <h2 style="font-size: 16px;    padding-top: 4px;">Các loại khác</h2>
                                                    </div>
                                                    @foreach($loai0s as $loai)
                                                    <div class="product-box horizontal horizontal--small bg--white color-2">
                                                        <div class="product-box__img">
                                                            <img src="{{asset('public\upload\products/')}}/{{$loai->book_image}}" alt="product" class="primary-image">
                                                        <img src="{{asset('public\upload\products/')}}/{{$loai->book_image}}" alt="product" class="secondary-image">
                                                        </div>
                                                        <div class="product-box__content">
                                                            <h3 class="product-box__title"><a href="single-product.html">{{$loai->book_title}}</a></h3>
                                                            <div class="ratings">
                                                                @if($loai->book_tbc)
                                                                @if($loai->book_tbc<1.5)
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                @elseif($loai->book_tbc<2.5 && $loai->book_tbc >=1.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                @elseif($loai->book_tbc<3.5 && $loai->book_tbc >=2.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>

                                                                    @elseif($loai->book_tbc <4.5 && $loai->book_tbc >= 3.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    @elseif($loai->book_tbc >=4.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                @endif
                                                                @endif
                                                                <div class="bui-review-score__badge">
                                                                    @if($loai->book_tbc)
                                                                        {{$loai->book_tbc}}
                                                                    @else
                                                                    ?
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="product-box__price">
                                                                @if(isset($loai->book_sale))
                                                                <span class="regular-price"> {{number_format($loai->book_sale, 0, '.', '.')}}    vnđ</span>
                                                            <span class="sale-price">{{number_format($loai->book_price, 0, '.', '.')}} vnđ</span>
                                                            @else
                                                            <span class="sale-price">{{number_format($loai->book_price, 0, '.', '.')}} vnđ</span>
                                                            @endif
                                                            {{-- <span class="sale-price">{{$loai->book_price}}</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Best Seller Product Carousel End-->
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-12">
                                        <!-- Promo area Start -->
                                        <div class="promo-box full-width mt-md--40 mb-md--40">
                                            <a href="#">
                                                <img src="{{asset('public/page/img/home3-sidebar.jpg')}}" alt="promo">
                                            </a>
                                        </div>
                                        <!-- Promo area End -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-9">
                                <!-- New Products area Start -->
                                <div class="new-products-area pb--40 pb-sm--340">
                                    <div class="row mb--20">
                                        <div class="col-12">
                                            <div class="section-title title-1 brand-color">
                                                <h2>Sản phẩm mới</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="new-products-carousel bg--white owl-carousel js-new-products-carousel-2">
                                                {{-- 1 cot --}}
                                                @foreach($books as $odd)



                                                    <div class="new-products-group">
                                                        {{-- 1 hang --}}
                                                        <div class="product-box-wrapper">
                                                            <div class="product-box horizontal horizontal--3 bg--white color-3">
                                                                <div class="product-box__img">
                                                                    <img src="{{asset('public/upload/products')}}/{{$odd->book_image}}" alt="product" class="primary-image">
                                                                <img style="opacity:0.5;" src="{{asset('public/upload/products/')}}/{{$odd->book_image}}" alt="product" class="secondary-image">
                                                                </div>
                                                                <div class="product-box__content">
                                                                <h3 class="product-box__title"><a href="{{route('b.detail',[$odd->id])}}">{{$odd->book_title}}</a></h3>
                                                                    <div class="ratings">
                                                                        @if($odd->book_tbc)
                                                                        @if($odd->book_tbc<1.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        @elseif($odd->book_tbc<2.5 && $odd->book_tbc >=1.5)
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        @elseif($odd->book_tbc<3.5 && $odd->book_tbc >=2.5)
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>

                                                                            @elseif($odd->book_tbc <4.5 && $odd->book_tbc >= 3.5)
                                                                                <i class="fa fa-star rated"></i>
                                                                                <i class="fa fa-star rated"></i>
                                                                                <i class="fa fa-star rated"></i>
                                                                                <i class="fa fa-star rated"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            @elseif($odd->book_tbc >=4.5)
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                        @endif
                                                                        @endif
                                                                        <div class="bui-review-score__badge">
                                                                            @if($odd->book_tbc)
                                                                                {{$odd->book_tbc}}
                                                                            @else
                                                                            ?
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-box__price">
                                                                        @if(isset($odd->book_sale))
                                                                        <br>
                                                                        <br>
                                                                        <span class="regular-price"> {{number_format($odd->book_sale, 0, '.', '.')}}    vnđ</span>
                                                                    <span class="sale-price">{{number_format($odd->book_price, 0, '.', '.')}} vnđ</span>
                                                                    @else
                                                                    <br>
                                                                    <span class="sale-price">{{number_format($odd->book_price, 0, '.', '.')}} vnđ</span>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                                <div class="product-box__action action-1">
                                                                <a href="{{ route('addcart',['id'=>$odd->id])}}" class="add-to-cart" data-toggle="tooltip" data-placement="top" title="Add to cart"><i class="fa fa-shopping-bag"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    @endforeach


                                                </div>
                                                <div class="promo-area section-padding section-sm-padding">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="promo-box">
                                                                <a href="#"><img src="{{asset('public/page/img/home8-banner2.jpg')}}" alt="promo"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb--20">
                                                    <div class="col-12">
                                                        <div class="section-title title-1 brand-color">
                                                            <h2>Sản phẩm được xem nhiều nhất </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="new-products-carousel bg--white owl-carousel js-new-products-carousel-2">
                                                    @foreach($xemnhieu as $even)
                                                    <div class="new-products-group">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-box horizontal horizontal--3 bg--white color-3">
                                                                <div class="product-box__img">
                                                                    <img src="{{asset('public/upload/products')}}/{{$even->book_image}}" alt="product" class="primary-image">
                                                                    <img src="{{asset('public/upload/products')}}/{{$even->book_image}}" alt="product" class="secondary-image">
                                                                </div>
                                                                <div class="product-box__content">
                                                                <h3 class="product-box__title"><a href="{{route('b.detail',[$even->id])}}">{{$even->book_title}}</a></h3>
                                                                    <div class="ratings">
                                                                        @if($even->book_tbc)
                                                                        @if($even->book_tbc<1.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        @elseif($even->book_tbc<2.5 && $even->book_tbc >=1.5)
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        @elseif($even->book_tbc<3.5 && $even->book_tbc >=2.5)
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>

                                                                            @elseif($even->book_tbc <4.5 && $even->book_tbc >= 3.5)
                                                                                <i class="fa fa-star rated"></i>
                                                                                <i class="fa fa-star rated"></i>
                                                                                <i class="fa fa-star rated"></i>
                                                                                <i class="fa fa-star rated"></i>
                                                                                <i class="fa fa-star"></i>
                                                                            @elseif($even->book_tbc >=4.5)
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                        @endif
                                                                        @endif
                                                                        <div class="bui-review-score__badge">
                                                                            @if($even->book_tbc)
                                                                                {{$even->book_tbc}}
                                                                            @else
                                                                            ?
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-box__price">
                                                                        @if(isset($even->book_sale))
                                                                        <span class="regular-price">{{number_format($even->book_sale, 0, '.', '.')}} vnđ</span>
                                                                    <span class="sale-price">{{number_format($even->book_price, 0, '.', '.')}} vnđ</span>
                                                                    @else
                                                                    <span class="sale-price">{{number_format($even->book_price, 0, '.', '.')}} vnđ</span>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                                <div class="product-box__action action-1">
                                                                <a href="{{route('addcart',['id'=>$even->id])}}" class="add-to-cart" data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-bag"></i></a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                        @endforeach
                                                    </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- New Products area End -->

                                <!-- Promo area Start -->
                                <div class="promo-area section-padding section-sm-padding">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="promo-box">
                                                <a href="#"><img src="{{asset('public/page/img/home8-banner2.jpg')}}" alt="promo"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Promo area End -->

                                <!-- Category products area Start -->
                                <div class="category-porducts-area section-padding section-sm-padding">
                                    <div class="row align-items-center mb--20">
                                        <div class="col-xl-3 col-md-4">
                                            <div class="section-title title-1 brand-color text-md-left text-center mb-sm--20">
                                                <h2 style="width: max-content">
                                                    Sách đang giảm giá
                                                </h2>
                                            </div>
                                        </div>
                                        {{-- <div class="col-xl-9 col-md-8 text-md-right text-center">
                                            <ul class="category-list list-1 color-3">
                                                <li><a href="shop.html">Playstation</a></li>
                                                <li><a href="shop.html">Xbox</a></li>
                                                <li><a href="shop.html">Sony Psp</a></li>
                                                <li><a href="shop.html">WII u</a></li>
                                                <li><a href="shop.html">See More</a></li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-12">
                                            <div class="category-porducts-wrapper bg--white">
                                                <div class="category-product-carousel owl-carousel js-category-product-carousel-2">
                                                    @foreach($giams as $giam)

                                                    <div class="product-box product-box-hover-up hover-up-2 color-3">

                                                        <div class="product-box__img">
                                                            <img src="{{asset('public/upload/products/')}}/{{$giam->book_image}}" alt="product" class="primary-image">
                                                            <img src="{{asset('public/upload/products/')}}/{{$giam->book_image}}" alt="product" class="secondary-image">
                                                        <a href="#" data-toggle="modal" data-target="#productModal1" id="sp" data-sp-ma="{{$giam->id}}" class="product-box__quick-view"><i class="fa fa-search"></i></a>
                                                        </div>
                                                        <div class="product-box__content">
                                                        <h3 class="product-box__title"><a href="{{route('b.detail',[$giam->id])}}">{{$giam->book_title}}</a></h3>
                                                        <div class="ratings">
                                                            @if($giam->book_tbc)
                                                                    @if($giam->book_tbc<1.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    @elseif($giam->book_tbc<2.5 && $giam->book_tbc >=1.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    @elseif($giam->book_tbc<3.5 && $giam->book_tbc >=2.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>

                                                                        @elseif($giam->book_tbc <4.5 && $giam->book_tbc >= 3.5)
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        @elseif($giam->book_tbc >=4.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                    @endif
                                                                    @endif
                                                                    <div class="bui-review-score__badge">
                                                                        @if($giam->book_tbc)
                                                                            {{$giam->book_tbc}}
                                                                        @else
                                                                        ?
                                                                        @endif
                                                                    </div>

                                                        </div>
                                                            <div class="product-box__price">
                                                            <span class="regular-price">{{number_format($giam->book_sale, 0, '.', '.')}} vnđ</span>
                                                                <span class="sale-price">{{number_format($giam->book_price, 0, '.', '.')}} vnđ</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-box__action action-3">
                                                            <a href="wishlist.html" class="add-to-wishlist" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i></a>
                                                        <a href="{{route('addcart',['id'=>$giam->id])}}" class="add-to-cart" data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="compare.html" class="add-to-compare" data-toggle="tooltip" data-placement="top" title="Add to compare"><i class="fa fa-refresh"></i></a>
                                                        </div>

                                                    </div>


                  {{-- start --}}


{{-- end --}}

{{-- end --}}
@endforeach
</div>
                                                <div class="promo-box">
                                                    <a href="#"><img src="{{asset('public/page/img/home8-banner3.jpg')}}" alt="promo"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <script>
                                     $(document).ready(function () {
                                    var id = $('#sp').data('sp-ma');
                                    console.log(id);
                                });
                                </script> --}}
                                {{-- start modal --}}
                                <div style="" class="modal fade product-modal" id="productModal1" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" style="" role="document">
                                      <div class="modal-content">
                                        <div class="modal-body">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                          <div class="row">
                                              <div class="col-md-5">
                                                  <div class="tab-content product-thumb-large">
                                                      <div id="thumb1" class="tab-pane active show fade">
                                                          <img src="{{asset('public/page/img/electronics-15-540x600.jpg')}}" alt="product thumb">
                                                      </div>
                                                      <div id="thumb2" class="tab-pane fade">
                                                          <img src="{{asset('public/page/img/furniture-14.jpg')}}" alt="product thumb">
                                                      </div>
                                                      <div id="thumb3" class="tab-pane fade">
                                                          <img src="{{asset('public/page/img/furniture-17.jpg')}}" alt="product thumb">
                                                      </div>
                                                      <div id="thumb4" class="tab-pane fade">
                                                          <img src="{{asset('public/page/img/furniture-7.jpg')}}" alt="product thumb">
                                                      </div>
                                                      <div id="thumb5" class="tab-pane fade">
                                                          <img src="{{asset('public/page/img/electronics-15-540x600.jpg')}}" alt="product thumb">
                                                      </div>
                                                      <div id="thumb6" class="tab-pane fade">
                                                          <img src="{{asset('public/page/img/furniture-14.jpg')}}" alt="product thumb">
                                                      </div>
                                                      <div id="thumb7" class="tab-pane fade">
                                                          <img src="{{asset('public/page/img/furniture-17.jpg')}}" alt="product thumb">
                                                      </div>
                                                      <div id="thumb8" class="tab-pane fade">
                                                          <img src="{{asset('public/page/img/furniture-7.jpg')}}" alt="product thumb">
                                                      </div>
                                                  </div>
                                                  <div class="product-thumbnail">
                                                      <div class="thumb-menu owl-carousel" id="thumbmenu">
                                                          <div class="thumb-menu-item">
                                                              <a href="#thumb1" data-toggle="tab" class="nav-link active">
                                                                  <img src="{{asset('public/page/img/book-15-150x167.jpg')}}" alt="product thumb">
                                                              </a>
                                                          </div>
                                                          <div class="thumb-menu-item">
                                                              <a href="#thumb2" data-toggle="tab" class="nav-link">
                                                                  <img src="{{asset('public/page/img/furniture-14-150x167.jpg')}}" alt="product thumb">
                                                              </a>
                                                          </div>
                                                          <div class="thumb-menu-item">
                                                              <a href="#thumb3" data-toggle="tab" class="nav-link">
                                                                  <img src="{{asset('public/page/img/furniture-17-150x167.jpg')}}" alt="product thumb">
                                                              </a>
                                                          </div>
                                                          <div class="thumb-menu-item">
                                                              <a href="#thumb4" data-toggle="tab" class="nav-link">
                                                                  <img src="{{asset('public/page/img/furniture-7-150x167.jpg')}}" alt="product thumb">
                                                              </a>
                                                          </div>
                                                          <div class="thumb-menu-item">
                                                              <a href="#thumb5" data-toggle="tab" class="nav-link active">
                                                                  <img src="{{asset('public/page/img/book-15-150x167.jpg')}}" alt="product thumb">
                                                              </a>
                                                          </div>
                                                          <div class="thumb-menu-item">
                                                              <a href="#thumb6" data-toggle="tab" class="nav-link">
                                                                  <img src="{{asset('public/page/img/furniture-14-150x167.jpg')}}" alt="product thumb">
                                                              </a>
                                                          </div>
                                                          <div class="thumb-menu-item">
                                                              <a href="#thumb7" data-toggle="tab" class="nav-link">
                                                                  <img src="{{asset('public/page/img/furniture-17-150x167.jpg')}}" alt="product thumb">
                                                              </a>
                                                          </div>
                                                          <div class="thumb-menu-item">
                                                              <a href="#thumb8" data-toggle="tab" class="nav-link">
                                                                  <img src="{{asset('public/page/img/furniture-7-150x167.jpg')}}" alt="product thumb">
                                                              </a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>

                                              <div class="col-md-7">
                                                  <div class="modal-box product">

                                                      <h3 class="product-title"></h3>
                                                      <div class="product-price">
                                                          <span class="regular-price">$100.50</span>
                                                          <span class="sale-price">$98.98</span>

                                                      </div>
                                                      <a class="product-link" href="single-product.html">See all featurs</a>
                                                      <p class="product-availability">200 In Stock</p>
                                                      <div class="product-action-wrapper">
                                                          <div class="quantity">
                                                              <input type="number" class="quantity-input" name="qty" id="qty" value="1" min="1">
                                                          </div>
                                                          <button type="button" class="btn btn-style-1 add-to-cart color-3">
                                                              Add To Cart
                                                          </button>
                                                      </div>
                                                      <p class="product-desc">Long printed dress with thin adjustable straps. V-neckline and wiring under the bust with ruffles at the bottom of the dress.</p>
                                                      <div class="social-share">
                                                          <h4>Share This Product</h4>
                                                          <ul class="social boxed-social">
                                                              <li class="social__item"><a href="" class="social__link facebook"><i class="fa fa-facebook"></i></a></li>
                                                              <li class="social__item"><a href="" class="social__link twitter"><i class="fa fa-twitter"></i></a></li>
                                                              <li class="social__item"><a href="" class="social__link google-plus"><i class="fa fa-google-plus"></i></a></li>
                                                              <li class="social__item"><a href="" class="social__link pinterest"><i class="fa fa-pinterest"></i></a></li>
                                                              <li class="social__item"><a href="" class="social__link linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
{{-- end modal --}}
                                  <!-- Category products area End -->

                                <!-- Category products area Start -->
                                <div class="category-porducts-area section-padding section-sm-padding">
                                    <div class="row align-items-center mb--20">
                                        <div class="col-lg-3 col-md-4">
                                            <div class="section-title title-1 brand-color text-md-left text-center mb-sm--20">
                                                <h2 id="a" style="width: max-content">Sách được đánh giá cao</h2>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-9 col-md-8 text-md-right text-center">
                                            <ul class="category-list list-1 color-3">
                                                <li><a href="shop.html">In-Ear &amp; Earbud</a></li>
                                                <li><a href="shop.html">On-Ear</a></li>
                                                <li><a href="shop.html">Over-Ear</a></li>
                                                <li><a href="shop.html">Sports</a></li>
                                                <li><a href="shop.html">See More</a></li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    {{-- {{dd($danhgia1)}} --}}
                                    <div class="row no-gutters">
                                        <div class="col-12">
                                            <div class="category-porducts-wrapper bg--white">
                                                <div class="category-product-carousel owl-carousel js-category-product-carousel-2">
                                                    @foreach($danhgia1 as $g)

                                                    <div class="product-box product-box-hover-up hover-up-2 color-3">

                                                        <div class="product-box__img">
                                                            <img src="{{asset('public/upload/products/')}}/{{$g->book_image}}" alt="product" class="primary-image">
                                                            <img src="{{asset('public/upload/products/')}}/{{$g->book_image}}" alt="product" class="secondary-image">
                                                        <a href="#" data-toggle="modal" data-target="#productModal1" id="sp" data-sp-ma="{{$g->id}}" class="product-box__quick-view"><i class="fa fa-search"></i></a>
                                                        </div>
                                                        <div class="product-box__content">
                                                        <h3 class="product-box__title"><a href="{{route('b.detail',[$g->id])}}">{{$g->book_title}}</a></h3>
                                                            <div class="ratings">
                                                                @if($g->book_tbc)
                                                                    @if($g->book_tbc<1.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    @elseif($g->book_tbc<2.5 && $g->book_tbc >=1.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    @elseif($g->book_tbc<3.5 && $g->book_tbc >=2.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>

                                                                        @elseif($g->book_tbc <4.5 && $g->book_tbc >= 3.5)
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        @elseif($g->book_tbc >=4.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                    @endif
                                                                    @endif
                                                                    <div class="bui-review-score__badge">
                                                                        @if($g->book_tbc)
                                                                            {{$g->book_tbc}}
                                                                        @else
                                                                        ?
                                                                        @endif
                                                                    </div>
                                                            </div>
                                                            <div class="product-box__price">
                                                                @if(isset($g->book_sale))
                                                                <span class="regular-price"> {{number_format($g->book_sale, 0, '.', '.')}}    vnđ</span>
                                                            <span class="sale-price">{{number_format($g->book_price, 0, '.', '.')}} vnđ</span>
                                                            @else
                                                            <span class="sale-price">{{number_format($g->book_price, 0, '.', '.')}} vnđ</span>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="product-box__action action-3">
                                                            <a href="wishlist.html" class="add-to-wishlist" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i></a>
                                                        <a href="{{route('addcart',['id'=>$g->id])}}" class="add-to-cart" data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-bag"></i></a>
                                                            <a href="compare.html" class="add-to-compare" data-toggle="tooltip" data-placement="top" title="Add to compare"><i class="fa fa-refresh"></i></a>
                                                        </div>

                                                    </div>


                  {{-- start --}}


{{-- end --}}

{{-- end --}}
@endforeach

                                                </div>
                                                <div class="promo-box">
                                                    <a href="#"><img src="{{asset('public/page/img/home8-banner4.jpg')}}" alt="promo"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Category products area End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Wrapper End -->


@endsection
