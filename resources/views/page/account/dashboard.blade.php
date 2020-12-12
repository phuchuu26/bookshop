@extends('page.layout')
@section('title','Tài khoản')
@section('page_content')

    <!-- Breadcumb area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li><a href="{{Route('p.home')}}">Trang chủ</a></li>
                        <li class="current"><a>Tài khoản</a></li>
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
                        <div class="col-lg-4 mb-md--40">
                            <div class="user-dashboard-tab__head nav flex-column" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" data-toggle="pill" role="tab" href="#dashboard" aria-controls="dashboard" aria-selected="true">
                                    <i class="fa fa-sitemap"></i>
                                    Dashboard
                                </a>
                            <a class="nav-link"  role="tab" href="{{route('shopuser',['id' => Auth::user()->id])}}" aria-selected="true">
                                    <i class="fa fa-sitemap"></i>
                                    Shop của tôi
                                </a>

                                <a class="nav-link" data-toggle="pill" role="tab" href="#orders" aria-controls="orders" aria-selected="true">
                                    <i class="fa fa-list-alt"></i>
                                    Đơn hàng
                                </a>
                                <a class="nav-link"  role="tab" href="{{route(config('chatify.path'))}}" aria-selected="true">
                                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                    Trò chuyện
                                </a>

                                {{-- <a class="nav-link" data-toggle="pill" role="tab" href="#downloads" aria-controls="downloads" aria-selected="true">Downloads</a> --}}

                                <a class="nav-link" data-toggle="pill" role="tab" href="#accountdetails" aria-controls="accountdetails" aria-selected="true">
                                    <i class="fa fa-cogs"></i>
                                    Tài khoản
                                </a>


                            <a class="nav-link b" data-toggle="pill" id="a"  data1="{{route('test1',0)}}" data="{{route('test',0)}}"​  role="tab" href="#addresses" aria-controls="addresses" aria-selected="true">
                                    <i class="fa fa-truck"></i>
                                    Địa chỉ giao hàng
                                </a>



                                <a class="nav-link" href="{{route('p.logout')}}">
                                    <i class="fa fa-power-off"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="user-dashboard-tab__content tab-content">
                                <div class="tab-pane fade show active" id="dashboard">

                                    <p>Hello
                                    	<strong>{{Auth::user()->info->info_name}} {{Auth::user()->info->info_lastname}}</strong>
                                    	(Không phải <strong>{{Auth::user()->info->info_name}} {{Auth::user()->info->info_lastname}}</strong>?
                                    	<a href="{{route('p.logout')}}">Đăng xuất</a>)
                                    </p>

                                    <p style="color:blue; font-size: 16px;">Có
                                        <span style="color : green; ">
                                            {{$bill->count()}}
                                        </span> đơn hàng đang được xử lý !
                                    </p>


                                      <div class="account-table table-content table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr align="center">
                                                    <th>Code</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bill as $bills)
                                                <tr  align="center">
                                                    <td>{{$bills->bill_code}}</td>




                                                    <td class="wide-column">{{date("A H:i || d-m-Y  ",strtotime($bills->created_at)) }}
                                                    </td>

                                                    <td><a href="{{Route('d.bill',['id' => $bills->id])}}" style="background-color: #9fd84a" class="btn btn-4 btn-style-2">View</a></td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


								{{-- Đơn hàng --}}
                                <div class="tab-pane fade" id="orders">

                                    <p style="color:blue; font-size: 16px;">Có
                                        <span style="color : green; ">
                                            {{$bill2->count()}}
                                        </span> đơn hàng đang được xử lý !
                                    </p>

                                    <div class="account-table table-content table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr align="center">
                                                    <th>Code</th>
                                                    <th>Trạng thái</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- {{dd($bill2)}} --}}
                                                @foreach($bill2 as $b2)
                                                <tr align="center">
                                                    <td>{{$b2->bill_code}}</td>


                                                    <td>


                                                        @if($b2->id_status == 3)

                                                            <button class="btn btn-4 btn-style-3" style="padding: 7px 9px 7px 9px; background-color: #6c757d">
                                                                {{$b2->status->status_name}}

                                                            </button>

                                                        @elseif($b2->id_status == 4)

                                                            <button class="btn btn-4 btn-style-3" style="padding: 7px 9px 7px 9px; background-color: #f66d9b    ">
                                                                {{$b2->status->status_name}}

                                                            </button>


                                                        @elseif($b2->id_status == 5)

                                                            <button class="btn btn-4 btn-style-3" style="padding: 7px 9px 7px 9px; background-color: #ffc107    ">
                                                                {{$b2->status->status_name}}

                                                            </button>

                                                        @elseif($b2->id_status == 6)

                                                            <button class="btn btn-4 btn-style-3" style="padding: 7px 9px 7px 9px; background-color: #5CB65F">
                                                                {{$b2->status->status_name}}

                                                            </button>

                                                        @elseif($b2->id_status == 7)

                                                            <button class="btn btn-4 btn-style-3" style="padding: 7px 9px 7px 9px; background-color: #17a2b8">
                                                                {{$b2->status->status_name}}

                                                            </button>


                                                        @elseif($b2->id_status == 8)

                                                            <button class="btn btn-4 btn-style-3" style="padding: 7px 9px 7px 9px; background-color: #E15858">
                                                                {{$b2->status->status_name}}

                                                            </button>


                                                        @endif

                                                    </td>

                                                    <td class="wide-column">{{date("A H:i || d-m-Y  ",strtotime($b2->created_at)) }}
                                                    </td>



                                                    <td>
                                                        <a href="{{Route('d.bill',['id' => $b2->id])}}" style="background-color: #9fd84a" class="btn btn-4 btn-style-2">View</a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="downloads">
                                    <div class="account-table table-content table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Downloads</th>
                                                    <th>Expires</th>
                                                    <th>Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="wide-column">Volga - Ecommerce Bootstrap Template</td>
                                                    <td class="wide-column">August 10, 2018</td>
                                                    <td>Never</td>
                                                    <td><a href="" class="btn btn-5 btn-style-2">Download File</a></td>
                                                </tr>
                                                <tr>
                                                    <td class="wide-column">Volga - Ecommerce Bootstrap Template</td>
                                                    <td class="wide-column">September 19, 2018</td>
                                                    <td>Never</td>
                                                    <td><a href="" class="btn btn-5 btn-style-2">Download File</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- address --}}
                                <div class="tab-pane fade" id="addresses">
                                    <div class="billing-address mb--20">
                                        <h4>Địa chỉ giao hàng</h4>

                                        <div class="address-form" id="billing_address">
                                            @if(Auth::user()->delivery)

                                                <form class="form" method="POST"  action="{{Route('delivery',['id' => Auth::user()->id])}}" enctype="multipart/form-data"> {{ csrf_field() }}

                                                    <div class="form-row mb--20">
                                                        <div class="form__group col-md-8 mb-sm--30">
                                                            <label class="form__label">Họ và tên người nhận: <span>*</span></label>
                                                            <input type="text" value="{{Auth::user()->delivery->delivery_name}}"  class="form__input form__input--3" name="name">
                                                        </div>

                                                        <div class="form__group col-md-4 mb-sm--30">
                                                            <label  class="form__label">Số điện thoại</label>
                                                            <input type="text" value="{{Auth::user()->delivery->delivery_telephone}}" name="phone"  class="form__input form__input--3">
                                                        </div>

                                                    </div>

                                                    {{-- /////////////////////////////////////////////////// --}}


                                                    <div class="form-row mb--20">
                                                        <div class="form__group col-12">
                                                            <label class="form__label">Tỉnh thành: </label>
                                                            <select name="province" id="tinhthanh" class="form__input form__input--3 nice-select">
                                                                <option value="">Chọn tỉnh thành</option>


                                                                @foreach($province as $pr)
                                                                <!-- $baiban chuyển đên model baiban xong chuyển đên model loainho để lấy ra được id của loại bai bản = loai nho -->
                                                                    <option
                                                                        @if(Auth::user()->delivery->delivery_provice == $pr->id)
                                                                        {{"selected"}}
                                                                        @endif

                                                                        value="{{$pr->id}}">{{$pr->province_name}}
                                                                    </option>
                                                                @endforeach


                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-row mb--20">
                                                        <div class="form__group col-12">
                                                        <label   class="form__label" >Quận, huyện: </label>
                                                            <select name="district"   id="quanhuyen" class="form__input form__input--3 ">
                                                                <option value="">Chọn quận huyện</option>

                                                                @foreach($district as $dt)
                                                                <!-- $baiban chuyển đên model baiban xong chuyển đên model loainho để lấy ra được id của loại bai bản = loai nho -->
                                                                    <option
                                                                        @if(Auth::user()->delivery->delivery_district == $dt->id)
                                                                        {{"selected"}}
                                                                        @endif

                                                                        value="{{$dt->id}}">{{$dt->district_name}}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-row mb--20">
                                                        <div class="form__group col-12">
                                                            <label class="form__label">Phường, xã: </label>
                                                            <select name="ward" id="phuongxa" class="form__input form__input--3 ">
                                                                <option value="">Chọn phường xã</option>



                                                                @foreach($ward as $wa)
                                                                <!-- $baiban chuyển đên model baiban xong chuyển đên model loainho để lấy ra được id của loại bai bản = loai nho -->
                                                                    <option
                                                                        @if(Auth::user()->delivery->delivery_ward == $wa->id)
                                                                        {{"selected"}}
                                                                        @endif

                                                                        value="{{$wa->id}}">{{$wa->ward_name}}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>






                                                    {{-- /////////////////////////////////////////////////// --}}

                                                    <div class="form-row mb--20">
                                                        <div class="form__group col-12">
                                                            <label  class="form__label">Số nhà <span>*</span></label>
                                                            <input type="text" value="{{Auth::user()->delivery->delivery_address}}" name="address"  class="form__input form__input--3">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form__group col-12">
                                                            <button type="submit" class="btn btn-5 btn-style-2">Save Address</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            @else

                                                <form class="form" method="POST"  action="{{Route('delivery2')}}" enctype="multipart/form-data"> {{ csrf_field() }}

                                                    <div class="form-row mb--20">
                                                        <div class="form__group col-md-8 mb-sm--30">
                                                            <label class="form__label">Họ và tên người nhận: <span>*</span></label>
                                                            <input type="text"  class="form__input form__input--3" name="name">
                                                        </div>

                                                        <div class="form__group col-md-4 mb-sm--30">
                                                            <label  class="form__label">Số điện thoại</label>
                                                            <input type="text" name="phone"  class="form__input form__input--3">
                                                        </div>

                                                    </div>

                                                    {{-- /////////////////////////////////////////////////// --}}


                                                    <div class="form-row mb--20">
                                                        <div class="form__group col-12">
                                                            <label class="form__label">Tỉnh thành: </label>
                                                            <select name="province" id="tinhthanh" class="form__input form__input--3 nice-select">
                                                                <option value="">Chọn tỉnh thành</option>

                                                                @foreach($province as $pr)
                                                                    <option value="{{$pr->id}}">{{$pr->province_name}}</option>

                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-row mb--20">
                                                        <div class="form__group col-12">
                                                            <label class="form__label" >Quận, huyện: </label>
                                                            <select name="district" id="quanhuyen" class="form__input form__input--3 ">
                                                                <option value="">Chọn quận huyện</option>

                                                                @foreach($district as $dt)
                                                                    <option value="{{$dt->id}}">{{$dt->district_name}}</option>

                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-row mb--20">
                                                        <div class="form__group col-12">
                                                            <label class="form__label">Phường, xã: </label>
                                                            <select name="ward" id="phuongxa" class="form__input form__input--3 ">
                                                                <option value="">Chọn phường xã</option>

                                                                @foreach($ward as $wa)
                                                                    <option value="{{$wa->id}}">{{$wa->ward_name}}</option>

                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>






                                                    {{-- /////////////////////////////////////////////////// --}}

                                                    <div class="form-row mb--20">
                                                        <div class="form__group col-12">
                                                            <label  class="form__label">Số nhà <span>*</span></label>
                                                            <input type="text" name="address"  class="form__input form__input--3">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form__group col-12">
                                                            <button type="submit" class="btn btn-5 btn-style-2">Save Address</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            @endif
                                        </div>

                                    </div>
                                </div>


                                {{-- Tài khoản --}}
                                <div class="tab-pane fade" id="accountdetails">
                                    <div class="account-form">
                                        <form action="#" class="form">

                                            <div class="form-row mb--20">
                                                <div class="col-md-6 mb-sm--20">
                                                    <div class="form__group">
                                                        <label for="account_fname" class="form__label">Tên</label>
                                                        <input type="text" value="{{Auth::user()->info->info_name}}" name="name" id="account_fname" class="form__input form__input--3">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form__group">
                                                        <label for="account_lname" class="form__label">Họ</label>
                                                        <input type="text" value="{{Auth::user()->info->info_lastname}}" name="lastname" id="account_lname" class="form__input form__input--3">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row mb--20">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label for="user_email" class="form__label">Email Address</label>
                                                        <input type="email" value="{{Auth::user()->info->info_email}}"name="email" id="user_email" class="form__input form__input--3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-12">
                                                    <h4>Thay đổi mật khẩu</h4>
                                                </div>
                                            </div>
                                            <div class="form-row mb--20">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label for="cur_password" class="form__label">Mật khẩu củ (Nếu không thay đổi để trống)</label>
                                                        <input type="password" name="cur_password" id="cur_password" class="form__input form__input--3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mb--20">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label for="new_password" class="form__label">Mật khẩu mới (Nếu không thay đổi để trống)</label>
                                                        <input type="password" name="password" id="new_password" class="form__input form__input--3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mb--20">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label for="new_password" class="form__label">Nhập lại mật khẩu</label>
                                                        <input type="password" name="confirmpassword" id="confirm_password" class="form__input form__input--3">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-5 btn-style-2">Lưu thay đổi</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{dd($this)}} --}}
    </section>

    <!-- Main Content wrapper end -->

        <script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>

   {!! Toastr::message() !!}


{{-- <script src="{{asset('public/admin/toastr/jquery.min.js')}}" ></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        // console.log($this);
        // alert('chạy được');

        var y = $('#a').attr('data');
        console.log(y);
        var x = $('.b').attr('data1');
        console.log(x);
        //kiểm tra xem coi nó chạy không
        $("#tinhthanh").change(function(){
            // var url = $(this).attr('data-url');
            // var url =x;
            // "/nien-luan-bookshop/tai-khoan/quan-huyen/";
            var id_province = $(this).val();
             // alert(id_province);
            // kiểm tra xem có chạy được nhận id option của loaibaiban không

            $.get(y+id_province,function(data){
                // alert(data);
                $("#quanhuyen").html(data);
                $('#quanhuyen').selectpicker('refresh');
                // phải câu lênh selectpicker('refresh') để ko bị lỗi boostrap-selecet
            });
        });

        $("#quanhuyen").change(function(){
            var id_ward = $(this).val();

            // kiểm tra xem có chạy được nhận id option của loaibaiban không
            $.get(x+id_ward,function(data){
                // alert(data);
                $("#phuongxa").html(data);
                $('#phuongxa').selectpicker('refresh');
                // phải câu lênh selectpicker('refresh') để ko bị lỗi boostrap-selecet
            });
        });


    });
</script>




@endsection
