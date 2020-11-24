
<div class="wrapper bg--zircon-light color-scheme-3">
<!-- Header Area Start Here -->
    <header class="header header-3">

        <div class="header-middle header-3--middle brand-bg-2 d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 text-lg-left text-center">
                        <!-- Logo Start -->
                        <a href="{{route('p.home')}}"  class="logo-box">
                            <img src="{{asset('public/page/img/logo-white.png')}}" alt="logo">
                        </a>
                        <!-- Logo End -->
                    </div>
                    {{-- {{dd($categories)}} --}}
                    <div class="col-lg-5">
                        <!-- Search Form Start -->
                    <form action="{{route('timkiem')}}" method="POST" class="search-form search-form--2">
                        {{ csrf_field() }}
                            <div class="search-form__group search-form__group--select">
                                <select name="category" id="searchCategory" class="search-form__select">
                                    <option value="all">Tất cả danh mục</option>
                                    @foreach($catego as $cate)
                                <optgroup label="{{$cate->category_name}}">
                                    @foreach($cate->subcategory as $cates)

                                        <option>
                                            {{$cates->subcategory_name}}
                                        </option>
                                    @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" class="search-form__input" name="tukhoa" placeholder="Tìm kiếm sách...">
                            <button class="search-form__submit color-3">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                        <!-- Search Form End -->
                    </div>
                    <div class="col-lg-4">
                        <div class="header-middle-nav">

                        @if(!Auth::check())

                            <div class="user-info header-middle-nav__item" >
                                <a href="{{route('p.login')}}"  style="color: #fff; font-size: 18px;">
                                    <i class="fa fa-unlock-alt" style="margin-right: 10px;"></i>Đăng nhập
                                </a>
                            </div>

                        @else

                            <div class="user-info header-middle-nav__item">
                                <div class="dropdown header-top__dropdown">
                                    <a class="dropdown-toggle" id="userID" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user"></i> Hi {{Auth::user()->info->info_name}}
                                    </a>                                {{-- {{Auth::user()->vaitro->ten_vai_tro}} --}}
                                    <div class="dropdown-menu" aria-labelledby="userID">
                                        <a class="dropdown-item" href="{{route('act.home')}}">
                                            <i class="text-primary fa fa-home"></i>
                                            Trang của tui
                                        </a>

                                        <a class="dropdown-item" href="{{route('ad.home')}}">
                                            <i class="text-primary fa fa-dashboard"></i>
                                            Trang quản trị
                                        </a>



                                        <a class="dropdown-item" href="{{route('p.logout')}}">
                                            <i class="text-primary fa fa-power-off"></i>
                                            Đăng xuất
                                        </a>



                                    </div>
                                </div>
                            </div>

                        @endif
                            <!-- Header Cart Start -->
                            <div style="    border-right: 1px solid #e5e5e5;
                            margin-right: 2rem;
                            padding-right: 12px;" class="mini-cart mini-cart--3">
                                <a class="mini-cart__dropdown-toggle" id="cartDropdown">
                                    <i class="fa fa-shopping-bag mini-cart__icon"></i>
                                    <sub class="mini-cart__count">{{Cart::count()}}</sub>
                                </a>
                                @if(Cart::count()>= 1)
                                    <div class="mini-cart__dropdown-menu">
                                        <div class="mini-cart__content">
                                            <div class="mini-cart__item">

                                                @foreach($data2 as $cart)

                                                <div class="mini-cart__item--single">
                                                    <div class="mini-cart__item--image">
                                                        <img src="{{asset('public/upload/products/')}}/{{$cart->options->img}}"  alt="product">
                                                    </div>
                                                    <div class="mini-cart__item--content">
                                                        <h4><a href="{{route('b.detail',['id' => $cart->id])}}" >{{$cart->name}}</a> </h4>
                                                        <p>Số lượng: {{$cart->qty}}</p>
                                                        <p>Giá: {{ number_format($cart->price*$cart->qty,0,',','.') }} đ</p>
                                                    </div>
                                                    <a href="{{Route('delcart',['id' => $cart->rowId])}}"><i class="fa fa-trash-o"></i></a>
                                                </div>


                                                @endforeach



                                            </div>
                                            <div class="mini-cart__total">
                                                <h4>
                                                    <span class="mini-cart__total--title">Tổng cộng</span>
                                                    <span class="mini-cart__total--ammount">{{$data3}} đ</span>
                                                </h4>
                                            </div>
                                            <div class="mini-cart__btn">
                                                <a href="{{route('cart')}}"  class="btn btn-small btn-icon btn-style-1 color-3">Giỏ hàng <i class="fa fa-angle-right"></i></a>
                                                <a href="{{route('checkout')}}"  class="btn btn-small btn-icon btn-style-1 color-3">Thanh toán <i class="fa fa-angle-right"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            </div>
                            {{-- <div style="border-right: 1px solid #e5e5e5;margin-right: 2rem;
                            padding-right: 2rem;" class="gach"></div> --}}

                            @if(Auth::check())
                            <div  style="border-right: 1px solid #e5e5e5;
                            margin-right: 2rem;
                            padding-right: 25px;" class="mini-cart mini-cart--3">
                            <a class="mini-cart__dropdown-toggle" href="{{route(config('chatify.path'))}}" >
                                    <i style="color: white;font-size: 30px;" class="fa fa-commenting-o mini-cart__icon" aria-hidden="true"></i>
                                    <sub id="getcount" class="mini-cart__count"></sub>
                                </a>
                            </div>
                            @endif
                            @if(Auth::check())
                            <div class="mini-cart mini-cart--3">
                                <a class="mini-cart__dropdown-toggle"  href="{{route('auctionedListing')}}"  id="cartDropdown" >
                                    {{-- <i class="fa fa-shopping-bag mini-cart__icon"></i> --}}
                                    <i style="color: white;" class="fa fa-gavel mini-cart__icon" aria-hidden="true"></i>
                                    <sub id="getcountAuction" class="mini-cart__count"></sub>
                                </a>
                            </div>
                            @endif


                            <!-- Header Cart End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-3--bottom">
            <div class="container">
                <div class="row custom-row">
                    <div class="col-lg-3">
                        <!-- Category Nav Start -->
                        <div class="category-nav category-nav--3">
                            <h2  class="category-nav__title tertiary-bg" id="js-cat-nav-title"><i class="fa fa-bars"></i> <span>Danh mục sách</span></h2>

                            @yield('hide')

                            <ul class="category-nav__menu hide-in-default" id="js-cat-nav">

                                    @foreach($category as $ctg)
                                    <li class="category-nav__menu__item has-children">
                                        <a href="{{Route('category',['id' => $ctg->id])}}" ><i class="fa fa-coffee"></i> {{$ctg->category_name}}</a>
                                        <div class="category-nav__submenu">
                                            <div class="category-nav__submenu--inner">
                                                @foreach($ctg->subcategory as $ctg2)

                                                <ul>
                                                    <li><a href="{{Route('p.subcategory',['id' => $ctg2->id])}}" >{{$ctg2->subcategory_name}}</a></li>
                                                </ul>

                                                @endforeach

                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                            </ul>
                        </div>
                        <!-- Category Nav End -->
                        <div class="category-mobile-menu"></div>
                    </div>
                    <div class="col-lg-9">
                        <nav class="main-navigation main-navigation-2">
                            <!-- Mainmenu Start -->
                            <ul class="mainmenu mainmenu--3">
                                <li class="mainmenu__item active ">
                                    <a href="{{route('p.home')}}"  class="mainmenu__link">Trang chủ</a>
                                </li>
                                <li class="mainmenu__item menu-item-has-children ">
                                <a href="{{route('trend')}}" class="mainmenu__link">Sách</a>
                                    <ul class="sub-menu">
                                        @foreach($category as $cate)
                                        <li class="menu-item-has-children">
                                            <a style="font-size:13px; href="{{Route('category',['id' => $cate->id])}}">{{$cate->category_name}} </a>
                                            <ul class="sub-menu" >
                                                @foreach($cate->subcategory as $c)
                                            <li><a style="font-size:14px;" href="{{Route('p.subcategory',['id' => $c->id])}}">{{$c->subcategory_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li class="mainmenu__item">
                                <a href="{{route('trend')}}" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/portfolio.html" class="mainmenu__link">Thịnh hành</a>
                                </li>
                                <li class="mainmenu__item">
                                <a href="{{route('auction_index')}}" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/blog.html" class="mainmenu__link">Đấu giá</a>
                                </li>
                                <li class="mainmenu__item">
                                    <a href="blog.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/blog.html" class="mainmenu__link">Bài viết</a>
                                </li>
                                <li class="mainmenu__item ">
                                    <a href="#" class="mainmenu__link">Phản hồi</a>
                                    {{-- <ul class="megamenu three-column">
                                        <li>
                                            <a href="#">Pages</a>
                                            <ul>
                                                <li>
                                                    <a href="about-us.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/about-us.html">About Us</a>
                                                </li>
                                                <li>
                                                    <a href="about-us-2.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/about-us-2.html">About Us 2</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/contact.html">Contact</a>
                                                </li>
                                                <li>
                                                    <a href="contact-2.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/contact-2.html">Contact 2</a>
                                                </li>
                                                <li>
                                                    <a href="services.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/services.html">Services</a>
                                                </li>
                                                <li>
                                                    <a href="services-2.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/services-2.html">Services 2</a>
                                                </li>
                                                <li>
                                                    <a href="faq.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/faq.html">Faq</a>
                                                </li>
                                                <li>
                                                    <a href="404.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/404.html">404</a>
                                                </li>
                                                <li>
                                                    <a href="login-register.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/login-register.html">Login & Registration</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Blog</a>
                                            <ul>
                                                <li>
                                                    <a href="blog.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/blog.html">Blog Left Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="blog-right-sidebar.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/blog-right-sidebar.html">Blog Right Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="blog-3-column.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/blog-3-column.html">Blog 3 Column</a>
                                                </li>
                                                <li>
                                                    <a href="blog-4-column.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/blog-4-column.html">Blog 4 Column</a>
                                                </li>
                                                <li>
                                                    <a href="single-blog-image.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/single-blog-image.html">Image Format</a>
                                                </li>
                                                <li>
                                                    <a href="single-blog-gallery.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/single-blog-gallery.html">Gallery Format</a>
                                                </li>
                                                <li>
                                                    <a href="single-blog-audio.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/single-blog-audio.html">Audio Format</a>
                                                </li>
                                                <li>
                                                    <a href="single-blog-video.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/single-blog-video.html">Video Format</a>
                                                </li>
                                                <li>
                                                    <a href="single-blog-right-sidebar.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/single-blog-right-sidebar.html">Right Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Shop</a>
                                            <ul>
                                                <li>
                                                    <a href="cart.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/cart.html">Cart</a>
                                                </li>
                                                <li>
                                                    <a href="checkout.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/checkout.html">Checkout</a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/wishlist.html">Wishlist</a>
                                                </li>
                                                <li>
                                                    <a href="compare.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/compare.html">Compare</a>
                                                </li>
                                                <li>
                                                    <a href="my-account.html" tppabs="https://demo.hasthemes.com/lazio-preview/lazio/my-account.html">My Account</a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul> --}}
                                </li>
                            </ul>
                            <!-- Mainmenu End -->
                        </nav>
                        <!-- Main Mobile Menu Start -->
                        <div class="mobile-menu mobile-menu--3"></div>
                        <!-- Main Mobile Menu End -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Header Start -->
        <div class="fixed-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <!-- Sticky Logo Start -->
                        <a class="sticky-logo" href="{{route('p.home')}}">
                            <img src="{{asset('public/page/img/logo-white.png')}}" alt="logo">
                        </a>
                        <!-- Sticky Logo End -->
                    </div>
                    <div class="col-lg-9">
                        <!-- Sticky Mainmenu Start -->
                        <nav class="sticky-navigation">
                            <ul class="mainmenu sticky-menu">
                                <li class="mainmenu__item active ">
                                    <a href="{{route('p.home')}}" class="mainmenu__link">Trang chủ</a>
                                    {{-- <ul class="sub-menu hidden-sub">
                                        <li>
                                            <a href="{{route('p.home')}}">Home 1</a>
                                        </li>
                                        <li>
                                            <a href="index-2.html">Home 2</a>
                                        </li>
                                        <li>
                                            <a href="index-3.html">Home 3</a>
                                        </li>
                                        <li>
                                            <a href="index-4.html">Home 4</a>
                                        </li>
                                        <li>
                                            <a href="index-5.html">Home 5</a>
                                        </li>
                                        <li>
                                            <a href="index-6.html">Home 6</a>
                                        </li>
                                        <li>
                                            <a href="index-7.html">Home 7</a>
                                        </li>
                                        <li>
                                            <a href="index-8.html">Home 8</a>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li class="mainmenu__item menu-item-has-children sticky-has-child sticky-has-child">
                                    <a href="shop.html" class="mainmenu__link">Sách</a>
                                    <ul class="sub-menu hidden-sub">
                                        @foreach ($catego as $cate)

                                        <li class="menu-item-has-children sticky-has-child">
                                        <a href="{{Route('category',['id' => $cate->id])}}" style="font-size: 13px;">{{$cate->category_name}}</a>
                                            <ul class="sub-menu hidden-sub">
                                                @foreach ($cate->subcategory as $item)

                                            <li><a href="{{Route('p.subcategory',['id' => $item->id])}}">{{$item->subcategory_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li class="mainmenu__item">
                                    <a href="{{route('act.home')}}" class="mainmenu__link">Trang của tôi</a>
                                </li>
                                <li class="mainmenu__item">
                                    <a href="{{route('cart')}}" class="mainmenu__link">Giỏ hàng</a>
                                </li>
                                <li class="mainmenu__item">
                                    <a href="{{route('ad.home')}}" class="mainmenu__link">Quản trị</a>
                                </li>

                            </ul>
                            <div class="sticky-mobile-menu">
                                <span class="sticky-menu-btn"></span>
                            </div>
                        </nav>
                        <!-- Sticky Mainmenu End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sticky Header End -->
    </header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <!-- Header Area End Here -->
@if(Auth::check())

        <script>
            $(document).ready( function(){

                var number=0;

                  $.ajax({
                        // type: "POST",
                        url: "{{route('countmess')}}",
                         success: function(result){
                                 console.log(result.count);
                                 number = result.count;
                            // $("#getcount").html(result.count);
                            // console.log(number);

                          }});

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
                        var channel = pusher.subscribe('phuc.'+ {{Auth::user()->id}});
                        console.log(channel);
                        //Bind a function to a Event (the full Laravel class)
                        // channel.bind('App\\Events\\HelloPusherEvent', addMessage);
                        // D:\LUAN VAN\bookshop\app\Events\HelloPusherEvent.php
                        channel.bind('App\\Events\\HelloPusherEvent', addMessageDemo);
                        console.log('chay  dc ');

                        function addMessageDemo(data) {
                            console.log(data);
                            console.log('chay  dc 1');
                            // var liTag = $("<li class='list-group-item'></li>");
                            console.log(data.message)
                            number = data.message;
                            // liTag.html(data.message);
                            $('#getcount').html(number);
                        }
                        setTimeout(function(){
                             $('#getcount').html(number);
                         console.log(number);
                         }, 300);


                         // lấy số sách đấu giá thành công mà chưa thanh toán hoặc chưa xem
                         var numberAuction=0;
                                $.ajax({
                                    // type: "POST",
                                    url: "{{route('getAuctionNumber')}}",
                                    success: function(result){
                                            console.log(result.count);
                                            numberAuction = result.count;
                                        $('#getcountAuction').html(numberAuction);
                                        console.log(numberAuction);
                                        if(numberAuction > 0 ){
                                        setTimeout(function(){
                                                swal({
                                                    title: "Bạn có đơn hàng đấu giá sách chưa thanh toán?",
                                                    text: "Thời gian thanh toán trong vòng 24h kể từ ngày kết thúc phiên đấu giá",
                                                    imageUrl: "https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/512x512/plain/auction_hammer.png",
                                                    // type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonClass: "btn-danger",
                                                    confirmButtonText: "Xem đơn hàng ngay!",
                                                    cancelButtonText: "Để sau!",
                                                    closeOnConfirm: false,
                                                    closeOnCancel: false
                                                    },
                                                        function(isConfirm) {
                                                        if (isConfirm) {
                                                        swal("OK!", "Hệ thống tiến hành điều hướng.", "success");
                                                        // window.location.href = "{{route('auctionedListing')}}";
                                                        setTimeout(function(){
                                                            $.ajax({
                                                                type: 'POST', //THIS NEEDS TO BE GET
                                                                url: '{{route('seenAuction')}}',
                                                                data:{
                                                                    "_token": "{{ csrf_token() }}",
                                                                    },
                                                                success: function (data) {
                                                                    console.log(data);
                                                                    // location.reload();
                                                                    window.location.replace("{{route('auctionedListing')}}");
                                                                },
                                                                error: function() {
                                                                    console.log(data);
                                                                }
                                                            });
                                                        }, 1000);

                                                } else {
                                                    swal("Để sau", "Đơn hàng vẫn chưa được thanh toán :)", "warning");
                                                }
                                                });
                                            }, 3000);
                                        }
                                    }
                                });



                        // Subscribe to the channel we specified in our Laravel Event
                        // var channel1 = pusher.subscribe('phuc.'+ {{Auth::user()->id}});
                        // //Bind a function to a Event (the full Laravel class)
                        // // channel.bind('App\\Events\\HelloPusherEvent', addMessage);
                        // // D:\LUAN VAN\bookshop\app\Events\HelloPusherEvent.php
                        // channel.bind('App\\Events\\GetNumberAuction', addMessageDemo1);

                        // function addMessageDemo1(data) {
                        //     console.log(data);
                        //     console.log('chay  dc 1');
                        //     // var liTag = $("<li class='list-group-item'></li>");
                        //     console.log(data.message)
                        //     numberAuction = data.message;
                        //     // liTag.html(data.message);
                        //     $('#getcountAuction').html(numberAuction);
                        // }
                        // setTimeout(function(){
                        //      $('#getcountAuction').html(numberAuction);
                        //  console.log(numberAuction);
                        //  }, 300);
                    });
                    </script>

@endif
