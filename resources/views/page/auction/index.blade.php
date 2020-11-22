@extends('page.layout')
@section('title','Sản phẩm')
<head>
    <style>

li.cat-item.cat-parent ul.children.breadcrumb li:not(:last-child):after, .widget-menu li:before, .product-categories .cat-item.cat-parent:after, .accordion__link:after {
    position: absolute;
    font-family: fontAwesome;
    /* line-height: 1; */
    line-height: 2!important;
    margin-right: -9px!important;
    margin-top: 3px!important;
}
        /* ::after {
    margin-top: 11px;
    margin-right: -12px;
} */
        span#price_bidder {
    margin-top: 15px;
}




        /* .row.custom-row {
    margin-left: -62px;
} */
        span.ten {
    padding-left: 15px;
    padding-right: 15px;
}
        ul.breadcrumb {
            min-width: 1200px;
            margin-left: -60px;
}
.container {
    margin-left: 190px!important;
}
        aside.sidebar {
            min-width: 330px;
    margin-left: -60px;
}
        span.ten {
    /* padding-left: 31px; */
}
        img.memo {
    border: 4px solid#343a40;
    /* border: 2px solid red; */
    margin-right: -7px;
}
        img.memo {
    width: 50px;
    border-radius: 55px;
    height: 50px;
}


li.cat-item.cat-parent.selected span.ten.badge.badge-info{
    /* font-size: 100px; */
  /* color:transparent!important; */
  /* font-size: 18px; */
  /* background-color:transparent!important; */
  /* -webkit-background-clip: text!important; */
  background-image: linear-gradient(to right ,#fbc531, #f00, #ff0, #0ff, #0f0,#5e5eef,#f1c40f,white,#fc6441,#8c7ae6,#00a8ff)!important;;
  animation: animate 10s  linear infinite!important;;
  background-size: 1000%!important;
}
li.cat-item.cat-parent.selected img.memo  {
    /* font-size: 100px; */
    border: 4px solid transparent!important;
  color:transparent!important;
  /* font-size: 18px; */
  /* background-color:transparent!important; */
  /* -webkit-background-clip: text!important; */
  background-image: linear-gradient(to left ,#fbc531, #f00, #ff0, #0ff, #0f0,#5e5eef,#f1c40f,white,#fc6441,#8c7ae6,#00a8ff)!important;;
  animation: animate1 10s  linear infinite!important;;
  background-size: 1000%!important;;
}
@keyframes animate{
  0%
  {
    background-position:0% 100%;
  }
  50%
  {
    background-position:100% 0%;
  }
  100%
  {
    background-position:0% 100%;
  }
}
@keyframes animate1{
  0%
  {
    background-position:100% 0%;
  }
  50%
  {
    background-position:0% 100%;
  }
  100%
  {
    background-position:100% 0%;
  }
}
.modal-content {
    min-height: 202px;
    font-size: x-large;
}

        a#new {
    /* top: -3px; */
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    position: absolute;
    padding-bottom: -15px;
    padding-top: -25px!important;
    /* top: -3px; */
    top: -66px!important;
    padding: -4px 0;
    /* top: 15px; */
    left: -34px;
    width: 35px;
    background-color: #ffc107;
    color: #fff;
    left: -37px;
    line-height: -1px;
    align-items: center;
    font: bold 15px sans-serif;
    color: #333;
    text-align: center;
}
        li.cat-item {
    margin-bottom: 14px;
}
        img.mfp-img {
    max-height: 676px!important;
    /* padding-top: 114px; */
}
        .thumb-menu-item.slick-slide.slick-current.slick-active {
    height: auto;
}
        .modal-content {
    margin-top: 50px!important;
}
        button.btn.btn-4.btn-style-3:hover {
    background-color: black!important;
}
        input#myNumber {
            border: none;
            margin-right: -7px;
            /* overflow: hidden; */
    /* border-inline-end-style: none; */
    text-align-last: right;
}

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


input#recipient-name {
    font-size: 27px;
    min-height: 47px;
}
/* .modal-content {
    min-height: 324px;
    font-size: x-large;
} */
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
                        <a>Sàn đấu giá trực tuyến</a>
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
                        <div id="demo1" style=" font-size: 22px;
                        display: flex;  justify-content: center;
                    " class="content">
                        </div>
                     @if(Auth::check() )
                     @if($book)
                        @if(Auth::user()->level != 1 && Auth::user()->id != $book->id_account )
                          <button type="button" style="background-color:red;    margin-left: 385px;" class="btn add-to-cart btn-style-2 color-2"
                         data-toggle="modal" data-target="#exampleModal" >Đấu giá</button>
                         @endif
                         @endif
                         @else


                         <button type="button" style="background-color:red;    margin-left: 385px;" class="btn add-to-cart btn-style-2 color-2"
                         data-toggle="modal" data-target="#exampleModal1" >Đấu giá</button>

<!-- Modal -->
                                <div style="max-height:370px" class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog " style="  font-size:20px;  padding-top: 100px;" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" style="  font-size:30px; "id="exampleModalLabel">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div  style="max-height:120px" class="modal-body">
                                        Bạn cần đăng nhập nếu muốn đánh giá
                                        </div>
                                        <div  class="modal-footer">
                                        <button style="  font-size:12px;" type="button" class="btn add-to-cart btn-style-2 color-2" data-dismiss="modal">Đóng</button>
                                        <button style=" color:white; font-size:12px;" type="button" class="btn add-to-cart btn-style-2 color-2"> <a style=" color:white;" href="{{route('p.login')}}"> Đăng nhập</a></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                            @endif
                        <!-- Shop Toolbar Start -->
                        <div class="shop-toolbar">
                            <div class="shop-toolbar__grid-list">

                                <ul style="font-size: 45px;display: flex;  justify-content: center;
                                 width:870px;" class="nav timer">
                                    {{-- {{time}}  --}} <div  id="demo">

                                    </div>



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
                            {{-- <span class="shop-toolbar__product-count">Có <span style="color:blue">{{$book2}}</span> sản phẩm</span> --}}
                        </div>
                        @if($book != null)
                        <section class="single-product bg--white pt--30 pb--80 pt-sm--60 pb-sm--60">
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Tab Content Start -->
                                    <div class="tab-content product-thumb-large" id="myTabContent-3">

                                        <div class="tab-pane fade show active" id="product-large-one">
                                            <div class="single-product__img easyzoom">
                                                <img id="imgsp" src="{{asset('public/upload/products/')}}/{{$book->auction_book_image}}" alt="product">
                                                <a id="imgdetail" class="popup-btn" href="{{asset('public/upload/products/')}}/{{$book->auction_book_image}}"><i class="fa fa-search-plus"></i>Large Image</a>

                                            </div>
                                        </div>

                                    </div>
                                    <!-- Tab Content End -->

                                    <!-- Product Thumbnail Carousel Start -->
                                    <div class="product-thumbnail">
                                        <div style="height: auto;" class="thumb-menu product-thumb-menu" id="thumbmenu-horizontal">
                                            @if($book->image_auction)
                                            @foreach($book->image_auction as $image)
                                            {{-- {{dd($book->image_auction)}} --}}
                                            <div style="max-height: 50px;" class="thumb-menu-item">
                                                <a style="height: auto;" href="#product-large-one" data-toggle="tab" class="nav-link active">
                                                    <img   style="height: auto;" src="{{asset('public/upload/detail/')}}/{{$image->image_auction_name}}" alt="product thumb">
                                                    <a  class="popup-btn" href="{{asset('public/upload/detail/')}}/{{$image->image_auction_name}}" hidden></a>

                                                </a>
                                            </div>

                                            @endforeach
                                            @endif



                                        </div>
                                        {{-- <br> --}}
                                        <br>
                                        <br>
                                        <br>
                                        <div class="social-buttons">
                                            <a href="facebook.com" class="facebook social-button">
                                                <i class="fa fa-facebook"></i>
                                                <span>Like</span>
                                            </a>
                                            <a href="twitter.com" class="twitter social-button">
                                                <i class="fa fa-twitter"></i>
                                                <span>Tweet</span>
                                            </a>
                                            <a href="plus.google.com" class="gplus social-button">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </div>
                                        <div class="social-share">
                                            <strong>Chia sẻ sách</strong>
                                            <ul class="social">
                                                <li class="social__item"><a href="facebook.com" class="social__link"><i class="fa fa-facebook social__icon"></i></a></li>
                                                <li class="social__item"><a href="twitter.com" class="social__link"><i class="fa fa-twitter social__icon"></i></a></li>
                                                <li class="social__item"><a href="plus.google.com" class="social__link"><i class="fa fa-google-plus social__icon"></i></a></li>
                                                <li class="social__item"><a href="pinterest.com" class="social__link"><i class="fa fa-pinterest social__icon"></i></a></li>
                                                <li class="social__item"><a href="pinterest.com" class="social__link"><i class="fa fa-linkedin social__icon"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Product Thumbnail Carousel End -->
                                </div>


                                <div class="col-lg-6">
                                    <!-- Single Product Content Start -->
                                    <div class="single-product__content">
                                        <div class="single-product__top">
                                            <h2 style="    line-height: 35px;" class="single-product__name">{{$book->auction_book_title}}</h2>
                                            <div class="ratings-wrap" style=" place-content: center;">
                                                Thời gian sách bắt đầu lên sàn đấu giá:
                                                <button type="button" id = "recipient-name" disabled style="background-color:red" class="btn add-to-cart btn-style-2 color-2"
                                                 >{{date('H:i d-m-Y', strtotime($book->endtime->starttime_auction_date))}}</button>
                                                {{-- <div class="ratings">
                                                    @if($tbc<1.5)
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    @elseif($tbc<2.5 && $tbc >=1.5)
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    @elseif($tbc<3.5 && $tbc >=2.5)
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>

                                                        @elseif($tbc <4.5 && $tbc >= 3.5)
                                                            <i class="fa fa-star rated"></i>
                                                            <i class="fa fa-star rated"></i>
                                                            <i class="fa fa-star rated"></i>
                                                            <i class="fa fa-star rated"></i>
                                                            <i class="fa fa-star"></i>
                                                        @elseif($tbc >=4.5)
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                    @endif
                                                </div> --}}
                                              {{-- <h4 style="    padding-top: 4px; color:#636e72;">
                                                Đánh giá: &nbsp <h3 style="color:red;">
                                                </h3>
                                              </h4> --}}
                                                {{-- &nbsp &nbsp &nbsp &nbsp --}}
                                                {{-- <br>
                                                <br> --}}
                                                {{-- <span>(Có {{$evaluate1}} khách hàng đánh giá)</span> --}}
                                            </div>

                                            {{-- @if($book->book_sale == 0) --}}

                                                <div class="single-product__price"> Giá khởi điểm :
                                                    {{-- <button type="button" id = "recipient-name" disabled style="background-color:red" class="btn add-to-cart btn-style-2 color-2"
                                                    >
                                                    {{ number_format($book->auction_book_reserve_price,0,',','.') }} đ
                                                </button> --}}
                                                    <span class="sale-price">{{ number_format($book->auction_book_reserve_price,0,',','.') }} đ</span>


                                                     {{-- <button type="button" id = "recipient-name" disabled style="background-color:red" class="btn add-to-cart btn-style-2 color-2">
                                                        {{ number_format($book->auction_book_reserve_price,0,',','.') }} đ
                                                    </button> --}}
                                                </div>
                                                @if($curren_money != null)
                                                <div class="single-product__price"> Giá hiện tại :
                                                    {{-- <button type="button" id = "recipient-name" disabled style="background-color:red" class="btn add-to-cart btn-style-2 color-2"
                                                    >
                                                    {{ number_format($book->auction_book_reserve_price,0,',','.') }} đ
                                                </button> --}}
                                                {{-- <button type="button" id = "recipient-name" disabled style="background-color:red" class="btn add-to-cart btn-style-2 color-2">
                                                    {{ number_format($book->auction_book_reserve_price,0,',','.') }} đ
                                                </button> --}}
                                                        <span class="sale-price"> {{ number_format($curren_money->list_bidder_auction_money,0,',','.') }} đ</span>

                                                </div>
                                                @endif
                                                <div class="single-product__price"> Thời gian đấu giá :
                                                    {{-- <button type="button" id = "recipient-name" disabled style="background-color:red" class="btn add-to-cart btn-style-2 color-2"
                                                    >
                                                    {{ number_format($book->auction_book_reserve_price,0,',','.') }} đ
                                                </button> --}}
                                                {{-- <button type="button" id = "recipient-name" disabled style="background-color:red" class="btn add-to-cart btn-style-2 color-2">
                                                    {{ number_format($book->auction_book_reserve_price,0,',','.') }} đ
                                                </button> --}}
                                                <?php

                                                    $dteStart = new DateTime($book->endtime->starttime_auction_date);
                                                    $dteEnd   = new DateTime($book->endtime->Endtime_auction_date);
                                                    $interval = date_diff($dteStart,$dteEnd)
                                                    ?>
                                            <span class="sale-price">{{ $interval->format('%h giờ  %i phút') }}</span>

                                                </div>

                                            {{-- @else

                                                <div class="single-product__price">
                                                    <span class="regular-price">{{ number_format($book->book_sale,0,',','.') }} đ</span>

                                                    <span class="sale-price">{{ number_format($book->auction_book_reserve_price,0,',','.') }} đ</span>
                                                    <br>
                                                    <span > Tiết kiệm :  </span>
                                                    <span style="font-size:18px;color:red;" >
                                                        {{number_format((($book->book_sale-$book->book_price)*100)/$book->book_sale),0,',','.'}}%
                                                    </span>
                                                    <span>( {{($book->book_sale-$book->book_price)}} đ )</span>
                                                </div>

                                            @endif --}}
                                        </div>
                                        <p style="font-size:20px;font-weight: bold;" >&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Thông tin chi tiết</p>

                                        <table class="table table-hover" style="font-size: 15px;">
                                            {{-- <thead>
                                              <tr>

                                                <th scope="col"> </th>
                                                 <th scope="col"></th>
                                              </tr>
                                            </thead> --}}
                                            <tbody>
                                                <tr>
                                                    <th class="table-active" scope="row">Tác giả</th>
                                                    <td colspan="2">{{$book->tacgia->author_name }}</td>

                                                  </tr>
                                                  <tr>
                                                    <th class="table-active" scope="row">Thể loại</th>
                                                    <td colspan="2">{{$book->theloai->subcategory_name}}</td>

                                                  </tr>
                                              <tr>
                                                <th class="table-active" scope="row">Công ty phân phối</th>
                                                <td>{{$book->nhaphanphoi->bookcompany_name}} &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp  &nbsp  &nbsp </td>

                                              </tr>
                                              <tr>
                                                <th class="table-active" scope="row">Năm phát hành</th>
                                              <td>{{$book->auction_book_releasedate}}</td>

                                              </tr>
                                              <tr>
                                                <th class="table-active" scope="row">Loại bìa	</th>
                                                <td colspan="2">Bìa mềm</td>

                                              </tr>
                                              <tr>
                                                <th class="table-active" scope="row">Số trang	</th>
                                              <td colspan="2">{{$book->auction_book_numberpage}} trang</td>

                                              </tr>
                                              <tr>
                                                <th class="table-active" scope="row">Nhà xuất bản	</th>
                                              <td colspan="2">{{$book->nhaxuatban->publishinghouse_name}}</td>

                                              </tr>
                                              <tr>
                                                <th class="table-active" scope="row">Trọng lượng	</th>
                                                <td colspan="2">{{$book->auction_book_weight}} kg</td>

                                              </tr>
                                            </tbody>
                                          </table>

                                        {{-- <p class="single-product__short-desc"></p> --}}
                                        {{-- @if($curren_moneys ) --}}
                                        @if($curren_moneys->count() != 0)
                                            <p class="product-availability"><i class="fa fa-handshake-o" aria-hidden="true"></i>Số lượt đấu giá : {{$curren_moneys->count()}} </p>
                                        <p style="margin-top: -15px;" class="product-availability"><i class="fa fa-user-circle" aria-hidden="true"></i>Số người quan tâm : {{$book->views}}</p>
                                          @endif
                                            {{-- <div class="single-product__btn">
                                                <a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="fa fa-heart-o"></i> Add to Wishlist</a>
                                                <a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add to Compare"><i class="fa fa-refresh"></i> Add to Compare</a>
                                            </div> --}}
                                        </div>
                                        <div class="thongTinShop">
                                            <div class="left">
                                                <img class="logo" width="90px;" src="{{asset('public\storage\users-avatar\avatar.png')}}" alt="">
                                            </div>
                                            <div class="right">
                                                <p class="des">Chủ sở hữu</p>
                                                <h3>
                                                   {{$book->account->info->info_lastname}} {{$book->account->info->info_name}}
                                                </h3>
                                                <p class="moTaShop">
                                                    Sau một thời gian hoạt động, website đã có những bước tiến đáng kể cả về chất lượng và hình thức

                                                </p>
                                                {{-- {{route('user',['id' =>$book->id_account ])}} --}}
                                                {{-- <a href=""> --}}
                                                    @if(Auth::check())
                                                <button style="padding-bottom: 5px;" data-toggle="modal" data-target="#exampleModal1" type="button" class="btn btn-primary chat-facebook">
                                                   <i class="fa fa-comments-o" aria-hidden="true"></i>
                                                        Chat ngay
                                                    </button>
                                                    @else
                                                    <button style="padding-bottom: 5px;" data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-primary chat-facebook">
                                                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                                                             Chat ngay
                                                         </button>
                                                    @endif

                                                {{-- </a> --}}
                                                {{-- <button type="button" style="background-color:red" class="btn add-to-cart btn-style-2 color-2"
                                                data-toggle="modal" data-target="#exampleModal" >Chat ngay</button> --}}
                                                {{-- <button type="button" class="btn btn-outline-primary">Primary</button> --}}
                                                <a href="tel:#">
                                                <button style="padding-bottom: 5px;" type="button" class="btn btn-info so-hotline">
                                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                                        Gọi ngay
                                                    </button>
                                                </a>


                                                <a style="margin-top: 5px;" class="btn btn-outline-primary home " href="{{route('shopuser',['id' => $book->id_account ])}}">
                                                                <i class="fa fa-home" aria-hidden="true"></i>   Xem shop</i></a>


                                            </div>
                                        </div>

                                        <div class="single-product__meta">
                                            <p>
                                                <strong>Thể loại:</strong>

                                                <a href="">{{$book->theloai->category->category_name}}</a>
                                                {{-- <a href="shop.html">Electronics</a> --}}
                                            </p>
                                            <p>
                                                <strong>Danh mục nghệ thuật</strong>
                                                <a href="{{Route('p.subcategory',['id' => $book->id])}}">{{$book->theloai->subcategory_name}}</a>
                                                {{-- <a href="shop.html">Fashion</a> --}}
                                            </p>
                                        </div>

                                    </div>
                                    <!-- Single Product Content End -->
                                </div>

                        </section>
                        <!-- Shop Toolbar End -->


                        <section class="single-product-tab pt--60 pb--40 pt-sm--40 pb-sm--30">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="single-product-tab__head nav nav-tab" id="singleProductTab" role="tablist">
                                        <li class="nav-item single-product-tab__item">
                                            <a class="nav-link single-product-tab__link active" id="nav-desc-tab" data-toggle="tab" href="#nav-desc" role="tab" aria-controls="nav-desc" aria-selected="true">Mô tả</a>
                                        </li>
                                        <li class="nav-item single-product-tab__item">
                                            <a class="nav-link single-product-tab__link" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab" aria-controls="nav-details" aria-selected="true">Tóm tắt thông tin</a>
                                        </li>
                                        {{-- <li class="nav-item single-product-tab__item">
                                            <a class="nav-link single-product-tab__link" id="nav-comment-tab" data-toggle="tab" href="#nav-comment" role="tab" aria-controls="nav-comment" aria-selected="true">Đánh giá </a>
                                        </li> --}}

                                        <li class="nav-item single-product-tab__item">
                                            <a class="nav-link single-product-tab__link" id="nav-review-tab" data-toggle="tab" href="#nav-review" role="tab" aria-controls="nav-review" aria-selected="true">Bình luận- Hỏi đáp</a>
                                        </li>
                                    </ul>
                                    <div class="single-product-tab__content tab-content bg--white">
                                        <div class="tab-pane fade show active" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">
                                            {{-- <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero.</p> --}}
                                            <p class="product-description">
                                                {{$book->auction_book_description}}
                                            </p>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="nav-details" aria-labelledby="nav-details-tab">
                                            <div class="product-additional-info">
                                                <h3>Tình trạng sách</h3>
                                                <div class="table-content table-responsive">
                                                    <table class="shop_attributes">
                                                        <tr>
                                                            <th>Bìa sách</th>
                                                            <td><p>Không quá nát. Còn nguyên vẹn</p></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Trang sách</th>
                                                            <td><p>Còn nguyên vẹn. Không thấm nước</p></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        {{--  đánh giá  --}}
                                        <div class="tab-pane" role="tabpanel" id="nav-comment" aria-labelledby="nav-comment-tab">
                                            {{-- hien thi danh gia all --}}
                                            {{-- @foreach($danhgia as $dg) --}}
                                            <div class="product-review-wrap">


                                            </div>
                                        </div>

                                        <div     style="font-size: 17px;" class="tab-pane" role="tabpanel" id="nav-review" aria-labelledby="nav-review-tab">


                                            <div class="product-review-wrap">
                                                @comments(['model' => $book])
                                            </div>
                                        </div>


                                        {{--    --}}
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endif
                        <!-- Shop Layout Start -->

                        <!-- Shop Layout End -->
                    </div>
                    {{-- hien thi san pham --}}
                    <div class="col-lg-3 order-lg-1">
                        <aside class="sidebar">
                            <!-- Product Categories Widget Start -->
                            <div class="sidebar-widget product-widget product-cat-widget">
                                <h3 style=" line-height: 28px!important;"class="widget-title">Danh sách những khách hàng đã đấu giá:</h3>
                                <div class="widget_conent">
                                    @if($curren_moneys  != null)
                                    <ul id="list_bidder" class="product-categories">

                                        {{-- @foreach($theloai as $tl) --}}
                                        {{-- {{dd($curren_moneys)}} --}}
                                        {{-- @endforeach --}}

                                        @if($curren_moneys->count() != 0)

                                        @foreach($curren_moneys as $cur)
                                        <li class="cat-item cat-parent">
                                            <div class="memo1">
                                                <img class="memo" style="border: 4px solid #17a2b8" src="{{asset('public/storage/users-avatar/')}}/{{$cur->info->avatar}}" alt="product">
                                                <span style="margin-top: 2px;" class="ten badge badge-info">
                                                    <a style="color:white ;" href="{{route('shopuser',['id' => $cur->id_account])}}">{{$cur->info->info->info_lastname}} {{$cur->info->info->info_name}}</a>
                                                </span>

                                                <span id="price_bidder" style="float: right;" class="badge badge-dark">
                                                    {{ number_format($cur->list_bidder_auction_money,0,',','.')}} đ
                                                </span>
                                            </div>
                                            {{-- <span class="count">({{$tl->subcategory->count()}})</span> --}}
                                                <ul class="children">

                                                    <li class="cat-item">
                                                    {{-- <a id="time_bidder" href=""></a> --}}
                                                    <span style="float: right;    margin-top: -10px;" class="badge badge-dark">{{ date_format($cur->created_at,"H:i d/m/Y")}}</span>
                                                    </li>

                                                </ul>
                                        </li>
                                        @endforeach
                                        @endif
                                        @endif


                                            {{-- <li class="cat-item cat-parent">
                                                <a >Nguyên Văn A</a>
                                                <span style="float: right;" class="badge badge-dark">240.000đ</span>
                                                    <ul class="children">
                                                        <span style="float: right;" class="badge badge-info">5h ngày 24, tháng 8,2020</span>


                                                    </ul>
                                                </li> --}}


                                    </ul>

                                </div>
                            </div>
                            <!-- Product Categories Widget End -->
                            <!-- Product color Widget Start -->
                             <div class="sidebar-widget product-widget product-color-widget">
                                <h3 style=" line-height: 28px!important;" class="widget-title">Khách hàng vừa đấu giá thành công sách trước</h3>
                                @if($product_sptruoc != null)
                                <div class="widget_conent">
                                    <ul class="product-categories">
                                        <li id="a" class="cat-parent">
                                            <a  href="">Tên sách:  </a> <br>
                                                {{-- <span class="count"></span> --}}
                                                {{-- color: #fff;    background: content-box;
                                            background-color: #343a40;
                                            padding: 5px;
                                            display: inline-block;
                                            padding: .25em .4em;
                                            font-size: 75%;
                                            font-weight: 700;
                                            text-align: center;
                                            vertical-align: baseline;
                                            border-radius: 9px; --}}
                                            <div class="badge badge-dark" id="name" style="white-space:  initial!important;" >
                                                {{-- {{dd($product_sptruoc)}} --}}
                                               {{$product_sptruoc->auction_book_title}}
                                            </div>
                                                    <ul class="children">

                                                        <li class="cat-item">
                                                        <a  href="">Người đăng:</a>
                                                        <div class="memo1">
                                                            <img class="memo" style="border: 4px solid #17a2b8" src="{{asset('public/storage/users-avatar/')}}/{{$product_sptruoc->account->avatar}}" alt="product">
                                                            <span style="margin-top: 2px; " class="ten badge badge-info">
                                                                <a style="color:white ;" href="{{route('shopuser',['id' => $product_sptruoc->account->id ])}}">
                                                                    {{$product_sptruoc->account->info->info_lastname}} {{$product_sptruoc->account->info->info_name}}
                                                                </a>
                                                            </span>
                                                        </div>
                                                        </li>

                                                    </ul>
                                                    {{-- <ul class="children">

                                                        <li class="cat-item">
                                                        <a  href="">Thời gian sách lên sàn:</a>
                                                        <span style="float: right;" class="badge badge-info">{{ date_format($cur->created_at,"H:i d/m/Y")}}</span>
                                                        </li>

                                                    </ul> --}}
                                            </li>
                                            {{-- {{dd($manWinAuction->info->avatar)}} --}}
                                            <li ><a href="#">Tên Khách hàng: </a>
                                                <div class="memo1">

                                                    <img class="memo" src="{{asset('public/storage/users-avatar/')}}/{{$manWinAuction->info->avatar}}" alt="product">
                                                    <span  style="" class="ten badge badge-dark">
                                                        <a style="color:white ;" href="{{route('shopuser',['id' => $manWinAuction->info->id ])}}">
                                                            {{$manWinAuction->info->info->info_lastname}} {{$manWinAuction->info->info->info_name}}
                                                        </a>
                                                        {{-- {{dd($manWinAuction->info->id)}} --}}
                                                        </span>
                                                    </div>
                                                </li>
                                        <li><a href="#">Giá cao nhất: </a> <span style="float: right;" class="badge badge-dark">{{number_format($manWinAuction->list_bidder_auction_money,0,',','.')}} đ</span></li>
                                        <li><a href="#">Thời gian: </a><span style="float: right;" class="badge badge-dark">{{date_format($manWinAuction->created_at,"H:i d/m/Y")}}</span></li>
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <!-- Product color Widget End -->
                            <!-- Price Filter Widget Start -->
                            <div class="sidebar-widget product-widget product-color-widget">
                                <h3 style=" line-height: 28px!important;" class="widget-title">Lượt đấu giá tiếp theo</h3>
                                @if($quantity>1)
                                {{-- {{dd($quantity)}} --}}
                                <div class="widget_conent">
                                    <ul class="product-categories">

                                        <li class="cat-parent"><a href="">Người đăng: </a>

                                            <div class="memo1">
                                                {{-- {{dd($nextBookAuction->getauction)}} --}}
                                                <img class="memo" src="{{asset('public/storage/users-avatar/')}}/{{$nextBookAuction->getauction->account->avatar}}" alt="product">
                                                <span style=" margin-top: 2px;" class="ten badge badge-dark">
                                                    <a style="color:white ;" href="{{route('shopuser',['id' => $nextBookAuction->getauction->account->id ])}}">{{$nextBookAuction->getauction->account->info->info_lastname}} {{$nextBookAuction->getauction->account->info->info_name}}</a>

                                                </span>
                                                </div>
                                                    </li>
                                        <li id="a" class="cat-parent">
                                            <a  href="">Tên sách:  </a> <br>
                                                {{-- <span class="count"></span> --}}
                                                {{-- color: #fff;    background: content-box;
                                            background-color: #343a40;
                                            padding: 5px;
                                            display: inline-block;
                                            padding: .25em .4em;
                                            font-size: 75%;
                                            font-weight: 700;
                                            text-align: center;
                                            vertical-align: baseline;
                                            border-radius: 9px; --}}
                                            <div class="badge badge-dark" id="name" style="white-space:  initial!important;" >
                                                {{$nextBookAuction->getauction->auction_book_title}}
                                            </div>
                                                    {{-- <ul class="children">

                                                        <li class="cat-item">
                                                        <a  href="">Người đăng:</a>
                                                        <span style="float: right;margin-top: 2px;  " class="badge badge-info">{{$product_sptruoc->account->info->info_lastname}} {{$product_sptruoc->account->info->info_name}}</span>
                                                        </li>

                                                    </ul> --}}
                                                    {{-- <ul class="children">

                                                        <li class="cat-item">
                                                        <a  href="">Thời gian sách lên sàn:</a>
                                                        <span style="float: right;" class="badge badge-info">{{ date_format($cur->created_at,"H:i d/m/Y")}}</span>
                                                        </li>

                                                    </ul> --}}
                                            </li>
                                            @php
                                            $time1 = $nextBookAuction->Endtime_auction_date;
                                            $typeTime = $nextBookAuction->getauction->auction_book_time_type;
                                            $time = $nextBookAuction->getauction->auction_book_time;

                                            if($typeTime == 'Giờ'){
                                                $time = $time * 60 * 60;
                                            }else{
                                                $time = $time * 60;
                                            }
                                            $time1 = strtotime($time1);

                                            $timestillauction = $time1 - $time;
                                            $timestillauction1 = date('H:i d/m/Y', $timestillauction);
                                            // echo $timestillauction1   ;
                                            // die;
                                            @endphp
                                        <li><a href="">Giá khởi điểm: </a> <span style="float: right;    margin-top: 2px;" class="badge badge-dark">{{number_format($nextBookAuction->getauction->auction_book_reserve_price,0,',','.')}} đ</span></li>
                                        <li><a href="">Thời gian: </a><span style="float: right;    margin-top: 2px;" class="badge badge-dark">{{$timestillauction1}}</span></li>
                                    </ul>
                                </div>
                                    @endif
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @if($book != null)
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Thủ tục đấu giá</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <div class="modal-body">
            {{-- {{ route('auction.create.submit',$real_estate->real_estate_id) }} --}}
          <form action="{{route('post.auction')}}" method="post">

                @csrf
                <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tên khách hàng:</label>
                <button type="button" disabled style="background-color:red;float: right;" class="btn add-to-cart btn-style-2 color-2"
                data-toggle="modal" data-target="#exampleModal" >{{$book->account->info->info_lastname}} {{$book->account->info->info_name}}</button>
              {{-- <input type="text" readonly value="nguyen" class="form-control" id="recipient-name"> --}}
              </div>


              <div class="form-group">
                <label style="font-size: 18px;" for="recipient-name" class="col-form-label">Thời gian sách bắt đầu lên sàn đấu giá: </label>
                <button type="button" id = "recipient-name" disabled style="background-color:red;float: right;" class="btn add-to-cart btn-style-2 color-2"
              data-toggle="modal" data-target="#exampleModal" >{{date('H:i d-m-Y',  strtotime($book->endtime->starttime_auction_date))}}</button>
              {{-- <input type="text" readonly value="nguyen" class="form-control" id="recipient-name"> --}}
            </div>
              @if($curren_money != null)
              <div class="form-group">
                <label style="font-size: 18px;" for="recipient-name" class="col-form-label">Mức giá hiện tại: </label>

                <button style="text-transform: lowercase;background-color:red;float: right;" type="button"  disabled  class="btn add-to-cart btn-style-2 color-2"
               >{{ number_format($curren_money->list_bidder_auction_money,0,',','.')}} đ</button>
              {{-- <input type="text" readonly value="nguyen" class="form-control" id="recipient-name"> --}}
              </div>
              @endif
              <br>
              <div class="form-group">
                  @php
// echo('a');
// die;
                if($curren_money != null){

                    $current_money = $curren_money->list_bidder_auction_money;
                }
                else{
                    $current_money = $book->auction_book_reserve_price;
                }
                @endphp
                <label for="message-text" class="col-form-label">Số tiền đấu giá:</label>
                <input id="myNumber" type="number" name="money" step="1000"  class="currency" min="{{$auctionOfMe != null ? $auctionOfMe->list_bidder_auction_money +1000 : $book->auction_book_reserve_price}}" max="10000000" value="{{$current_money+10000}}" />
                <input  type="number" hidden name="id_auction_book"   value="{{$book->id}}" />
                {{-- <h3 id="dong"> --}}
                    đ
                {{-- </h3> --}}
              </div>
              {{-- <button  class="btn add-to-cart btn-style-1 color-3"  onclick="myFunction()">Tăng thêm 10K</button> --}}


            </div>
            <div class="modal-footer">
                <button type="button" style="background-color: darkgray;" class="btn btn-4 btn-style-3" data-dismiss="modal">Đóng</button>
                <button id="action_auction" data-dismiss="modal" type="button" class="btn btn-4 btn-style-2">Đấu giá</button>
            </div>
        </form>
        <script>
            $( "#action_auction" ).click(function() {
                $.ajax({
                    type: "POST",
                    url: '{{route('post.auction')}}',
                    data: {money:$( "#myNumber" ).val(), id_auction_book:$( "input[name = 'id_auction_book']" ).val(),
                    _token: "{{ csrf_token() }}",
                        },
                    success: function( result ) {
                        console.log(result);
                        // {{$current_money }} = result.money;
                        location.replace("{{route('auction_index')}}")
                        swal("Đấu giá thành công!", "", "success");
                    }
                });
            });
        </script>
        </div>
      </div>
    </div>
    @endif
    {{-- {{dd('a')}} --}}
    {{-- <script>
        function myFunction() {
        //   document.getElementById("myNumber").stepUp(5);
        }
        </script> --}}
    <script>
        var quantity = {{$quantity}};
        console.log(quantity);
        var d = new Date();
var n = d.getTime();
var now = n;
// console.log(n);
// document.getElementById("demo").innerHTML = n;



var countDownDate = {{$current_date_time}} *1000 ;
        // console.log(countDownDate - now);
// Update the count down every 1 second
var x = setInterval(function() {
now = now + 1000;
// Find the distance between now an the count down date
var distance = countDownDate - now;
// console.log(distance);
// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
// Output the result in an element with id="demo"
if(days == 0){
    if(hours == 0){
        if(minutes == 0){
            document.getElementById("demo").innerHTML = seconds + " Giây ";
            document.querySelector("#demo").style.color = "red";
        }
        else{
            document.getElementById("demo").innerHTML =
        minutes + " Phút " + seconds + " Giây ";
        document.querySelector("#demo").style.color = "red";
        }
    }
    else{
        document.getElementById("demo").innerHTML =  hours + " Giờ " +
        minutes + " Phút " + seconds + " Giây ";
    }

    }
    else{

        document.getElementById("demo").innerHTML = days + " Ngày " + hours + " Giờ " +
        minutes + " Phút " + seconds + " Giây ";
    }
    document.getElementById("demo1").innerHTML = " Đấu giá đang diễn ra";
// If the count down is over, write some text
    if (distance < 0) {

        clearInterval(x);
        document.querySelector("#demo").style.color = "red";
        document.getElementById("demo").innerHTML = "Kết thúc thời gian đấu giá";
        document.getElementById("demo1").innerHTML = "Vui lòng đợi lượt đấu giá sách tiếp theo";
            if(quantity > 0){
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: '{{route('endAuction',['id'=>$book?$book->id:0])}}',
                    success: function (data) {
                        console.log(data);
                        location.reload();
                    },
                    error: function() {
                        console.log(data);
                    }
                });
            }
// location.reload();
// setTimeout(function(){  location.reload(); }, 6000);
                        Pusher.logToConsole = true;
                        var pusher = new Pusher("5f9437b8677edc9e4714", {
                            cluster: "ap1",
                        });
                        var channel1 = pusher.subscribe('start-auction');
                        console.log(channel1);
                        channel1.bind('App\\Events\\StartAuction', addMessageDemo1);
                        function addMessageDemo1(data) {
                            location.reload();
                        }
                    }

}, 1000);



</script>
    {{-- {{var_dump($date)}} --}}
    {{-- {{dd($s)}} --}}
    <!-- Main Wrapper End -->
   <script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>
   <!-- Latest compiled and minified CSS -->

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>



   {!! Toastr::message() !!}
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <!-- Header Area End Here -->
        <script>
            $(document).ready( function(){

                $("li.cat-item.cat-parent:nth-child(1)").addClass("selected")
                        // var pusher = new Pusher('5f9437b8677edc9e4714', {
                        //     cluster: 'ap1',
                        //     encrypted: true
                        // });
                        Pusher.logToConsole = true;
                        var pusher = new Pusher("5f9437b8677edc9e4714", {
                            // encrypted: true,
                            cluster: "ap1",

                            // authEndpoint: 'http://bookshop.com/chatify/chat/auth',
                            // auth: {
                            //     headers: {
                            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            //     }
                            // }
                        });


                        //Subscribe to the channel we specified in our Laravel Event
                        var channel = pusher.subscribe('auction');
                        console.log(channel);
                        channel.bind('App\\Events\\Auction', addMessageDemo);
                        console.log('chay  dc ');

                        function addMessageDemo(data) {
                            console.log(data);
                            console.log('chay  dc 1');
                            console.log(data.message);
                            money = data.message.list_bidder_auction_money;
                            time = data.message.date;
                            man = data.message.ten;
                            var link = data.message.link;
                            var img = data.message.img;
                            // console.log(ten);

                                            var li = $("<li class='cat-item cat-parent'></li>");
                                            var memo1 = $("<div class='memo1'></div>");
                                            var memo = $(`<img class='memo' style='border: 4px solid #17a2b8' src='{{asset('public/storage/users-avatar/')}}/${img}' alt='product'>`)
                                            var giaSpan = $("<span style='margin-top: 2px;margin-left: 3px;' class='ten badge badge-info'></span>");
                                            var giaA =$(`<a style='color:white;' href='${link}'></a>`);

                                            giaA.html(man);
                                            giaSpan.append(giaA);
                                            b = $("<span  style='float: right;margin-top: 15px;' class='badge badge-dark'></span>");
                                            b.html(money);
                                            c = $("<ul style='display: block;' class='children'></ul>");
                                            d = $("<li class='cat-item'></li>");
                                            f = $("<a id='new' >Mới</a>");
                                            e = $("<span style='float: right;margin-top: -10px;' class='badge badge-dark'></span>");
                                            e.html(time);
                                            d.append(e);
                                            d.append(f);
                                            c.append(d);

                                            memo1.append(memo);
                                            memo1.append(giaSpan);
                                            memo1.append(b);

                                            li.append(memo1);
                                            li.append(c);

                                            console.log(li);
                                        $('#list_bidder').prepend(li);
                        }


                    });


                    </script>

@endsection

