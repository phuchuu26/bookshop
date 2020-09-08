@extends('page.layout')
@section('title','Sản phẩm')
<head>
    <style>
        .ratings {
            margin-left: 60px;
        }
        span.sale-price.a {
    margin-right: 80px;
}
span.sale-price.a {
    margin-left: 75px;
}
        .product-box.product-box-hover-down.bg--white.color-1 {
    min-height: 414px;
}
        .gia {
    font-size: 20px;
    color: #34495e;
    font-weight: bold;
}
        button.sidebar-btn {
    margin-top: 18px;
    margin-right: 90px;
    margin-bottom: -20px;
}
input#amount {
    /* margin: 10px 30px; */
    min-width: 31px;
    max-width: 190px;
}
        i{
    /* padding-bottom: -10px; */
    padding-top: 6px;
}
        .a {
    margin-left: 69px;
    margin-top: 4px;
}
.bui-review-score__badge {
    margin-right: 34px;
}
    </style>
</head>
@section('page_content')

	<div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('p.home')}}">Trang chủ</a></li>
                        <li class="current">
                            {{-- {{dd($book)}} --}}
                        <a>Thể loại sách</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Wrapper Start -->
    <main id="content" class="main-content-wrapper">
        <div class="shop-area pt--10 pb--80 pt-sm--30 pb-sm--60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-2 mb-md--40">
                        <!-- Shop Toolbar Start -->
                        <div class="shop-toolbar">
                            <div class="shop-toolbar__grid-list">
                                <ul class="nav">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#grid"><i class="fa fa-th"></i></a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#list"><i class="fa fa-list"></i></a>
                                    </li>
                                </ul>
                            </div>
                            {{-- <div class="shop-toolbar__shorter">
                                <label>Short By:</label>
                                <select class="short-select nice-select">
                                    <option value="1">Relevance</option>
                                    <option value="2">Name, A to Z</option>
                                    <option value="3">Name, Z to A</option>
                                    <option value="4">Price, low to high</option>
                                    <option value="5">Price, high to low</option>
                                </select>
                            </div> --}}
                            <span class="shop-toolbar__product-count">Có <span style="color:blue">{{$book2}}</span> sản phẩm</span>
                        </div>
                        <!-- Shop Toolbar End -->

                        <!-- Shop Layout Start -->
                        <div class="main-shop-wrapper">
                            <div class="tab-content" id="myTabContent-2">
                                <div class="tab-pane show active" id="grid">
                                    <div class="product-grid-view three-column">
                                        <div class="row no-gutters">

                                            @foreach($book as $books)

                                            <div class="col-md-4 col-sm-6">
                                                <div class="product-box product-box-hover-down bg--white color-1">
                                                    <div class="product-box__img">
                                                        <img src="{{asset('public/upload/products')}}/{{$books->book_image}}" alt="product" style="height: 250px; width: 278px; margin-top: 20px;">

                                                        <a href="" data-toggle="modal" data-target="#productModal" class="product-box__quick-view"><i class="fa fa-search"></i></a>
                                                    </div>


                                                    <div class="product-box__content">
                                                        <h3 class="product-box__title"><a href="{{route('b.detail',['id'=> $books->id])}}">{{$books->book_title}}</a></h3>

                                                        <div class="ratings">
                                                            @if($books->book_tbc)
                                                            @if($books->book_tbc<1.5)
                                                            <i class="fa fa-star rated"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            @elseif($books->book_tbc<2.5 && $books->book_tbc >=1.5)
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            @elseif($books->book_tbc<3.5 && $books->book_tbc >=2.5)
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>

                                                                @elseif($books->book_tbc <4.5 && $books->book_tbc >= 3.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                @elseif($books->book_tbc >=4.5)
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                            @endif
                                                            @endif
                                                            <div class="bui-review-score__badge">
                                                                @if($books->book_tbc)
                                                                    {{$books->book_tbc}}
                                                                @else
                                                                ?
                                                                @endif
                                                            </div>
                                                        </div>

                                                        @if($books->book_sale == 0)
                                                            <div class="product-box__price">
                                                                <span class="sale-price a">{{ number_format($books->book_price,0,',','.') }} đ</span>
                                                            </div>
                                                        @else
                                                            <div class="product-box__price">
                                                                <span class="regular-price a">{{ number_format($books->book_sale,0,',','.') }}  đ</span>
                                                                <span class="sale-price a">{{ number_format($books->book_price,0,',','.') }} đ</span>
                                                            </div>
                                                        @endif


                                                    </div>
                                                    <div class="product-box__action action-2">

                                                        <a href="wishlist.html" class="add-to-wishlist" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i></a>

                                                        <a  href="{{Route('addcart',['id' => $books->id])}}" class="add-to-cart" data-toggle="tooltip" data-placement="top" title="Giỏ hàng"><i class="fa fa-shopping-bag"></i> Giỏ hàng</a>

                                                        <a href="compare.html" class="add-to-compare" data-toggle="tooltip" data-placement="top" title="Add to compare"><i class="fa fa-refresh"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            @endforeach




                                        </div>

                                          </br>

                                                <nav>

                                                   {!! $book->links() !!}

                                                </nav>
                                    </div>
                                </div>
                                <div class="tab-pane" id="list">
                                    <div class="product-list-view">


                                        {{-- show sản phẩm 2 --}}
                                        @foreach($book as $books)

                                        <div class="product-box product-box--list bg--white">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="product-box__img">
                                                        <img src="{{asset('public//upload/products/')}}/{{$books->book_image}}" alt="product" >

                                                        <a href="" data-toggle="modal" data-target="#productModal" class="product-box__quick-view"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="product-box__content">
                                                        <h3 class="product-box__title"><a href="single-product.html">{{$books->book_title}}</a></h3>


                                                        <div class="ratings">
                                                            @if($books->book_tbc)
                                                            @if($books->book_tbc<1.5)
                                                            <i class="fa fa-star rated"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            @elseif($books->book_tbc<2.5 && $books->book_tbc >=1.5)
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            @elseif($books->book_tbc<3.5 && $books->book_tbc >=2.5)
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>

                                                                @elseif($books->book_tbc <4.5 && $books->book_tbc >= 3.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                @elseif($books->book_tbc >=4.5)
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                            @endif
                                                            @endif
                                                            <div class="bui-review-score__badge">
                                                                @if($books->book_tbc)
                                                                    {{$books->book_tbc}}
                                                                @else
                                                                ?
                                                                @endif
                                                            </div>
                                                        </div>


                                                        @if($books->book_sale == 0)
                                                            <div class="product-box__price">
                                                                <span class="sale-price">{{ number_format($books->book_price,0,',','.') }} đ</span>
                                                            </div>
                                                        @else
                                                            <div class="product-box__price">
                                                                <span class="regular-price">{{ number_format($books->book_sale,0,',','.') }}  đ</span>
                                                                <span class="sale-price">{{ number_format($books->book_price,0,',','.') }} đ</span>
                                                            </div>
                                                        @endif


                                                        <p class="product-box__desc">
                                                            Sách còn {{$books->book_amount}} cuốn. Số trang : {{$books->book_numberpage}} trang. Có trọng lượng : {{$books->book_weight}} kg. Năm phát hành: {{$books->book_releasedate}} <br>
                                                            Số lượt xem sách:
                                                            @if($books->views){{$books->views}} lượt
                                                            @else
                                                            0 lượt
                                                            @endif
                                                        </p>
                                                        <div class="product-box__action action-4">
                                                            <a href="{{Route('addcart',['id' => $books->id])}}" class="add-to-cart" data-toggle="tooltip" data-placement="top" title="Add to cart"><i class="fa fa-shopping-bag"></i> Thêm vào giỏ hàng</a>
                                                            <a href="wishlist.html" class="add-to-wishlist" data-toggle="tooltip" data-placement="top" title="Thêm vào danh sách yêu thích"><i class="fa fa-heart-o"></i></a>
                                                            <a href="compare.html" class="add-to-compare" data-toggle="tooltip" data-placement="top" title="So sánh"><i class="fa fa-refresh"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach

                                            <nav>
                                               {!! $book->links() !!}
                                            </nav>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Shop Layout End -->
                    </div>
                   @include('page.sidebar')
                </div>
            </div>
        </div>
    </main>
    <!-- Main Wrapper End -->
   <script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>
   <!-- Latest compiled and minified CSS -->

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>

   {!! Toastr::message() !!}
@endsection
