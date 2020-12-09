@extends('admin.layout')
@section('title','Danh sách những khách hàng đã đấu giá')
@section('admin_content')
<head>
    <style>
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
                    <h2>User Profile</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
            {{-- <div class="col-md-12">
                <div class="card social">
                    <div class="profile-header d-flex justify-content-between justify-content-center">
                        <div class="d-flex">
                            <div class="mr-3">
                                <img src="user.png" tppabs="http://puffintheme.com/demo/oculux/assets/images/user.png" class="rounded" alt="">
                            </div>
                            <div class="details">
                                <h5 class="mb-0">Louis Pierce</h5>
                                <span class="text-light">Ui UX Designer</span>
                                <p class="mb-0"><span>Posts: <strong>321</strong></span> <span>Followers: <strong>4,230</strong></span> <span>Following: <strong>560</strong></span></p>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm">Follow</button>
                            <button class="btn btn-success btn-sm">Message</button>
                        </div>
                    </div>
                </div>
            </div> --}}


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
                        <div>
                            {{-- <iframe src="fi000001.1!3m3!1m2!1s0x80859a6d00690021-0x4a501367f076adff!2ssan+francisco,+ca,+usa!5e0!3m2!1sen!2sin!4v1522391841133" tppabs="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1923731.7533500232!2d-120.39098936853455!3d37.63767091877441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1522391841133" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                        </div>
                        <hr>
                        <small class="text-muted">Địa chỉ email: </small>
                    <p>{{Auth::User()->info->info_email ? Auth::User()->info->info_email : 'Chưa nhập địa chỉ email'}}</p>
                        <hr>
                        <small class="text-muted">Số điện thoại: </small>
                        <p>{{Auth::User()->info->info_phone ? Auth::User()->info->info_phone : 'Chưa nhập số điện thoại'}}</p>
                        <hr>
                        <small class="text-muted">Ngày sinh: </small>
                        <p class="m-b-0">{{Auth::User()->info->info_birth ? Auth::User()->info->info_birth : 'Chưa nhập ngày sinh'}}</p>
                        <hr>
                        <small class="text-muted">Mạng xã hội: </small>
                        <p><i class="fa fa-twitter m-r-5"></i> twitter.com/example</p>
                        <p><i class="fa fa-facebook  m-r-5"></i> facebook.com/example</p>
                        <p><i class="fa fa-github m-r-5"></i> github.com/example</p>
                        <p><i class="fa fa-instagram m-r-5"></i> instagram.com/example</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h2>Basic Information</h2>
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
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="">-- Select Gander --</option>
                                        <option value="AF">Male</option>
                                        <option value="AX">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                        <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Birthdate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-globe"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="http://">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="">-- Select Country --</option>


                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="State/Province">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="City">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea rows="4" type="text" class="form-control" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="list-group mb-3 tp-setting">
                                    <li class="list-group-item">
                                        Anyone seeing my profile page
                                        <div class="float-right">
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        Anyone send me a message
                                        <div class="float-right">
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        Anyone posts a comment on my post
                                        <div class="float-right">
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        Anyone invite me to group
                                        <div class="float-right">
                                            <label class="switch">
                                                <input type="checkbox" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button type="button" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                        <button type="button" class="btn btn-round btn-default">Cancel</button>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2>Account Data</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-12">
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
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <hr>
                                <h6>Change Password</h6>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Current Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm New Password">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                        <button type="button" class="btn btn-round btn-default">Cancel</button>
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


    });
    </script>


{!! Toastr::message() !!}


@endsection



