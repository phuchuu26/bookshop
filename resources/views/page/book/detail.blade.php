@extends('page.layout')
@section('title','Chi tiết sản phẩm')
@section('page_content')
<head>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('public/page/css/style.css')}}">
<style>

    .modal-content {
        font-size: 19px;
        margin-top: 100px;
    }

    .star-fake {
        /* font-size: 0;
        line-height: 1;
        position: relative;
        white-space: nowrap;
        display: inline-block;
        margin: 0 auto; */
    }
    img.primary-image {
    max-height: 256px;
}
.product-box.product-box-hover-down.bg--white.color-1 {
    min-height: 388px;
}
    .star-fake svg {
        color: #b8b8b8;
    }

    .star-real {
        display: block;
        position: absolute;
        left: 0px;
        bottom: 0px;
        z-index: 1;
        overflow: hidden;
        /* line-height: 1; */
    }
    a.scroll-to-top {
        /* color: red; */
        background-color: #9fd84a;
    }
    .product-box.product-box-hover-down.bg--white.color-1{

    }
    h3#title {
        min-height: 38px;
    }
    /* #imgsp{
        padding-top: 63px;
    }
    #imgdetail{
        padding-top:50px !important;
    } */
</style>
</head>
	<!-- Breadcumb area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li><a href="{{route('p.home')}}">Trang chủ</a></li>
                        <li><a href="#">Sách</a></li>
                        <li class="current"><a>{{$book->book_title}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb area End -->

    <!-- Main Content Wrapper Start -->
    <div class="main-content-wrapper">
        <div class="single-products-area section-padding section-sm-padding" style="padding-top: 10px;">
            <div class="container">
                <!-- Single Product Start -->
                <section class="single-product bg--white pt--30 pb--80 pt-sm--60 pb-sm--60">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Tab Content Start -->
                            <div class="tab-content product-thumb-large" id="myTabContent-3">

                                <div class="tab-pane fade show active" id="product-large-one">
                                    <div class="single-product__img easyzoom">
                                        <img id="imgsp" src="{{asset('public/upload/products/')}}/{{$book->book_image}}" alt="product">
                                        <a id="imgdetail" class="popup-btn" href="{{asset('public/upload/products/')}}/{{$book->book_image}}"><i class="fa fa-search-plus"></i>Large Image</a>
                                    </div>
                                </div>

                            </div>
                            <!-- Tab Content End -->

                            <!-- Product Thumbnail Carousel Start -->
                            <div class="product-thumbnail">
                                <div class="thumb-menu product-thumb-menu" id="thumbmenu-horizontal">

                                    <div class="thumb-menu-item">
                                        <a href="#product-large-one" data-toggle="tab" class="nav-link active">
                                            <img src="{{asset('public/page/img/furniture-13-250x278.jpg')}}" alt="product thumb">
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
                        <div class="col-lg-6">
                            <!-- Single Product Content Start -->
                            <div class="single-product__content">
                                <div class="single-product__top">
                                    <h2 class="single-product__name">{{$book->book_title}}</h2>
                                    <div class="ratings-wrap">

                                        <div class="ratings">
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
                                        </div>
                                        {{-- <p class="product-availability"><i class="fa fa-check-circle"></i>Còn {{$tbc}} cuốn</p> --}}
                                      <h4 style="    padding-top: 4px; color:#636e72;">
                                        Đánh giá: &nbsp <h3 style="color:red;">
                                            {{$tbc}}/5
                                        </h3>
                                      </h4>
                                        &nbsp &nbsp &nbsp &nbsp
                                        <br>
                                        <br>
                                        <span>(Có {{$evaluate1}} khách hàng đánh giá)</span>
                                    </div>

									@if($book->book_sale == 0)

	                                    <div class="single-product__price">
	                                        <span class="sale-price">{{ number_format($book->book_price,0,',','.') }} đ</span>

	                                    </div>

									@else

	                                    <div class="single-product__price">
                                            <span class="regular-price">{{ number_format($book->book_sale,0,',','.') }} đ</span>

                                            <span class="sale-price">{{ number_format($book->book_price,0,',','.') }} đ</span>
                                            <br>
                                            <span > Tiết kiệm :  </span>
                                            <span style="font-size:18px;color:red;" >
                                                {{number_format((($book->book_sale-$book->book_price)*100)/$book->book_sale),0,',','.'}}%
                                            </span>
                                            <span>( {{($book->book_sale-$book->book_price)}} đ )</span>
	                                    </div>

                                    @endif
                                </div>
                                <p style="font-size:20px;font-weight: bold;" >&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp   Thông tin chi tiết</p>

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
                                      <td>{{$book->book_releasedate}}</td>

                                      </tr>
                                      <tr>
                                        <th class="table-active" scope="row">Loại bìa	</th>
                                        <td colspan="2">Bìa mềm</td>

                                      </tr>
                                      <tr>
                                        <th class="table-active" scope="row">Số trang	</th>
                                      <td colspan="2">{{$book->book_numberpage}}</td>

                                      </tr>
                                      <tr>
                                        <th class="table-active" scope="row">Nhà xuất bản	</th>
                                      <td colspan="2">{{$book->nhaxuatban->publishinghouse_name}}</td>

                                      </tr>
                                      <tr>
                                        <th class="table-active" scope="row">Trọng lượng	</th>
                                        <td colspan="2">{{$book->book_weight}} kg</td>

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
                                    <div class="single-product__btn">
                                        <a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="fa fa-heart-o"></i> Add to Wishlist</a>
                                        <a href="compare.html" data-toggle="tooltip" data-placement="top" title="Add to Compare"><i class="fa fa-refresh"></i> Add to Compare</a>
                                    </div>
                                </div>
                                <div class="thongTinShop">
                                    <div class="left">
                                        <img class="logo" width="90px;" src="{{asset('public/storage/users-avatar').'/'.$book->user->avatar }}" alt="">
                                    </div>
                                    <div class="right">
                                        <p class="des">Được bán bởi</p>
                                        <h3>
                                          {{$book->user->info->info_lastname}}
                                          {{$book->user->info->info_name}}
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


                                        <a class="btn btn-outline-primary home " href="{{route('shopuser',['id' => $book->id_account ])}}">
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
                <!-- Single Product End -->

                <!-- Single Product Tab Start -->
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
                                <li class="nav-item single-product-tab__item">
                                    <a class="nav-link single-product-tab__link" id="nav-comment-tab" data-toggle="tab" href="#nav-comment" role="tab" aria-controls="nav-comment" aria-selected="true">Đánh giá </a>
                                </li>

                                <li class="nav-item single-product-tab__item">
                                    <a class="nav-link single-product-tab__link" id="nav-review-tab" data-toggle="tab" href="#nav-review" role="tab" aria-controls="nav-review" aria-selected="true">Bình luận- Hỏi đáp</a>
                                </li>
                            </ul>
                            <div class="single-product-tab__content tab-content bg--white">
                                <div class="tab-pane fade show active" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">
                                    {{-- <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero.</p> --}}
                                    <p class="product-description">
                                        {{$book->book_description}}
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
                                        <h2 class="mb--20">Có {{$evaluate1}} đánh giá hiện tại</h2>
                                        @foreach($danhgia as $dg)
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
                                        @endforeach

                                        {{-- {{dd($evaluate)}} --}}
                                    {{-- ranking --}}
                                    <form  class="form form--review" action="{{ route('write_cmt', ['id'=> $book->id]) }}" method="post">
                                        @csrf
                                        <div class="form__group clearfix mb--20">
                                            {{-- @if($evaluate ==0 ) --}}
                                            <label style="font-size: 20px;" class="form__label d-block">Đánh giá sao</label>
                                            <div  class="rating">
                                                <input type="radio" id="star5" name="rating" value="5"><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                {{-- <input type="radio" id="star4half" name="rating" value="4.5"><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> --}}
                                                <input type="radio" id="star4" name="rating" value="4"><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                {{-- <input type="radio" id="star3half" name="rating" value="3.5"><label class="half" for="star3half" title="Meh - 3.5 stars"></label> --}}
                                                <input type="radio" id="star3" name="rating" value="3"><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                {{-- <input type="radio" id="star2half" name="rating" value="2.5"><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> --}}
                                                <input type="radio" id="star2" name="rating" value="2"><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                {{-- <input type="radio" id="star1half" name="rating" value="1.5"><label class="half" for="star1half" title="Meh - 1.5 stars"></label> --}}
                                                <input type="radio" id="star1" name="rating" value="1"><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                                {{-- <input type="radio" id="starhalf" name="rating" value="0.5"><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> --}}
                                            </div>
                                        </div>
                                        <div class="form__group clearfix mb--20">
                                            <label class="form__label d-block" for="review_name">Tiêu đề đánh giá</label>
                                            <input required id="review_name" name="title" class="form__input form__input--w285">
                                        </div>
                                        <div class="form__group clearfix mb--20">
                                            <label class="form__label d-block" for="review">Nội dung đánh giá</label>
                                            <textarea required id="review" name="content" class="form__input form__input--textarea form__input--2"></textarea>
                                        </div>
                                        {{-- <div class="form__group clearfix mb--20">
                                            <label class="form__label d-block" for="review_email">Email *</label>
                                            <input id="review_email" name="review_email" class="form__input form__input--w285">
                                        </div> --}}
                                        <div class="form__group clearfix">
                                            {{-- hien thi all cac danh gia cua kh --}}


                                                @if(Auth::check())
                                                <button type="submit" class="form__submit" >Gửi</button>
                                                <!-- Button trigger modal -->
                                                @else
                                                        <button type="button" class="form__submit" data-toggle="modal" data-target="#exampleModal">
                                                            Gửi
                                                        </button>

  <!-- Modal -->

                                                                @endif


                                            {{-- @else --}}


                                            {{-- @endif --}}
                                        </div>
                                    </form>
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
                <!-- Single Product Tab End -->

                {{--  Sản phẩm khác của shop  --}}
                {{-- {{dd($pros)}} --}}
                            @if($c_pro == 0)

                            {{-- <h1> sản phẩm không có </h1> --}}
                             @else
                             {{-- {{dd($pros)}} --}}
                                    <section class="related-products-area section-padding section-sm-padding">
                                        <div class="row">
                                            <div class="col-12 mb--20">
                                                <div class="section-title title-1">
                                                    <h2>Sản phẩm khác của shop</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="related-product-carousel owl-carousel product-carousel-hover">
                                                    {{-- @foreach($pros as $pro)
                                                    <div class="related-product">
                                                        <div class="product-box product-box-hover-down bg--white color-1">
                                                            <div class="product-box__img">
                                                            <img src="{{asset('public/upload/products/')}}/{{$pro->book_image}}" alt="product" class="primary-image">
                                                                <img src="{{asset('public/upload/products/')}}/{{$pro->book_image}}" alt="product" class="secondary-image">
                                                            <a href="{{route('b.detail',['id'=>$pro->id])}}" data-toggle="modal" data-target="#productModal" class="product-box__quick-view"><i class="fa fa-search"></i></a>
                                                            </div>
                                                            <div class="product-box__content">
                                                            <h3 id="title" class="product-box__title"><a href="{{route('b.detail',['id'=> $pro->id])}}">{{$pro->book_title}}</a></h3>
                                                                <div class="ratings">
                                                                    @if($pro->book_tbc)
                                                                    @if($pro->book_tbc<1.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    @elseif($pro->book_tbc<2.5 && $pro->book_tbc >=1.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    @elseif($pro->book_tbc<3.5 && $pro->book_tbc >=2.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>

                                                                        @elseif($pro->book_tbc <4.5 && $pro->book_tbc >= 3.5)
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        @elseif($pro->book_tbc >=4.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                    @endif
                                                                    @endif
                                                                </div>
                                                                @if($pro->book_sale == null)
                                                                <div class="product-box__price">
                                                                        <span class="sale-price">{{number_format($pro->book_price,0,',','.')}} đ</span>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <div class="product-box__price">
                                                                <span class="regular-price">{{number_format($pro->book_sale,0,',','.')}} đ</span>
                                                                    <span class="sale-price">{{number_format($pro->book_price,0,',','.')}} đ</span>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="product-box__action action-2">
                                                                <a href="wishlist.html" class="add-to-wishlist" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i></a>
                                                                <a href="{{Route('addcart',['id' => $pro->id])}}" class="add-to-cart" data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-bag"></i>Thêm vào giỏ hàng</a>
                                                                <a href="compare.html" class="add-to-compare" data-toggle="tooltip" data-placement="top" title="Add to compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach --}}
                                                    {{-- </div> --}}
                                                    @foreach($pros as $ca)
                                                    <div class="related-product">
                                                        <div class="product-box product-box-hover-down bg--white color-1">
                                                            <div class="product-box__img">
                                                            <img src="{{asset('public/upload/products/')}}/{{$ca->book_image}}" alt="product" class="primary-image">
                                                                <img src="{{asset('public/upload/products/')}}/{{$ca->book_image}}" alt="product" class="secondary-image">
                                                                <a href="" data-toggle="modal" data-target="#productModal" class="product-box__quick-view"><i class="fa fa-search"></i></a>
                                                            </div>
                                                            <div class="product-box__content">
                                                            <h3 id="title" class="product-box__title"><a href="{{route('b.detail',['id'=> $ca->id])}}">{{$ca->book_title}}</a></h3>
                                                                <div class="ratings">
                                                                    @if($ca->book_tbc)
                                                                    @if($ca->book_tbc<1.5)
                                                                    <i class="fa fa-star rated"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    @elseif($ca->book_tbc<2.5 && $ca->book_tbc >=1.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    @elseif($ca->book_tbc<3.5 && $ca->book_tbc >=2.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>

                                                                        @elseif($ca->book_tbc <4.5 && $ca->book_tbc >= 3.5)
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star rated"></i>
                                                                            <i class="fa fa-star"></i>
                                                                        @elseif($ca->book_tbc >=4.5)
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                        <i class="fa fa-star rated"></i>
                                                                    @endif
                                                                    @endif
                                                                </div>
                                                                @if($ca->book_sale == null)
                                                                <div class="product-box__price">
                                                                        <span class="sale-price">{{number_format($ca->book_price,0,',','.')}} đ</span>
                                                                    </div>
                                                                @else
                                                                <div class="product-box__price">
                                                                <span class="regular-price">{{number_format($ca->book_sale,0,',','.')}} đ</span>
                                                                    <span class="sale-price">{{number_format($ca->book_price,0,',','.')}} đ</span>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="product-box__action action-2">
                                                                <a href="wishlist.html" class="add-to-wishlist" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i></a>
                                                                <a href="{{Route('addcart',['id' => $ca->id])}}" class="add-to-cart" data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-bag"></i> Thêm vào giỏ hàng</a>
                                                                <a href="compare.html" class="add-to-compare" data-toggle="tooltip" data-placement="top" title="Add to compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    @endif
                {{--  Sản phẩm khác của shop  --}}
                @if($ca_pro1 != 0)
                {{--  Sản phẩm liên quan  --}}
                <section class="related-products-area section-padding section-sm-padding">
                    <div class="row">
                        <div class="col-12 mb--20">
                            <div class="section-title title-1">
                                <h2>Sản phẩm liên quan</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            {{-- {{dd($ca_pro)}} --}}
                            <div class="related-product-carousel owl-carousel product-carousel-hover">
                                @foreach($ca_pro as $ca)
                                <div class="related-product">
                                    <div class="product-box product-box-hover-down bg--white color-1">
                                        <div class="product-box__img">
                                        <img src="{{asset('public/upload/products/')}}/{{$ca->book_image}}" alt="product" class="primary-image">
                                            <img src="{{asset('public/upload/products/')}}/{{$ca->book_image}}" alt="product" class="secondary-image">
                                            <a href="" data-toggle="modal" data-target="#productModal" class="product-box__quick-view"><i class="fa fa-search"></i></a>
                                        </div>
                                        <div class="product-box__content">
                                        <h3 id="title" class="product-box__title"><a href="{{route('b.detail',['id'=> $ca->id])}}">{{$ca->book_title}}</a></h3>
                                            <div class="ratings">
                                                @if($ca->book_tbc)
                                                @if($ca->book_tbc<1.5)
                                                <i class="fa fa-star rated"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                @elseif($ca->book_tbc<2.5 && $ca->book_tbc >=1.5)
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                @elseif($ca->book_tbc<3.5 && $ca->book_tbc >=2.5)
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                    @elseif($ca->book_tbc <4.5 && $ca->book_tbc >= 3.5)
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star rated"></i>
                                                        <i class="fa fa-star"></i>
                                                    @elseif($ca->book_tbc >=4.5)
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star rated"></i>
                                                    <i class="fa fa-star rated"></i>
                                                @endif
                                                @endif
                                            </div>
                                            @if($ca->book_sale == null)
                                            <div class="product-box__price">
                                                    <span class="sale-price">{{number_format($ca->book_price,0,',','.')}} đ</span>
                                                </div>
                                            @else
                                            <div class="product-box__price">
                                            <span class="regular-price">{{number_format($ca->book_sale,0,',','.')}} đ</span>
                                                <span class="sale-price">{{number_format($ca->book_price,0,',','.')}} đ</span>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="product-box__action action-2">
                                            <a href="wishlist.html" class="add-to-wishlist" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i></a>
                                            <a href="{{Route('addcart',['id' => $ca->id])}}" class="add-to-cart" data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-bag"></i> Thêm vào giỏ hàng</a>
                                            <a href="compare.html" class="add-to-compare" data-toggle="tooltip" data-placement="top" title="Add to compare"><i class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </section>
                {{--  Sản phẩm liên quan  --}}
                @endif


            </div>


            </div>
        </div>
    </div>
    </div>
    <!-- Main Content Wrapper End -->

   <script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>

   {!! Toastr::message() !!}


<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe1l" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div style="" class="modal-header">
          <h5 style="font-size:22px" class="modal-title" id="exampleModalLabel1">Gửi ý kiến phản hồi hoặc đặt câu hỏi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- {{ route('auction.create.submit',$real_estate->real_estate_id) }} --}}
          <form id="" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">

              @csrf
              <div style="display: -webkit-inline-box;" class="form-group">
                <label for="recipient-name" class="col-form-label"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Tên người bán:</label>
                   <input style="text-align-last: center;min-width: 308px;max-width: 308px;font-size: 20px;margin-top: 2px;margin-left: 20px;" type="text" readonly value="{{$book->user->info->info_lastname.' '.$book->user->info->info_name}}" class="form-control" id="recipient-name">
            </div>
            <br>
            <div style="display: -webkit-inline-box;" class="form-group">

                 <label for="message-text" class="col-form-label"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;Tên sách:</label>
              <input style="text-align-last: center;width: 353px;font-size: 17px;margin-top: 2px;margin-left: 20px;" type="text" readonly value="{{$book->book_title}}" class="form-control" id="recipient-name">

            </div> <br>
            <div style="display: -webkit-inline-box;" class="form-group">

                <label for="message-text" class="col-form-label">
                    <i class="fa fa-usd" aria-hidden="true"></i>&nbsp;Có giá:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @if($book->book_sale)
                <span class="regular-price">{{number_format($book->book_sale,0,',','.') }} đ</span>
                @endif
                &nbsp;&nbsp;&nbsp;
                <span class="sale-price">{{ number_format($book->book_price,0,',','.') }} đ</span>
             {{-- <input style="text-align-last: center;width: 353px;font-size: 17px;margin-top: 2px;margin-left: 20px;" type="text" readonly value="{{$book->book_title}}" class="form-control" id="recipient-name"> --}}

           </div>
           <div style="display: -webkit-inline-box;" class="form-group">
            <img height="200px" id="imgsp" src="{{asset('public/upload/products/')}}/{{$book->book_image}}" alt="product">
            <textarea style="      min-height: 186px;  margin-bottom: -88px;width: 256px;" name="message" class="m-send app-scroll" placeholder="Nhập phản hồi hoặc đặt câu hỏi...."></textarea>
       </div>
            {{-- <button  class="btn add-to-cart btn-style-1 color-3"  onclick="myFunction()">Tăng thêm 10K</button> --}}

            <input hidden name="id" class="m-send app-scroll" value="{{$book->id_account}}" >
            <input hidden name="anh" class="m-send app-scroll" value="{{$book->book_image}}" >
             <input hidden name="sp" class="m-send app-scroll" value="{{$book->book_title}}" >
             <input hidden name="gia" class="m-send app-scroll" value="{{ number_format($book->book_price,0,',','.') }} đ" >
             @if($book->book_sale)
             <input hidden name="giacu" class="m-send app-scroll" value="{{ number_format($book->book_sale,0,',','.') }} đ" >
             @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn add-to-cart btn-style-2 color-1" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn add-to-cart btn-style-1 color-3">Gửi lời nhắn</button>
            </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " style="  font-size:20px;  padding-top: 100px;" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" style="  font-size:30px; "id="exampleModalLabel"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp&nbspThông báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        Bạn cần đăng nhập trước khi thực hiện tác vụ
        </div>
        <div  class="modal-footer">
        <button style="  font-size:12px;" type="button" class="btn btn-secondary btn-style-1 color-3" data-dismiss="modal">Đóng</button>
        <button style=" color:white; font-size:12px;" type="button" class="btn btn-info btn-style-1 color-3"> <a style=" color:white;" href="{{route('p.login')}}"> Đăng nhập</a></button>
        </div>
    </div>
    </div>
</div>
@endsection
