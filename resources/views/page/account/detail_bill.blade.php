@extends('page.layout')
@section('title','Tài khoản')
<head>
    <style>
        .account-table.table-content.table-responsive{
    width: 1229px;
    width: auto;
    width: 1300px;
    margin-left: -62px;
}
    </style>
</head>
@section('page_content')
{{-- {{dd($bill)}} --}}
    <!-- Breadcumb area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li><a href="{{Route('p.home')}}">Trang chủ</a></li>
                        <li><a href="{{Route('act.home')}}">Tài khoản</a></li>
                        <li class="current"><a>Chi tiết đơn hàng {{$bill->bill_code}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb area End -->

    <!-- Main Content wrapper start -->

    <section class="main-content-wrapper">
        <div class="account-wrapper pt--10 pb--80 pt-sm--30 pb-sm--60">
            <div class="container">
                <div class="user-dashboard-tab">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="user-dashboard-tab__content tab-content">
                                <div class="tab-pane fade show active" id="dashboard">


                                    <div class="row" >
                                        <p class="btn btn-4 btn-style-3" style="color: #fff; font-size: 16px; background-color: #17a2b8">
                                            <span style="color : #ffc107; ">
                                                {{$bill->bill_code}}
                                            </span>
                                            có
                                            <span style="color : #ffc107; ">
                                                {{$bill->detailbill->count()}}
                                            </span> sản phẩm
                                        </p>


                                        <button class="btn btn-4 btn-style-3" style="font-size: 15px; margin-left: 5%; background-color: #17a2b8">
                                            Tổng đơn hàng:
                                            <span style="color: #ffc107">
                                                {{ number_format($bill->bill_total,0,',','.') }} đ
                                            </span>
                                        </button>





                                    </div>


                                </div>
                                <br>
                                <p>Người nhận hàng : {{$bill->bill_name}}</p>
                                <p>Số điện thoại : {{$bill->bill_phone}}</p>
                                <p>Đia chỉ giao hàng : {{$bill->bill_address}}</p>

                                <br>

								{{-- Đơn hàng --}}
                                <div >
                                    <div class="account-table table-content table-responsive a">
                                        <table class="table">
                                            <thead>
                                                <tr align="center">
                                                    <th>STT</th>
                                                    <th>Hình</th>
                                                    <th>Têm sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Đơn giá</th>
                                                    <th>Người đăng bán</th>
                                                    <th>Trang thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @php
                                                    $stt = 1;
                                                @endphp

                                                @foreach($bill->detailbill as $bill2)
                                                <tr align="center">
                                                    <td>{{$stt++}}</td>

                                                    <td>
                                                        <img src="{{asset('public/upload/products/')}}/{{$bill2->detailbill2->book_image}}" style="height: 80px; width: 80px; " alt="product" >
                                                    </td>

                                                    <td class="wide-column">
                                                        {{$bill2->detailbill2->book_title }}
                                                    </td>

                                                    <td class="wide-column">
                                                        {{$bill2->qty }}
                                                    </td>

                                                    <td class="wide-column">
                                                        {{ number_format($bill2->detailbill2->book_price*$bill2->qty,0,',','.') }} đ
                                                    </td>

                                                    <td class="wide-column">
                                                        {{$bill2->user31->info->info_lastname }}
                                                        {{$bill2->user31->info->info_name }}

                                                    </td>

                                                    <td>
                                                        {{--  --}}
                                                        @if($bill2->id_status == 8)

                                                        <button class="btn btn-4 btn-style-3" style="font-size: 10px;background-color:#dc3545; ">
                                                    <span style="color: white">
                                                        {{$bill2->status->status_name}}
                                                    </span>

                                                @elseif($bill2->id_status == 7)

                                                <button class="btn btn-4 btn-style-3" style="font-size: 15px;background-color:#28a745; ">
                                                    <span style="color: white;">
                                                        {{$bill2->status->status_name}}
                                                    </span>

                                                @elseif($bill2->id_status == 6)

                                                <button class="btn btn-4 btn-style-3" style="font-size: 15px;background-color:#17a2b8; ">
                                                    <span style="color: white ;">
                                                        {{$bill2->status->status_name}}
                                                    </span>

                                                @elseif($bill2->id_status == 5)

                                                <button class="btn btn-4 btn-style-3" style="font-size: 15px;background-color:#007bff ">
                                                    <span style="color: white;">
                                                        {{$bill2->status->status_name}}
                                                    </span>

                                                @elseif($bill2->id_status == 4)
                                                <button class="btn btn-4 btn-style-3" style="font-size: 15px; ; background-color:#fd7e14  ">
                                                    <span style="color: white;">
                                                        {{$bill2->status->status_name}}
                                                    </span>

                                                @else
                                                <button class="btn btn-4 btn-style-3" style="font-size: 15px; ; background-color:lightblue ">
                                                    <span >{{$bill2->status->status_name}}</span>

                                                @endif
                                                        {{--  --}}
                                                    </td>


                                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                        <br>

                                        @if($bill2->id_status == 3)
                                            <button class="btn btn-4 btn-style-3" style="font-size: 15px; margin-left: 82%; background-color: #E15858">
                                            <a href="{{route('status8',['id' => $bill->id])}}" style="color: #fff">Hủy đơn hàng</a>

                                        </button>
                                        @elseif($bill2->id_status == 8)

                                            <button class="btn btn-4 btn-style-3" style="font-size: 15px; margin-left: 72%; background-color: #6c757d">
                                            <a href="#" style="color: #fff">Đơn hàng đã được húy</a>

                                        </button>
                                        @elseif($bill2->id_status == 7)
                                             <button class="btn btn-4 btn-style-3" style="font-size: 15px; margin-left: 72%; background-color:#17a2b8 ">
                                                    <a href="#" style="color: #fff">Giao hàng thành công</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content wrapper end -->

        <script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>

   {!! Toastr::message() !!}



@endsection
