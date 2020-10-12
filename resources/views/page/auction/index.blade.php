@extends('page.layout')
@section('title','Sản phẩm')
<head>
    <style>
        img.mfp-img {
    max-height: 776px!important;
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
.modal-content {
    min-height: 324px;
    font-size: x-large;
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
                     @if(Auth::check())
                          <button type="button" style="background-color:red" class="btn add-to-cart btn-style-2 color-2"
                         data-toggle="modal" data-target="#exampleModal" >Đấu giá</button>
                         @else


                         <button type="button" style="background-color:red" class="btn add-to-cart btn-style-2 color-2"
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

                                            <div class="thumb-menu-item">
                                                <a style="height: auto;" href="#product-large-one" data-toggle="tab" class="nav-link active">
                                                    <img style="height: auto;" src="{{asset('public/upload/products/')}}/{{$book->auction_book_image}}" alt="product thumb">
                                                </a>
                                            </div>


                                        </div>
                                        <br>
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
                                @php
// $a = Carbon\Carbon::now();
// $a = strtotime($a);
$a1 = $sp1->Endtime_auction_date;
$a1 = strtotime($sp1->Endtime_auction_date);
// dd($a);
// dd($a1);
$a =$a1  - $time;
@endphp
                                <div class="col-lg-6">
                                    <!-- Single Product Content Start -->
                                    <div class="single-product__content">
                                        <div class="single-product__top">
                                            <h2 style="    line-height: 35px;" class="single-product__name">{{$book->auction_book_title}}</h2>
                                            <div class="ratings-wrap">
                                                Thời gian sách bắt đầu lên sàn đấu giá:
                                                <button type="button" id = "recipient-name" disabled style="background-color:red" class="btn add-to-cart btn-style-2 color-2"
                                                 >{{date('H:i d-m-Y', $a)}}</button>
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

                                                <div class="single-product__price"> Giá khởi điểm
                                                    {{-- <button type="button" id = "recipient-name" disabled style="background-color:red" class="btn add-to-cart btn-style-2 color-2"
                                                    >
                                                    {{ number_format($book->auction_book_reserve_price,0,',','.') }} đ
                                                </button> --}}
                                                    <span class="sale-price">{{ number_format($book->auction_book_reserve_price,0,',','.') }} đ</span>

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

                                        <p class="single-product__short-desc"></p>
                                            <p class="product-availability"><i class="fa fa-check-circle"></i>Còn {{$book->book_amount}} cuốn</p>
                                          @if(Auth::user()->id != $book->id_account)
                                            <div class="product-action-wrapper">
                                                <div class="quantity">
                                                    <input type="number" class="quantity-input" name="qty" id="qty1" value="1" min="1">
                                                </div>
                                                <a href="{{Route('addcart',['id' => $book->id])}}" class="btn add-to-cart btn-style-1 color-1">
                                                    Giỏ hàng
                                                </a>
                                            </div>
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
                                                <button  data-toggle="modal" data-target="#exampleModal1" type="button" class="btn btn-primary chat-facebook">
                                                   <i class="fa fa-comments-o" aria-hidden="true"></i>
                                                        Chat ngay
                                                    </button>
                                                    @else
                                                    <button  data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-primary chat-facebook">
                                                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                                                             Chat ngay
                                                         </button>
                                                    @endif

                                                {{-- </a> --}}
                                                {{-- <button type="button" style="background-color:red" class="btn add-to-cart btn-style-2 color-2"
                                                data-toggle="modal" data-target="#exampleModal" >Chat ngay</button> --}}
                                                {{-- <button type="button" class="btn btn-outline-primary">Primary</button> --}}
                                                <a href="tel:#">
                                                <button type="button" class="btn btn-info so-hotline">
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
                                                {{-- <h2 class="mb--20">Có {{$evaluate1}} đánh giá hiện tại</h2> --}}
                                                {{-- @foreach($danhgia as $dg)
                                                <div class="review mb--40">
                                                    <div class="review__single">
                                                        <div class="review__avatar">
                                                        <img src="{{asset('public/upload/1.jpg')}}" alt="avatar">
                                                        </div>
                                                        <div class="review__content">
                                                            <p class="review__meta">
                                                            <span class="review__author">{{$dg->info_name}} {{$dg->info_lastname}}</span>
                                                                <span class="review__dash">-</span>

                                                            <span class="review__date">{{ \Carbon\Carbon::parse($dg->created_at)->format('H:m d/m/Y')}}</span>
                                                            </p>
                                                            <p class="review__text">
                                                             {{$dg->evaluate_title}}
                                                            </p>
                                                            <p class="review__text">
                                                                {{$dg->evaluate_content}}
                                                            </p>

                                                            </span>
                                                            <div class="ratings">
                                                                @if($dg->evaluate_rank == 5 )
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star rated"></i>
                                                                @elseif($dg->evaluate_rank == 4)
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                 <i class="fa fa-star"></i>
                                                                @elseif($dg->evaluate_rank == 3 )
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                                @elseif($dg->evaluate_rank == 2)
                                                                <i class="fa fa-star rated"></i>
                                                                <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                                @elseif($dg->evaluate_rank == 1)
                                                                <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                @endforeach --}}

                                                {{-- {{dd($evaluate)}} --}}
                                            {{-- ranking --}}

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
                                    <ul class="product-categories">

                                        {{-- @foreach($theloai as $tl) --}}
                                        <li class="cat-item cat-parent">
                                        <a >Nguyên Văn A</a>
                                        <span style="float: right;" class="badge badge-dark">240.000đ</span>
                                            <ul class="children">
                                                5h ngày 24, tháng 8,2020
                                                {{-- @foreach($tl->subcategory as $stl)
                                                <li class="cat-item">
                                                <a href="{{route('p.subcategory',['id' => $stl->id ])}}">{{$stl->subcategory_name}}</a>
                                                <span style="float: right;" class="badge badge-info">{{$stl->getbook->count()}}</span>
                                                </li>
                                                @endforeach --}}

                                            </ul>
                                        </li>
                                        {{-- @endforeach --}}


                                    </ul>
                                </div>
                            </div>
                            <!-- Product Categories Widget End -->
                            <!-- Product color Widget Start -->
                             <div class="sidebar-widget product-widget product-color-widget">
                                <h3 style=" line-height: 28px!important;" class="widget-title">Khách hàng vừa đấu giá thành công sách trước</h3>
                                <div class="widget_conent">
                                    <ul class="product-color">
                                        <li><a href="">Tên Khách hàng</a><span style="float: right;" class="badge badge-dark">Nguyễn Văn A</span></li>
                                        <li><a href="">Số tiền:</a> <span style="float: right;" class="badge badge-dark">240.000đ</span></li>
                                        <li><a href="">Thời gian</a><span style="float: right;" class="badge badge-dark">15:45 23/9/2020</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Product color Widget End -->
                            <!-- Price Filter Widget Start -->

                            <div class="sidebar-widget product-widget product-color-widget">
                                <h3 style=" line-height: 28px!important;" class="widget-title">Lượt đấu giá tiếp theo</h3>
                                <div class="widget_conent">
                                    <ul class="product-color">
                                        <li><a href="">Tên Khách hàng</a><span style="float: right;" class="badge badge-dark">Nguyễn Văn A</span></li>
                                        <li><a href="">Số tiền:</a> <span style="float: right;" class="badge badge-dark">240.000đ</span></li>
                                        <li><a href="">Thời gian</a><span style="float: right;" class="badge badge-dark">15:45 23/9/2020</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Price Filter Widget End -->

                            <!-- Price Compare Widget Start -->
                            {{-- <div class="sidebar-widget product-widget product-compare-widget">
                                <h3 class="widget-title">Compare</h3>
                                <div class="widget_conent">
                                    <ul>
                                        <li>
                                            <a href="sinngle-product.html">Condimentum furniture</a>
                                            <span class="compare-remove"><i class="fa fa-times"></i></span>
                                        </li>
                                        <li>
                                            <a href="sinngle-product.html">Auctor gravida enim</a>
                                            <span class="compare-remove"><i class="fa fa-times"></i></span>
                                        </li>
                                        <li>
                                            <a href="sinngle-product.html">Condimentum furniture</a>
                                            <span class="compare-remove"><i class="fa fa-times"></i></span>
                                        </li>
                                    </ul>
                                    <div class="compare-widget-bottom">
                                        <a href="#">Clear all</a>
                                        <a href="compare.html" class="sidebar-btn">Compare</a>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- Price Compare Widget End -->

                            <!-- Product Banner Widget Start -->
                            {{-- <div class="sidebar-widget banner-widget">
                                <div class="promo-box full-width bg--white">
                                    <a href="#">
                                        <img src="{{asset('public/page/img/home1-product-banner-1.jpg')}}" alt="promo">
                                    </a>
                                </div>
                            </div> --}}
                            <!-- Product Banner Widget End -->

                            <!-- Product Tags Widget Start -->
                            {{-- <div class="sidebar-widget product-tags-widget">
                                <h3 class="widget-title">Product Tags</h3>
                                <div class="widget_conent">
                                    <div class="tagcloud">
                                        <a href="blog.html" rel="1">chilled</a>
                                        <a href="blog.html" rel="2">dark</a>
                                        <a href="blog.html" rel="3">euro</a>
                                        <a href="blog.html" rel="2">fashion</a>
                                        <a href="blog.html" rel="1">food</a>
                                        <a href="blog.html" rel="4">hardware</a>
                                        <a href="blog.html" rel="3">hat</a>
                                        <a href="blog.html" rel="2">hipster</a>
                                        <a href="blog.html" rel="1">holidays</a>
                                        <a href="blog.html" rel="2">light</a>
                                        <a href="blog.html" rel="1">mac</a>
                                        <a href="blog.html" rel="3">place</a>
                                        <a href="blog.html" rel="2">t-shirt</a>
                                        <a href="blog.html" rel="1">travel</a>
                                        <a href="blog.html" rel="2">video-2</a>
                                        <a href="blog.html" rel="2">white</a>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- Product Tags Widget End -->

                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @if($auctionbook!= null)

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
          <form action="{{route('post.auction',['id' => Auth::user()->id])}}" method="post">

                @csrf
                <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tên khách hàng:</label>
                <button type="button" disabled style="background-color:red" class="btn add-to-cart btn-style-2 color-2"
                data-toggle="modal" data-target="#exampleModal" >{{$auctionbook->account->info->info_lastname}} {{$auctionbook->account->info->info_name}}</button>
              {{-- <input type="text" readonly value="nguyen" class="form-control" id="recipient-name"> --}}
              </div>


              <div class="form-group">
                <label style="font-size: 18px;" for="recipient-name" class="col-form-label">Thời gian sách bắt đầu lên sàn đấu giá: </label>
                <button type="button" id = "recipient-name" disabled style="background-color:red" class="btn add-to-cart btn-style-2 color-2"
              data-toggle="modal" data-target="#exampleModal" >{{date('H:i d-m-Y', $a)}}</button>
              {{-- <input type="text" readonly value="nguyen" class="form-control" id="recipient-name"> --}}
              </div>
              <br>
              <div class="form-group">

                <label for="message-text" class="col-form-label">Số tiền đấu giá:</label>
                <input id="myNumber" type="number" step="1000"  class="currency" min="1000" max="2500000" value="25000" />
                {{-- <h3 id="dong"> --}}
                    vnđ
                {{-- </h3> --}}
              </div>
              {{-- <button  class="btn add-to-cart btn-style-1 color-3"  onclick="myFunction()">Tăng thêm 10K</button> --}}


            </form>
          </div>
          <div class="modal-footer">
            <button type="button" style="background-color: darkgray;" class="btn btn-4 btn-style-3" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-4 btn-style-2">Đấu giá</button>
          </div>
        </div>
      </div>
    </div>
    @endif
    {{-- <script>
        function myFunction() {
        //   document.getElementById("myNumber").stepUp(5);
        }
        </script> --}}
    <script>
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
// location.reload();
setTimeout(function(){  location.reload(); }, 3000);
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
@endsection

