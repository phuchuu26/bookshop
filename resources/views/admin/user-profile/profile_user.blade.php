@extends('admin.layout')
@section('title','Danh sách những khách hàng đã đấu giá')
@section('admin_content')
<head>
    <style>
        .error{
            border: 3px solid red!important;
        }
.mb-0, .my-0 {
    margin-bottom: 0!important;
    margin-right: -29px;
}
    </style>
</head>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Quản lý tài khoản</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Cập nhật thông tin</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
                        {{-- <li class="breadcrumb-item active" aria-current="page">Cập nhật thông tin</li> --}}
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-round" title="">Add New</a>
                </div>
            </div>
        </div>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
        <div class="row clearfix">



            <div class="col-xl-4 col-lg-4 col-md-5">
                <div class="card">
                    <div class="header">
                        <h2>Ảnh đại diện</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form action="{{ route('updateAvatar',['id'=>Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex">
                                <div  class="mr-3">
                                <label for="avatar">
                                    <img   id="image"  width="344px" src="{{asset('public/storage/users-avatar/').'/'.Auth::User()->avatar}}"  class="rounded" alt="">
                                </label>
                                <input accept=".png, .jpg, .jpeg" style="display: none;"   type="file" name="avatar" id="avatar" multiple
                                onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                <br>
                                {{-- <h5 class="mb-0">Thay đổi Avatar</h5> --}}
                                <br>
                                <button id="capNhatAnh" style="margin-left: 116px;"type="button" class="btn btn-round btn-primary">Cập nhật</button>
                                <button  style="margin-left: 116px;" type="submit" hidden id="submitForm" class="btn btn-round btn-primary">Cập nhật</button>
                                <br><br>
                                {{-- <span class="text-light">Test</span> --}}
                            <p  class="mb-0"><span>Số lần đăng sách  : <strong>{{Auth::user()->book->count()}}</strong></span>
                                    <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp; |  &nbsp; Số lần mua sách : <strong>{{Auth::user()->bill->count()}}</strong></span>


                                    <br> <span>Số lần đăng sách đấu giá : <strong>{{Auth::User()->auction_book->count()}}</strong>
                                            {{-- &emsp;&emsp;&emsp;  | Đấu giá thành công : <strong>4,230</strong> --}}
                                        </span>
                                        <br>
                                    <span>Số lần đấu giá : <strong>{{Auth::User()->list_bidder->count()}}</strong>
                                            &nbsp;      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  |   &nbsp;Đấu giá thành công : <strong>{{Auth::User()->getwinner->count()}}</strong> </span>
                                    <br>    <span>Lượt người quan tâm shop : <strong>{{Auth::User()->careShop()}}</strong></span></p>
                                        </div>

                                        <div class="changeA">

                                        </div>
                        </div>

                    </form>

                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2>Thông tin</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <small class="text-muted">Địa chỉ: </small>
                        @if(Auth::User()->delivery)
                        <p>số {{Auth::User()->delivery->delivery_address}}, {{Auth::User()->delivery->ward->ward_name}},
                         {{Auth::User()->delivery->district->district_name}}, {{Auth::User()->delivery->province->province_name}}</p>
                         @else
                         <p>
                             Khách hàng chưa nhập địa chỉ.
                         </p>
                         @endif

                        {{-- <hr> --}}
                        <small class="text-muted">Địa chỉ email: </small>
                    <p>{{Auth::User()->info->info_email ? Auth::User()->info->info_email : 'Chưa nhập địa chỉ email'}}</p>
                        {{-- <hr> --}}
                        <small class="text-muted">Số điện thoại: </small>
                        <p>{{Auth::User()->info->info_phone ? Auth::User()->info->info_phone : 'Chưa nhập số điện thoại'}}</p>
                        {{-- <hr> --}}
                        <small class="text-muted">Ngày sinh: </small>
                        <p class="m-b-0">{{Auth::User()->info->info_birth ? Auth::User()->info->info_birth : 'Chưa nhập ngày sinh'}}</p>
                        {{-- <hr> --}}
                        {{-- <small class="text-muted">Mạng xã hội: </small>
                        <p><i class="fa fa-twitter m-r-5"></i> twitter.com/example</p>
                        <p><i class="fa fa-facebook  m-r-5"></i> facebook.com/example</p>
                        <p><i class="fa fa-github m-r-5"></i> github.com/example</p>
                        <p><i class="fa fa-instagram m-r-5"></i> instagram.com/example</p> --}}
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h2>Cập nhật tài khoản</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <form action="{{ route('updateProfile',['id'=>Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <small class="text-muted">Họ: </small>
                                    <input name="lastname" type="text" value="{{Auth::User()->info->info_lastname}}" class="form-control" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <small class="text-muted">Tên: </small>
                                    <input name="name" type="text" value="{{Auth::User()->info->info_name}}" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <small class="text-muted">Giới tính: </small>
                                    <select name="gender" class="form-control">
                                        {{-- <i class="fa fa-venus-mars" aria-hidden="true">
                                        </i> --}}
                                        <option value="" >-- Chọn giới tính --</option>

                                        <option {{Auth::User()->info->info_gender == 'Nam' ? 'selected' : ''}} value="Nam">Nam</option>
                                        <option {{Auth::User()->info->info_gender == 'Nữ' ? 'selected' : ''}} value="Nữ">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <small class="text-muted">Ngày sinh: </small>
                                    <div  class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input name="birth" value="{{Auth::User()->info->info_birth}}" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Ngày sinh">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <small class="text-muted">Số điện thoại: </small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                        </div>
                                        <input name="telephone" id="phone" value="{{Auth::User()->info->info_phone}}" type="text" class="form-control" placeholder="Số điện thoại">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    {{-- {{dd(Auth::User()->delivery->delivery_address)}} --}}
                                    <small class="text-muted">Số nhà ( địa chỉ ): </small>
                                <input name="address" id="address" value="{{Auth::User()->delivery ? Auth::User()->delivery->delivery_address :'' }}" type="text" class="form-control" placeholder="Số nhà">
                                    {{-- <textarea rows="4" type="text" class="form-control" placeholder="Address"></textarea> --}}
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    @php
                                    if(Auth::User()->delivery){
                                        $id_xa = Auth::User()->delivery->delivery_ward;
                                    }
                                    else{
                                        $id_xa = 0;
                                    }
                                    @endphp
                                    <small class="text-muted">Xã,phường: </small>
                                    <select name="ward" id="xa" class="form-control">
                                        <option value="">-- Chọn  --</option>
                                        @foreach($xas as $xa)
                                        <option {{$xa->id == $id_xa ?'selected' :''}} value="{{$xa->id}}">{{$xa->ward_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    @php
                                    if(Auth::User()->delivery){
                                        $id_huyen = Auth::User()->delivery->delivery_district;
                                    }
                                    else{
                                        $id_huyen = 0;
                                    }
                                    @endphp
                                    <small class="text-muted">Quận, huyện: </small>
                                    <select name="district" id="huyen" class="form-control">
                                        <option value="">-- Chọn  --</option>
                                        @foreach($huyens as $huyen)
                                    <option {{$huyen->id == $id_huyen ?'selected' :''}} value="{{$huyen->id}}">{{$huyen->district_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <small class="text-muted">Tỉnh, Thành phố: </small>
                                    @php
                                    if(Auth::User()->delivery){
                                        $id_tinh = Auth::User()->delivery->delivery_provice;
                                    }
                                    else{
                                        $id_tinh = 0;
                                    }
                                    @endphp
                                    <select name="province" id="tinh" class="form-control">
                                        <option value="">-- Chọn  --</option>
                                        @foreach($tinhs as $tinh)
                                        <option {{$tinh->id == $id_tinh ?'selected' :''}} value="{{$tinh->id}}">{{$tinh->province_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                        <button id="updateProfile" style="margin-left: 340px;" type="button" class="btn btn-round btn-primary">Cập nhật</button> &nbsp;&nbsp;
                        <button type="submit" hidden id="submitFormProfile" class="btn btn-round btn-primary">Cập nhật</button>
                    </form>
                        {{-- <button type="button" class="btn btn-round btn-default">Hủy</button> --}}
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2>Cập nhật mật khẩu</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            {{-- <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="louispierce" disabled placeholder="Username">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" value="louis.info@yourdomain.com" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone Number">
                                </div>
                            </div> --}}
                            <div class="col-lg-12 col-md-12">
                                {{-- <h6>Change Password</h6>
                                <hr> --}}
                                <small class="text-muted">Mật khẩu hiện tại: </small>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Mật khẩu hiện tại">
                                </div>
                                <small class="text-muted">Mật khẩu mới: </small>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Mật khẩu mới">
                                </div>
                                <small class="text-muted">Nhập lại mật khẩu mới: </small>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới">
                                </div>
                            </div>
                        </div>
                        <button style="margin-left: 340px;" type="button" class="btn btn-round btn-primary">Cập nhật</button> &nbsp;&nbsp;
                        {{-- <button type="button" class="btn btn-round btn-default">Cancel</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   {!! Toastr::message() !!}

   {{-- <script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script> --}}
   <script src="{{asset('public/admin/toastr/jquery.min.js')}}" ></script>
   <script src="{{asset('public/js/bootstrap-datepicker.min.js')}}" tppabs="http://puffintheme.com/demo/oculux/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL436G6FzMqnMpWjJjV60pTWBHqDa-QgI&libraries=places&language=en"></script>

<script>
    $(document).ready(function () {



        $('#xa').attr('disabled','disabled');
        $('#huyen').attr('disabled','disabled');

        $('#tinh').change(function(){

            // if($('#tinh').val() != ''){

                // console.log('= nha');
                var id_province = $(this).val();
                // alert(id_province);
                $.ajax({
                    type: "GET",
                    url: '{{route('getAjaxHuyen')}}',
                    data:{id:id_province},
                    success: function (data) {
                        // alert(data);
                             $("#huyen").html(data);
                              $('#huyen').prop('disabled', false);
                    },
                    error: function() {
                            console.log(data);
                        }
                });



            // });
        })
         $('#huyen').change(function(){

            var id_dict = $(this).val();
                // alert(id_dict);
                $.ajax({
                    type: "GET",
                    url: '{{route('getAjaxXa')}}',
                    data: {id:id_dict},
                    success: function (data) {
                        // alert(data);
                             $("#xa").html(data);
                             $('#xa').prop('disabled', false);
                    },
                    error: function() {
                            console.log(data);
                        }
                });


        })

        $('#capNhatAnh').on('click',function(){
            xacNhanAnh();

        })
        function xacNhanAnh(){

            swal({
                title: "Xác nhận?",
                text: "Bạn có chắc muốn cập nhật ảnh đại diện không?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Vâng, chắc chắn!",
                cancelButtonText: "Hủy!",
                closeOnConfirm: false,
                closeOnCancel: false
            },

            function(isConfirm) {
                if (isConfirm) {

                    $('#submitForm').click();
                } else {
                    swal("Hủy", "Thao tác cập nhật đã hủy :)", "error");
                }
            });
        };


        // cap nhat thong tin khach
        $('#updateProfile').on('click',function(){
            xacnhanThongtin();

        })
        function xacnhanThongtin(){

            swal({
                title: "Xác nhận?",
                text: "Bạn có chắc muốn cập nhật thông tin không?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Vâng, chắc chắn!",
                cancelButtonText: "Hủy!",
                closeOnConfirm: false,
                closeOnCancel: false
            },

            function(isConfirm) {
                if (isConfirm) {
                    if($('#xa').val() == '' || $('#huyen').val() == '' || $('#tinh').val() == '' || $('#phone').val() == '' || $('#address').val() == '' ){

                        swal("Thao tác cập nhật đã hủy", " Do nhập thiếu các trường dữ liệu :)", "error");
                        if($('#xa').val() == ''){
                            $( "#xa" ).addClass( "error" );
                        }
                         if($('#address').val() == ''){
                            $( "#address" ).addClass( "error" );
                        }

                        if($('#phone').val() == ''){
                            $( "#phone" ).addClass( "error" );
                        }
                         if($('#huyen').val() == ''){
                            $( "#huyen" ).addClass( "error" );
                        }
                         if($('#tinh').val() == ''){
                            $( "#tinh" ).addClass( "error" );
                        }
                    } else{
                        $('#submitFormProfile').click();
                    }

                } else {
                    swal("Hủy", "Thao tác cập nhật đã hủy :)", "error");
                }
            });
        };


    });
    </script>


{!! Toastr::message() !!}


@endsection



