@extends('admin.layout')
@section('title','Danh sách những khách hàng đã đấu giá')
@section('admin_content')
<head>
    <style>
        .anh {
    padding-right: 20px;
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
                        <li class="breadcrumb-item"><a href="#">Danh sách tài khoản</a></li>
                        {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
                        {{-- <li class="breadcrumb-item active" aria-current="page">User List</li> --}}
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    {{-- <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-round" title="">Add New</a> --}}
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        {{-- <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Users">Users</a></li> --}}
                        {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addUser">Add User</a></li> --}}
                    </ul>
                    <div class="tab-content mt-0">
                        <div class="tab-pane active show" id="Users">
                            <div class="table-responsive">
                                <table class="table table-hover table-custom spacing8">
                                    <thead>
                                        <tr>
                                            <th style="max-width:10px" >STT</th>
                                            <th style="" class="w100">Tài khoản</th>
                                            {{-- <th></th> --}}
                                            <th>Ngày tạo</th>
                                            <th>Quyền</th>
                                            <th>Loại tài khoản</th>
                                            <th class="w100">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $stt = 1;
                                        @endphp
                                        @foreach($accounts as $data)
                                        <tr>
                                            <td>
                                                {{$stt}}
                                                @php
                                                    $stt++;
                                                @endphp
                                            </td>
                                            {{-- <td class="width5">
                                                <div style="float: right;" class="avtar-pic w35" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name">

                                            </div>
                                        </td> --}}
                                        <td style="display: -webkit-inline-box;">
                                                <div class="anh">
                                                <img style="
                                                            border-radius: 8px;
                                                        width: 35px;
                                                        height: 35px;
                                                        line-height: 35px;" src="{{asset('public/storage/users-avatar').'/'.$data->avatar}}" alt="">
                                                </div>
                                                <br/>
                                                        <div class="content">

                                                            {{-- {{dd($data->info->info_name)}} --}}
                                                            <h6 class="mb-0"> {{$data->info ? $data->info->info_lastname :'' }} {{$data->info ? $data->info->info_name :'' }}</h6>
                                                                <span>{{$data->info ?  $data->info->info_email : '' }}</span>
                                                            </div>
                                        </td>
                                        <td>{{date("H:i d-m-Y",strtotime($data->created_at))}}</td>
                                        <td>
                                            @if($data->level == 1)
                                            <span class="badge badge-danger">Quản trị viên</span>
                                            @else
                                            <span class="badge badge-info">Khách hàng</span>
                                            @endif
                                        </td>
                                        @if($data->level == 1)
                                        <td></td>
                                        @else
                                        <td>
                                            @if($data->id_member_vip == 1)
                                            <span class="badge badge-warning">VIP</span>
                                            @else
                                            <span class="badge badge-info">Thường</span>

                                            @endif
                                        </td>
                                        @endif
                                        <td>


                                        <a href="{{route('view_user_profile',['id'=>$data->id])}}">
                                            <button   class="btn btn-sm btn-default view" >

                                                    <i class="fa fa-eye"></i></button>
                                                </a>

                                            {{-- {{($data->id)}} --}}
                                            {{-- <button onclick="hello()" class="btn btn-sm btn-default delete"><i  class="fa fa-trash-o text-danger"></i></button> --}}
                                                <button onclick="hello({{$data->id}})" class="btn btn-sm btn-default delete"><i  class="fa fa-trash-o text-danger"></i></button>

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
    </div>
</div>

{{-- <script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script> --}}




<script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   {!! Toastr::message() !!}

   {{-- <script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script> --}}
   <script src="{{asset('public/admin/toastr/jquery.min.js')}}" ></script>



   <script>
    function hello(id) {

        confirmDelete();

        function confirmDelete(){
        swal({
                title: "Xác nhận?",
                text: "Bạn có chắc muốn xóa tài khoản này!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Vâng, chắc chắn xóa!",
                cancelButtonText: "Hủy thao tác!",
                closeOnConfirm: false,
                closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                        type: 'GET', //THIS NEEDS TO BE GET
                        url: '{{ route('delete_user') }}',
                        data:{id:id},
                        success: function (data) {
                            console.log(data);
                        swal("Xóa!", "Tài khoản đã xóa thành công.", "success");
                            location.reload();
                        },
                        error: function() {
                            console.log(data);
                        }
                    });


                    } else {
                        swal("Hủy", "Thao tác bị hủy :)", "error");
                    }
                });
            } ;
        }
        </script>

<script>
    $(document).ready(function () {



        function confirmDelete(){
            swal({
                title: "Xác nhận?",
                text: "Bạn có chắc muốn xóa tài khoản này!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Vâng, chắc chắn xóa!",
                cancelButtonText: "Hủy thao tác!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    //   delete();
                    swal("Xóa!", "Tài khoản đã xóa ngay lập tức.", "success");

                } else {
                    swal("Hủy", "Thao tác bị hủy :)", "error");
                            }
                        });
                    } ;

                });


            </script>

{!! Toastr::message() !!}


@endsection



