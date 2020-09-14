@extends('page.layout')
@section('title','Sản phẩm')
<head>
    <style>
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
                        <!-- Shop Toolbar End -->

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
                            {{-- <div class="sidebar-widget product-widget product-color-widget">
                                <h3 class="widget-title">Màu sắc</h3>
                                <div class="widget_conent">
                                    <ul class="product-color">
                                        <li><a href="shop.html">D</a><span>(2)</span></li>
                                        <li><a href="shop.html">Blue</a><span>(4)</span></li>
                                        <li><a href="shop.html">Gold</a><span>(5)</span></li>
                                    </ul>
                                </div>
                            </div> --}}
                            <!-- Product color Widget End -->

                            <!-- Price Filter Widget Start -->

                            {{-- <article class="card-group-item">
                                <header class="card-header">
                                    <h6 class="title">Khoảng tiền </h6>
                                </header>
                                <div class="filter-content">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Từ</label>
                                                <input type="range" class="custom-range" min="0" max="50000" step="1000"
                                                    id="sotientu" name="keyword_sotientu"
                                                    value="">
                                                <span><span id="sotientu-text"></span></span>
                                            </div>
                                            <div class="form-group col-md-6 text-right">
                                                <label>Đến</label>
                                                <input type="range" class="custom-range" min="50000" max="200000" step="1000"
                                                    id="sotienden" name="keyword_sotienden"
                                                    value="">
                                                <span><span id="sotienden-text"></span></span>
                                            </div>
                                        </div>
                                    </div> <!-- card-body.// -->
                                </div>
                            </article> --}}
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
            <form action="" method="post">

                @csrf
                <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tên khách hàng:</label>
              <input type="text" readonly value="nguyen" class="form-control" id="recipient-name">
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
            <button type="button" class="btn add-to-cart btn-style-2 color-1" data-dismiss="modal">Close</button>
            <button type="button" class="btn add-to-cart btn-style-1 color-3">Send message</button>
          </div>
        </div>
      </div>
    </div>
    {{-- <script>
        function myFunction() {
        //   document.getElementById("myNumber").stepUp(5);
        }
        </script> --}}
    <script>
        var d = new Date();
var n = d.getTime();
var now = n;
console.log(n);
// document.getElementById("demo").innerHTML = n;



var countDownDate = {{$current_date_time}} *1000 ;
        console.log(countDownDate - now);
// Update the count down every 1 second
var x = setInterval(function() {
now = now + 1000;
// Find the distance between now an the count down date
var distance = countDownDate - now;
console.log(distance);
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
document.getElementById("demo1").innerHTML = "";
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

