@extends('page.layout')
@section('title','Giỏ hàng')
@section('page_content')

	<!-- Breadcumb area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="shop.html">Shop</a></li>
                        <li class="current"><a>Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb area End -->

    <!-- Main content wrapper start -->
@if(Cart::count()>= 1)

    <div class="main-content-wrapper">
            <a href="{{Route('delcart',['id' => 'all'])}}" class="btn btn-4 btn-style-3" onclick="return confirm('Bạn có chắc xóa tất cả!!')" style="margin-left: 80%; padding-left: 15px; padding-right: 15px; background-color: #E15858">
                <i class="fa fa-trash-o"></i>
                Xóa tất cả
            </a>


        <div class="cart-area pt--10 pb--80 pt-sm--30 pb-sm--60">

            <div class="container">

                <div class="cart-wrapper bg--white mb--80 mb-sm--60">

                    <div class="row">
                        <div class="col-12">
                            <!-- Cart Area Start -->
                            <form action="#" class="form form--cart">
                                <div class="cart-table table-content table-responsive">
                                    <table class="table mb--30">
                                        <thead>
                                            <tr>
                                                <th>Xóa</th>
                                                <th>Sản phẩm</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                            				@foreach($cart as $giohang)

                                            <tr>
                                                <td>
                                                	<a href="{{Route('delcart',['id' => $giohang->rowId])}}" onclick="return confirm('Bạn có muốn xóa không ?')"><i class="fa fa-trash-o"></i></a>
                                                </td>

                                                <td>
                                                    <a href="{{route('b.detail',['id'=> $giohang->id])}}">
                                                        <img src="{{asset('public/upload/products')}}/{{$giohang->options->img}}" alt="product">
                                                    </a>
                                                </td>

                                                <td class="wide-column">
                                                    <h3><a href="single-product.html">{{$giohang->name}}</a></h3>
                                                </td>

                                                <td class="cart-product-price"><strong> {{ number_format($giohang->price,0,',','.') }} đ</strong></td>



                                                <td>
                                                    <div class="quantity">
			                                            <input  type="hidden" value="{{$giohang->rowId}}" id="rowID{{$giohang->id}}"/>
			                                            <div  class="cart-qty">
			                                                <input style="width: 40px;height: 31px;" class="qty-fill"  type="number"  value="{{$giohang->qty}}" onchange="updatecart(this.value,'{{$giohang->rowId}}')">
			                                             </div>
			                                        </div>

                                                </td>





                                                <td class="cart-product-price"><strong>{{ number_format($giohang->price*$giohang->qty,0,',','.') }} đ</strong></td>
                                            </tr>

                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>


                            </form>
                            <!-- Cart Area End -->
                        </div>
                    </div>
                </div>
                <div class="cart-page-total-wrapper">
                    <div class="row justify-content-end">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="cart-page-total bg--white">
                                <h2 style="color: #007bff">Tổng tiền giỏ hàng</h2>
                                <div class="cart-calculator-table table-content table-responsive">
                                    <table class="table">
                                        <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Tổng</th>
                                                    <td><span class="price-ammount">{{$total}} đ</span></td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>Shipping</th>
                                                    <td>
                                                        <span class="price-ammount">Free ship</span>

                                                    </td>
                                                </tr>
                                                <tr class="cart-total">
                                                    <th>Tổng đơn hàng</th>
                                                    <td><span class="price-ammount" style="color:#007bff">{{$total}} đ</span></td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                                @if(Auth::check())

                                	<a href="{{route('checkout')}}" class="btn btn-6 btn-style-3">Xử lí thanh toán</a>

                                @else
                                	<a href="{{route('p.login')}}" style="background-color: #ea6b6b" class="btn btn-6 btn-style-2">Đăng nhập</a>

								@endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@else    <!--================End Cart Area =================-->
    <!-- Main Wrapper Start -->
        <main id="content" class="main-content-wrapper">
            <div class="error-area pt--30 pb--100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8 text-center">
                            <div class="error">
                                <h1 style="margin-bottom: 0px;">404</h1>
                                <img src="{{asset('public/page/emptycart.png')}}" >
                                <h2>OPPS! Giỏ hàng đang trống</h2>
                                <p>Xin lỗi giỏ hàng của bạn đang trống, mời bạn thêm sản phẩm vào giỏ hàng !</p>

                                <a href="{{Route('p.home')}}" class="btn btn-4 btn-style-3">Quay về trang chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Wrapper End -->
@endif

    <!-- Main content wrapper end -->
<script>
  function updatecart(qty, rowId){
    $.get(
        '{{Route('updatecart')}}',
        {qty:qty,rowId:rowId},
        function(){
            location.reload();
        }
        );
  }

</script>

   <script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>

   {!! Toastr::message() !!}

@endsection
