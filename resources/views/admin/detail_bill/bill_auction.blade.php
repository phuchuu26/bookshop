@extends('admin.layout')
@section('title','Trang quản trị')
@section('admin_content')
<style>
.c3 {
    height: 163px;
}
.c2 {
    height: 163px;
}
.d1 {
    /* height: 46px; */
    height: 164px;
}
.c1{
    float: right;
}
.a1 {
    font-size: 38px;
}
    .body.top_counter.b {
    /* margin: 10px 0px; */
    height: 185px;
    /* text-align: center; */
    /* width: auto; */
    /* height: auto; */
    padding-top: 38px;
    font-size: 22px;
}
small.text-muted {
    /* float: left; */
}
.b1 {
    padding-left: 87px;
    font-size: 14px;
}
    /* Style The Dropdown Button */
    .dropbtn {

      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }
    .body.top_counter.a {
    /* margin: 10px 0px; */
    height: 112px;
    padding-top: 30px;
    /* text-align: center; */
    padding-left: 32px;
}

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #f1f1f1}

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
      display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
      background-color: #3e8e41;
    }
    </style>
            {{-- ///////////////////////////////// Admin ////////////////////////////// --}}
    @if(Auth::user()->level == 1)

        <div id="main-content">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-12">
                            <h1>Trang quản trị</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Người quản trị</a></li>
                                    {{-- <li class="breadcrumb-item active" aria-current="page">Finance Performance</li> --}}
                                </ol>
                            </nav>
                        </div>
                        {{-- <div class="col-md-6 col-sm-12 text-right hidden-xs">
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create Campaign</a>
                        </div> --}}
                    </div>
                </div>



                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Sản phẩm đang bán</h2>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-custom spacing5">
                                    <thead>
                                        <tr>
                                            <th width="10%;">Mã đơn hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Người mua</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Ngày hoàn thành</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bills as $dsbill)
                                        @if($dsbill->getBook_buy)
                                        <tr>
                                            <td>{{$dsbill->bills->bill_auction_code}}</td>
                                            <td>{{ number_format($dsbill->bills->bill_total,0,',','.') }} đ</td>

                                            @if($dsbill->id_nguoiban == Auth::user()->id)
                                            <td>
                                                <div class="dropdown" >
                                                    <button class="dropbtn" style="border-radius: 10px !important; font-size: 12px; !important">
                                                        {{$dsbill->status->status_name}}
                                                    </button>
                                                    <div class="dropdown-content">
                                                        <a href="{{route('status4',['id' => $dsbill->id])}}">Xác nhận đơn hàng</a>
                                                        <a href="{{route('status5',['id' => $dsbill->id])}}">Đang vận chuyển</a>
                                                        <a href="{{route('status7',['id' => $dsbill->id])}}">Giao hàng thanh cong</a>
                                                        <a href="{{route('status8',['id' => $dsbill->id])}}">Huy don hàng</a>
                                                    </div>
                                                </div>
                                            </td>

                                            @else

                                            <td>
                                                @if($dsbill->id_status == 8)

                                                    <span style="color: #dc3545">
                                                        {{$dsbill->status->status_name}}
                                                    </span>

                                                @elseif($dsbill->id_status == 7)

                                                    <span style="color: #28a745;">
                                                        {{$dsbill->status->status_name}}
                                                    </span>

                                                @elseif($dsbill->id_status == 6)

                                                    <span style="color: #17a2b8;">
                                                        {{$dsbill->status->status_name}}
                                                    </span>

                                                @elseif($dsbill->id_status == 5)

                                                    <span style="color: #007bff;">
                                                        {{$dsbill->status->status_name}}
                                                    </span>

                                                @elseif($dsbill->id_status == 4)

                                                    <span style="color: #fd7e14;">
                                                        {{$dsbill->status->status_name}}
                                                    </span>

                                                @else

                                                    <span >{{$dsbill->status->status_name}}</span>

                                                @endif
                                            </td>

                                            @endif

                                            <td>

                                                <a href="#" >
                                                    {{$dsbill->bills->userbill->username}}
                                                </a>



                                            </td>




                                            <td>{{$dsbill->bills->created_at}}</td>
                                            <td>{{$dsbill->bills->updated_at}}</td>

                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

            {{-- ///////////////////////////////// Khách hàng ////////////////////////////// --}}
    @else

        <div id="main-content">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-12">
                            <h1>Trang quản trị</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Trang chủ</li>
                                </ol>
                            </nav>
                        </div>
                            {{-- <div class="col-md-6 col-sm-12 text-right hidden-xs">
                                <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create Campaign</a>
                            </div> --}}
                    </div>
                </div>



                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>Sản phẩm đang bán</h2>
                            </div>
                            <div class="table">
                                <table class="table table-custom spacing5">
                                    <thead>
                                        <tr>
                                            <th width="10%;">Mã đơn hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Người mua</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Ngày hoàn thành</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- {{dd($bills)}} --}}
                                        @foreach($tests as $dsbill)

                                        <tr>
                                            <td>{{$dsbill->bill_auction_code}}</td>
                                            <td>{{ number_format($dsbill->bill_auction_price,0,',','.') }} đ</td>

                                            <td>


                                                  <div class="dropdown" >
                                                      {{-- {{dd()}} --}}
                                                      @if($dsbill->id_status == 3)
                                                  <button  class="dropbtn" style="border-radius: 10px !important; font-size: 12px !important;background-color: #ffc107;;">
                                                      {{$dsbill->status->status_name}}
                                                    </button>

                                                    @elseif($dsbill->id_status == 8)
                                                  <button  class="dropbtn" style="border-radius: 10px !important; font-size: 12px !important;background-color: #dc3545;">
                                                      {{$dsbill->status->status_name}}
                                                    </button>
                                                       @elseif($dsbill->id_status == 4)
                                                  <button  class="dropbtn" style="border-radius: 10px !important; font-size: 12px !important;background-color: #007bff;">
                                                      {{$dsbill->status->status_name}}
                                                    </button>
                                                      @elseif($dsbill->id_status == 5)
                                                  <button  class="dropbtn" style="border-radius: 10px !important; font-size: 12px !important;background-color: #17a2b8;">
                                                      {{$dsbill->status->status_name}}
                                                    </button>
                                                     @elseif($dsbill->id_status == 7)
                                                  <button  class="dropbtn" style="border-radius: 10px !important; font-size: 12px !important;background-color: #28a745;">
                                                      {{$dsbill->status->status_name}}
                                                    </button>
                                                    @else
                                                    <button  class="dropbtn" style="border-radius: 10px !important; font-size: 12px !important;background-color: #28a745;">
                                                        {{$dsbill->status->status_name}}
                                                      </button>
                                                    @endif

                                                    <div class="dropdown-content">
                                                        @if($dsbill->id_status == 3)

                                                        @if($dsbill->id_payment == 1)
                                                            <a href="{{route('status_auction_8',['id' => $dsbill->id])}}">Huy don hàng</a>
                                                            @endif
                                                            <a href="{{route('status_auction_5',['id' => $dsbill->id])}}">Xác nhận đơn hàng</a>

                                                            @endif
                                                                @if($dsbill->id_status == 4)
                                                                <a style="" href="{{route('status_auction_6',['id' => $dsbill->id])}}">Đang vận chuyển</a>
                                                                @endif
                                                                    @if($dsbill->id_status == 5)
                                                                    <a  href="{{route('status_auction_7',['id' => $dsbill->id])}}">Giao hàng thanh cong</a>
                                                                    @endif
                                                    </div>
                                                  </div>

                                            </td>

                                            <td>

                                                <a href="#" >
                                                    {{$dsbill->getNguoiThanhToan->info->info_lastname}}
                                                    {{$dsbill->getNguoiThanhToan->info->info_name}}
                                                </a>



                                            </td>




                                            <td>
                                                {{date('H:i d-m-Y', strtotime($dsbill->created_at))}}
                                                {{-- {{$dsbill->created_at}} --}}
                                            </td>

                                            <td>
                                                {{date('H:i d-m-Y', strtotime($dsbill->updated_at))}}
                                                {{-- {{$dsbill->updated_at}} --}}
                                            </td>

                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    @endif

    <script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>


   {!! Toastr::message() !!}

@endsection
