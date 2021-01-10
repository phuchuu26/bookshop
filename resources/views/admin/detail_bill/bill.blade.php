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
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="body top_counter">
                                <div class="icon bg-info text-white"><i class="fa fa-money" aria-hidden="true"></i> </div>
                                <div>Tổng tiền tháng này</div>
                                <div class="a1 py-4 m-0 text-center h1 text-success"> {{number_format($tienthangnayadmin, 0,',','.')}}
                                    <span style="text-decoration: underline;"> đ</span>
                                </div>
                                <div class="d-flex">
                                    <small class="text-muted">Tháng trước</small>
                                <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4.00%</div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="body top_counter">
                                <div class="icon bg-info text-white"><i class="fa fa-money" aria-hidden="true"></i> </div>
                                <div>Tổng tiền tháng trước</div>
                                <div  class="a1 py-4 m-0 text-center h1 text-info">{{number_format($thangtruoc, 0,',','.')}}
                                    <span style="text-decoration: underline;"> đ</span>
                                </div>
                                <div class="d-flex">
                                    <small class="text-muted">Tháng trước</small>
                                    <div class="ml-auto">0.67%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="body">
                                <div>Gross Profit Margin</div>
                                <div class="mt-4 text-center">
                                    <input type="text" class="knob" value="34" data-width="147" data-height="147" data-thickness="0.07" data-bgColor="#383b40" data-fgColor="#9367B4">
                                </div>
                                <h3 class="mb-0 mt-3 font300">24,301 <span class="text-green font-15">+3.7%</span></h3>
                                <small>Lorem Ipsum is simply dummy text <br> <a href="#">Read more</a> </small>
                                <div class="mt-4 text-center">
                                    <span class="chart_3">2,5,8,3,6,9,4,5,6,3</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-lg-9 col-md-12">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-4">

                                <div class="card">

                                        {{-- <div class="card-value float-right text-blue">+15%</div> --}}
                                        {{-- <div class="icon bg-success text-white"> --}}

                                            {{-- </div> --}}
                                            {{-- <div class="text-muted"> --}}



                                    <div class="body top_counter a">
                                        <div class="icon bg-success text-white"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></i> </div>
                                        <div class="content b1">
                                            <span> Tổng đơn hàng</span>
                                            <h5 class="number mb-0">{{$tongdon}}</h5>
                                        </div>
                                    </div>

                                </div>

                                <div class="card">
                                    <div class="body top_counter a">
                                        <div class="icon bg-success text-white"><i class="icon-book-open"></i> </div>
                                        <div class="content b1">
                                            <span>Sách bán ra</span>
                                            <h5 class="number mb-0">{{$book}} cuốn</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="body top_counter a">
                                        <div class="icon bg-success text-white"><i class="icon-user"></i> </div>
                                        <div class="content b1">
                                            <span>Số thành viên</span>
                                            <h5 class="number mb-0">{{$user}} người</h5>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="body top_counter b">
                                        <div class="icon bg-warning text-white"><i class="fa fa-money" aria-hidden="true"></i> </div>
                                        <div>Tổng doanh thu</div>
                                    <div class="py-4 m-0 text-center h1 text-success">{{number_format($tongtien, 0,',','.')}}
                                        <span style="text-decoration: underline;"> đ</span>
                                    </div>

                                        {{-- <div class="d-flex">
                                            <small class="text-muted">Tháng trước</small>
                                            <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4.00%</div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="body top_counter b">
                                        <div class="icon bg-warning text-white"><i class="icon-user"></i> </div>

                                        <div class="content">
                                            <span>Số lượt xem sách</span>
                                            <div class="py-4 m-0 text-center h1 text-success">{{$luotxemadmin}} lượt xem</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="body">
                                        <div class="media">
                                            <img class="rounded mr-3" src="{{asset('public/admin/img/avatar7.jpg')}}"  alt="">
                                            <div class="media-body">
                                                <h5 class="m-0">{{Auth::user()->info->info_name}} {{Auth::user()->info->info_lastname}}</h5>
                                                @if(Auth::user()->level == 1)

                                                    <p  style="color: #ffc107;">
                                                        <i class="fa fa-linux" style="padding-right: 10px;"></i>
                                                        {{Auth::user()->vaitro->role_name}}
                                                    </p>

                                                @else

                                                    <p  style="color: #5CB65F;">
                                                        <i class="icon-badge" style="padding-right: 10px;"></i>
                                                         {{Auth::user()->vaitro->role_name}}
                                                    </p>

                                                @endif


                                            </div>
                                        </div>


                                        {{-- <div class="body"> --}}
                                            {{-- <div class="media">
                                                <img class="rounded mr-3" src="{{asset('public/admin/img/avatar7.jpg')}}"  alt="">
                                                <div class="media-body">
                                                    <h5 class="m-0">{{Auth::user()->info->info_name}} {{Auth::user()->info->info_lastname}}</h5>
                                                    @if(Auth::user()->level == 1)

                                                        <p  style="color: #ffc107;">
                                                            <i class="fa fa-linux" style="padding-right: 10px;"></i>
                                                            {{Auth::user()->vaitro->role_name}}
                                                        </p>

                                                    @else

                                                        <p  style="color: #5CB65F;">
                                                            <i class="icon-badge" style="padding-right: 10px;"></i>
                                                            {{Auth::user()->vaitro->role_name}}
                                                        </p>

                                                    @endif

                                                </div>
                                            </div> --}}
                                            <i class="fa fa-phone" style="color: #70a1ff" aria-hidden="true"></i>
                                            <small class="text-muted">Số điện thoại thành viên: </small>
                                        <p  style="color: #70a1ff" >{{Auth::user()->info->info_phone}}</p>
                                        <i class="fa fa-envelope " style="color: #70a1ff"  aria-hidden="true"></i>
                                            <small class="text-muted">Email của thành viên: </small>
                                        <p  style="color: #70a1ff" >{{Auth::user()->info->info_email}}</p>
                                        <i class="fa fa-birthday-cake" style="color: #70a1ff"  aria-hidden="true"></i>
                                            <small class="text-muted">Ngày sinh : </small>
                                        <p  style="color: #70a1ff" >{{Auth::user()->info->info_birth}}</p>

                                        @if(Auth::user()->delivery)
                                        <i class="fa fa-map-marker" style="color: #70a1ff" aria-hidden="true"></i>
                                            <small style="color: #70a1ff" class="text-muted">Địa chỉ : </small>
                                            <p>{{Auth::user()->delivery->delivery_address}}</p>
                                            <small style="color: #70a1ff" class="text-muted">Xã, phường: </small>
                                            <p class="mb-0">{{Auth::user()->delivery->ward->ward_name}}</p>
                                            <small style="color: #70a1ff" class="text-muted">Quận, huyện: </small>
                                            <p class="mb-0">{{Auth::user()->delivery->district->district_name}}</p>
                                            <small style="color: #70a1ff" class="text-muted">Quận, huyện: </small>
                                            <p class="mb-0">{{Auth::user()->delivery->province->province_name}}</p>

                                            @else
                                            <i class="fa fa-map-marker" style="color: #70a1ff" aria-hidden="true"></i>
                                            <small style="color: #70a1ff" class="text-muted">Địa chỉ chưa cập nhật</small>
                                            @endif
                                        {{-- </div> --}}


                                    </div>
                                </div>
                            </div>

                        </div>
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
                                        @foreach($bill as $dsbill)

                                        <tr>
                                            <td>{{$dsbill->bills->bill_code}}</td>
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
                                        @foreach($bills as $dsbill)

                                        {{-- {{dd($dsbill)}} --}}
                                        <tr>
                                            <td>{{$dsbill->bills->bill_code}}</td>
                                            @php
                                             $price = $dsbill->detailbill2->book_price ;
                                             $qty = $dsbill->qty;
                                             $gia = $price * $qty ;
                                            @endphp
                                            <td>{{ number_format($gia,0,',','.') }} đ</td>
                                            {{-- <td>{{ number_format($dsbill->bills->bill_total,0,',','.') }} đ</td> --}}

                                            <td>


                                                  <div class="dropdown" >
                                                      {{-- {{dd()}} --}}
                                                      @if($dsbill->status->id == 3)
                                                  <button  class="dropbtn" style="border-radius: 10px !important; font-size: 12px !important;background-color: #ffc107;;">
                                                      {{$dsbill->status->status_name}}
                                                    </button>

                                                    @elseif($dsbill->status->id == 8)
                                                  <button  class="dropbtn" style="border-radius: 10px !important; font-size: 12px !important;background-color: #dc3545;">
                                                      {{$dsbill->status->status_name}}
                                                    </button>
                                                       @elseif($dsbill->status->id == 4)
                                                  <button  class="dropbtn" style="border-radius: 10px !important; font-size: 12px !important;background-color: #007bff;">
                                                      {{$dsbill->status->status_name}}
                                                    </button>
                                                      @elseif($dsbill->status->id == 5)
                                                  <button  class="dropbtn" style="border-radius: 10px !important; font-size: 12px !important;background-color: #17a2b8;">
                                                      {{$dsbill->status->status_name}}
                                                    </button>
                                                     @elseif($dsbill->status->id == 7)
                                                  <button  class="dropbtn" style="border-radius: 10px !important; font-size: 12px !important;background-color: #28a745;">
                                                      {{$dsbill->status->status_name}}
                                                    </button>
                                                    @else
                                                    <button  class="dropbtn" style="border-radius: 10px !important; font-size: 12px !important;background-color: #28a745;">
                                                        {{$dsbill->status->status_name}}
                                                      </button>
                                                    @endif

                                                    <div class="dropdown-content">

                                                        @if($dsbill->status->id == 3)
                                                        @if($dsbill->bills->id_payment == 1)
                                                            <a href="{{route('status8',['id' => $dsbill->id])}}">Huy don hàng</a>
                                                            @endif
                                                            <a href="{{route('status4',['id' => $dsbill->id])}}">Xác nhận đơn hàng</a>

                                                            @endif
                                                                @if($dsbill->status->id == 4)
                                                                <a style="" href="{{route('status5',['id' => $dsbill->id])}}">Đang vận chuyển</a>
                                                                @endif
                                                                    @if($dsbill->status->id == 5)
                                                                    <a  href="{{route('status7',['id' => $dsbill->id])}}">Giao hàng thanh cong</a>
                                                                    @endif
                                                    </div>
                                                  </div>

                                            </td>

                                            <td>

                                                <a href="#" >
                                                    {{$dsbill->bills->userbill->info->info_lastname}}
                                                    {{$dsbill->bills->userbill->info->info_name}}
                                                </a>



                                            </td>




                                            <td>
                                                {{-- {{$dsbill->bills->created_at}} --}}
                                                {{date('H:i d-m-Y', strtotime($dsbill->bills->created_at))}}
                                            </td>

                                            <td>
                                                {{date('H:i d-m-Y', strtotime($dsbill->updated_at))}}
                                                {{-- {{$dsbill->bills->updated_at}} --}}
                                            </td>

                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $bills->links() !!}
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
