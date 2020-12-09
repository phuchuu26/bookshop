@extends('page.layout')
@section('title','Shop của ')
{{-- // tren day no ko nhan dc php  --}}
@section('page_content')

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="{{asset('public/page/css/style.css')}}">
<style>




a#new {
    border-radius: 4px;
    /* top: -3px; */
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    position: absolute;
    padding-bottom: -15px;
    padding-top: -25px!important;
    /* top: -3px; */
    top: 27px;
    padding: -4px 0;
    /* top: 15px; */
    left: -34px;
    width: 71px;
    background-color: #146c78;
    left: 17px;
    line-height: -1px;
    align-items: center;
    font: bold 15px sans-serif;
    color: white;
    text-align: center;
    opacity: 0.9;
}
a#new:hover{
    background-color: #ffe11b;
    color: black;
}
img.logo {
    object-fit: cover;
}
    .ratings {
            margin-left: 60px;
        }
        span.sale-price.a {
    margin-right: 80px;
}
span.regular-price.a {
    margin-right: 74px;
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
    .thongTinShop{
        max-height: 100%;
        max-width:500px ;
    }
    .nonsp {
    width: 100%;
    width: auto;
    padding-left: 344px;
    padding-top: 80px;
    font-size: 54px;
}
.non{
    padding-left: 54px;
}
</style>
</head>
<main id="content" class="main-content-wrapper">
    <div class="shop-area pt--10 pb--80 pt-sm--30 pb-sm--60">
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">


            <div class="col-12">
                <ul class="breadcrumb">
                    <li><a href="{{route('p.home')}}">Trang chủ</a></li>
                    <li class="current">
                        @if($user->info)
                        <a>Shop của {{$user->info->info_name}} </a>
                        @else
                        <a>Shop của {{$user->username}} </a>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="col-12">
                <ul class="breadcrumb" style="">
                    <div  class="thongTinShop">
                        <a id='new' >VIP</a>
                        <div class="left">
                            {{-- <img class="logo" width="90px;" src="{{asset('public/page/img/furniture-13-250x278.jpg')}}" alt=""> --}}
                            <img class="logo" width="90px;" height="120px;" src="{{asset('public/storage/users-avatar').'/'.$user->avatar}}" alt="">
                        </div>
                        <div class="right">
                            <p class="des">Được bán bởi</p>
                            {{-- {{dd($user->info)}} --}}
                            @if($user->info)
                            <h3>
                                {{$user->info->info_lastname .' '.$user->info->info_name}}
                            </h3>
                            @else

                            <h3>
                                {{$user->username}}
                            </h3>
                            @endif
                            <p class="moTaShop">
                                Sau một thời gian hoạt động, website đã có những bước tiến đáng kể cả về chất lượng và hình thức
                            </p>
                            {{-- <button type="button" class="btn btn-primary chat-facebook">
                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                                Chat ngay</button> --}}
                                {{-- <form id="" method="POST" action="{{route('chat_user')}}" > --}}
                                    {{-- @csrf --}}

                                    {{-- <input hidden name="id" class="m-send app-scroll" value="{{$user->id}}" > --}}
                                    <a href="{{route('user',['id' =>$user->id ])}}">
                                    <button style="padding-bottom: 7px;" type="submit" class="btn btn-primary chat-facebook">
                                        <i class="fa fa-phone-square" aria-hidden="true"></i>
                                    {{-- <a href="http://bookshop.com/chatify/{{$user->id}}">Chat ngay</a> --}}
                                        Chat ngay
                                    </button>
                                </a>
                                        {{-- </form> --}}
                            {{-- <button type="button" class="btn btn-outline-primary">Primary</button> --}}
                            <a href="tel:#">
                            <button type="button" style="padding-bottom: 7px;" class="btn btn-info so-hotline">
                                <i class="fa fa-comments-o" aria-hidden="true"></i>
                                  Gọi ngay
                                </button>
                            </a>

                            {{-- <a class="btn btn-info so-hotline" href="http://bookshop.com/chatify/{{$user->id}}">Vô Chat ngay</a> --}}


                                        {{-- <a class="btn btn-outline-primary home " href="">
                                            <i class="fa fa-home" aria-hidden="true"></i>   Xem shop</i></a> --}}


                        </div>
                    </div>
                    <div class="chitiet">
                        <div class="rowa">
                            <h4 id="li" class="ab" ><i id="icona" class="fa fa-book" aria-hidden="true"></i>Đang theo dõi: 6</h4>
                            <h4 id="li"><i id="icona" class="fa fa-book" aria-hidden="true"></i>Tỉ lệ shop hủy đơn: 6</h4>

                        </div>


                        <div class="rowa">
                            <h4 id="li"><i id="icona" class="fa fa-book" aria-hidden="true"></i>Người theo dõi: 6</h4>
                            <h4 id="li"><i id="icona" class="fa fa-book" aria-hidden="true"></i>Sản phẩm : 6</h4>
                        </div>
                        <div class="rowa">
                            <h4 id="li"><i id="icona" class="fa fa-book" aria-hidden="true"></i>Ngày tham gia: 6</h4>
                            <h4 id="li"><i id="icona" class="fa fa-book" aria-hidden="true"></i>Tỉ lệ phản hồi chat: 6</h4>
                        </div>
                        <div class="rowa">
                            <h4 id="li"><i id="icona" class="fa fa-book" aria-hidden="true"></i>Đánh Giá: 6</h4>

                        </div>

                    </div>
                </ul>
            </div>



            <div class="col-lg-9 order-lg-2 mb-md--40">

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

                <div class="main-shop-wrapper">
                    <div class="tab-content" id="myTabContent-2">
                        <div class="tab-pane show active" id="grid">
                            <div class="product-grid-view three-column">
                                <div class="row no-gutters">
                                    @if($book2==0)
                                    <div class="nonsp">
                                        <i class="fa fa-book non" aria-hidden="true"></i>
                                        <br>
                                        <p>Không tìm thấy sản phẩm</p>
                                    </div>
                                    @else
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
                                                    @else
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
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


                                @endif


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
            </div>







    {{-- start thanh ben trai --}}

   @include('page.sidebar')

        </>
    </div>
</div>
</div>
</main>

@endsection
{{-- {{dd($user)}} --}}

