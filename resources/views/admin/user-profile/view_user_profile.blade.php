@extends('admin.layout')
@section('title','Danh sách những khách hàng đã đấu giá')
@section('admin_content')
<head>
    <style>
        .body {
    max-height: 405px;
    min-height: 404px;
}
        /* .body {
    max-height: 380px;
}
        .mr-3 {
    max-height: 216px;
}
        img#image {
    margin-left: 56px;
    margin-top: -5px;
} */
.mr-3 {
    max-height: 360px;
}
img#image {
    margin-top: 15px;
    margin-left: 8px;
}
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
                        <li class="breadcrumb-item"><a href="#">Xem thông tin thành viên</a></li>
                        <li class="breadcrumb-item active"><a href="#">{{$user->info->info_lastname}} {{$user->info->info_name}}</a></li>
                        {{-- <li class="breadcrumb-item active" aria-current="page">Cập nhật thông tin</li> --}}
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    {{-- <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-round" title="">Add New</a> --}}
                </div>
            </div>
        </div>


        <div class="row clearfix">



            <div class="col-xl-4 col-lg-4 col-md-5">
                <div class="card">
                    <div class="header">
                        <h2>Ảnh đại diện</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                        </ul>
                    </div>
                    <div class="body">
                            <div class="d-flex">
                                <div  class="mr-3">
                                <label for="avatar">
                                    <img   id="image"  width="330px" src="{{asset('public/storage/users-avatar/').'/'.$user->avatar}}" alt=""  class="rounded" alt="">
                                </label>

                                <br>
                                <br>

                                <br><br>
                                {{-- <span class="text-light">Test</span> --}}
                            {{-- <p  class="mb-0"><span>Số lần đăng sách  : <strong>{{Auth::user()->book->count()}}</strong></span>
                                    <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp; |  &nbsp; Số lần mua sách : <strong>{{Auth::user()->bill->count()}}</strong></span>


                                    <br> <span>Số lần đăng sách đấu giá : <strong>{{Auth::User()->auction_book->count()}}</strong>
                                        </span>
                                        <br>
                                    <span>Số lần đấu giá : <strong>{{Auth::User()->list_bidder->count()}}</strong>
                                            &nbsp;      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  |   &nbsp;Đấu giá thành công : <strong>{{Auth::User()->getwinner->count()}}</strong> </span>
                                    <br>    <span>Lượt người quan tâm shop : <strong>{{Auth::User()->careShop()}}</strong></span>


                                </p> --}}
                                        </div>


                        </div>


                    </div>
                </div>
                {{-- cập nhật thẻ vip --}}



            </div>

            <div class="col-xl-4 col-lg-4 col-md-5">
                <div class="card">
                    <div class="header">
                        <h2>Thông tin tài khoản</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                        </ul>
                    </div>
                        {{-- duc lo --}}
                           <div class="card">

                    <div class="body">

                        <small class="text-muted">Họ tên thành viên: </small>
                        <p>{{$user->info->info_lastname }} {{$user->info->info_name }}</p>

                        <small class="text-muted">Giới tính: </small>
                        <p>{{$user->info->info_gender ? $user->info->info_gender : 'Chưa nhập giới tính'}}</p>

                        <small class="text-muted">Địa chỉ: </small>
                        @if($user->delivery)
                        <p>số {{$user->delivery->delivery_address}}, {{$user->delivery->ward->ward_name}},
                         {{$user->delivery->district->district_name}}, {{$user->delivery->province->province_name}}</p>
                         @else
                         <p>
                             Khách hàng chưa nhập địa chỉ.
                         </p>
                         @endif

                        <small class="text-muted">Địa chỉ email: </small>
                    <p>{{$user->info->info_email ? $user->info->info_email : 'Chưa nhập địa chỉ email'}}</p>
                        <small class="text-muted">Số điện thoại: </small>
                        <p>{{$user->info->info_phone ? $user->info->info_phone : 'Chưa nhập số điện thoại'}}</p>
                        <small class="text-muted">Ngày sinh: </small>
                        <p class="m-b-0">{{$user->info->info_birth ?   date("d-m-Y", strtotime($user->info->info_birth)) : 'Chưa nhập ngày sinh'}}</p>

                    </div>
                </div>
                </div>

            </div>

            <div class="col-xl-4 col-lg-4 col-md-5">
                <div class="card">
                    <div class="header">
                        <h2>Loại tài khoản</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>

                                    {{-- <li><a href="javascript:void(0);">Another Action</a></li> --}}
                        </ul>
                    </div>
                    <div class="body">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        <small class="text-muted"> Cấp độ tài khoản hiện tại: <strong>{{$user->member ? $user->member->member_vip_name : null }}

                        </strong> </small>
                        <hr>

                        @if($user->member)
                         {{-- 1 = VIP --}}
                            @if($user->member->member_vip_id == 1)
                             <img   style="    width: 250px;
                             margin-left: 47px;margin-bottom: 12px;" src="{{asset('public/storage/users-avatar/vip.png')}}"  class="rounded" alt="">
                             <br>

                             <span>Chính sách và quyền lợi của tài khoản VIP :
                                <br>
                                <br>
                                <strong>{{$user->member->member_vip_note}}</strong>
                            </span>
                                <hr>

                            @elseif($user->member->member_vip_id == 2)
                                {{-- <a href="{{route('regVip')}}">
                                <button style="    margin-top: -41px;
                                margin-left: 106px;" type="button" class="btn btn-primary">
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    Đăng ký ngay
                                </button>

                            </a> --}}
                            <br>
                            <img   style="    width: 250px;
                            margin-left: 47px;margin-bottom: 5px;" src="{{asset('public/storage/users-avatar/basic.png')}}"  class="rounded" alt="">
                            <br>
                            <span>Chính sách và quyền lợi của tài khoản Thường :
                               <br>
                               <br>
                               <strong>{{$user->member->member_vip_note}}</strong>
                               <hr>

                            @endif
                        @endif


                        <hr>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>






<script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   {{-- <script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script> --}}
   <script src="{{asset('public/admin/toastr/jquery.min.js')}}" ></script>
   <script src="{{asset('public/js/bootstrap-datepicker.min.js')}}" tppabs="http://puffintheme.com/demo/oculux/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
   {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL436G6FzMqnMpWjJjV60pTWBHqDa-QgI&libraries=places&language=en"></script> --}}

{{-- <script>
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

        //submit update password
        $('#buttonUpdatePassword').on('click', function(){
            confirmUpdate();
        });
        function confirmUpdate(){

                swal({
                    title: "Xác nhận?",
                    text: "Bạn có chắc muốn cập nhật Mật khẩu không?",
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
                        if($('#confirm_password').val() == '' || $('#current_password').val() == '' || $('#old_password').val() == ''  ){

                            swal("Thao tác cập nhật mật khẩu đã hủy", " Do nhập thiếu các trường dữ liệu :)", "error");
                            if($('#confirm_password').val() == ''){
                                $( "#confirm_password" ).addClass( "error" );
                            }else{
                                $( "#confirm_password" ).removeClass( "error" );
                            }
                            if($('#current_password').val() == ''){
                                $( "#current_password" ).addClass( "error" );
                            }else{
                                $( "#current_password" ).removeClass( "error" );
                            }

                            if($('#old_password').val() == ''){
                                $( "#old_password" ).addClass( "error" );
                            }else{
                                $( "#old_password" ).removeClass( "error" );
                            }

                        }
                        else if($('#confirm_password').val().length < 4 || $('#current_password').val().length < 4 || $('#old_password').val().length < 4 ){
                            // console.log($('#confirm_password').val().length)
                            if($('#confirm_password').val().length< 4){
                                $( "#confirm_password" ).addClass( "error" );
                            }else{
                                $( "#confirm_password" ).removeClass( "error" );
                            }
                            if($('#current_password').val().length < 4){
                                $( "#current_password" ).addClass( "error" );
                            }else{
                                $( "#current_password" ).removeClass( "error" );
                            }

                            if($('#old_password').val().length< 4 ){
                                $( "#old_password" ).addClass( "error" );
                            }else{
                                $( "#old_password" ).removeClass( "error" );
                            }
                            swal("Thao tác cập nhật mật khẩu đã hủy . Do nhập thiếu độ dài của các trường dữ liệu ", " Độ dài quy định của các trường dữ liệu là 4 ký tự ", "error");
                        }
                        else{
                            $('#submitPassword').click();
                        }

                    } else {
                        swal("Hủy", "Thao tác cập nhật đã hủy :)", "error");
                    }
                });
            };

    });
    </script> --}}


{!! Toastr::message() !!}


@endsection



