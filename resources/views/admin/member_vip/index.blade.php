@extends('admin.layout')
@section('title','Nhà xuất bản')
@section('admin_content')
<head>
    <style>

              /* td {
    text-align-last: center;
}
th {
    text-align: -webkit-center;
} */
.a.table-responsive {
    /* text-align: center; */
}

    </style>
</head>

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Quản lý tài khoản VIP</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('ad.home')}}">{{Auth::user()->vaitro->role_name}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Tài khoản VIP</a></li>
                                {{-- <li class="breadcrumb-item active" aria-current="page">Nhà xuất bản</li> --}}
                            </ol>
                            {{-- <img height="100px" src="{{asset('public/storage/users-avatar/vip.PNG')}}" alt=""> --}}
                        </nav>
                    </div>

                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card" >
                        <div class="header" style="padding-bottom: 0px !important">

                             {{-- <button type="button" class="btn btn-round btn-success" data-toggle="modal" data-target="#exampleModal">Thêm</button> --}}


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
                        <br>
                        <div class="body">
                            <div class="a table-responsive">
                                <table class="table table-hover dataTable table-custom spacing5">
                                    <thead>
                                        <tr style=" text-align: center; ">
                                            <th>STT</th>
                                            <th>Logo</th>
                                            <th>Loại tài khoản</th>
                                            <th>Số tiền đăng ký</th>
                                            <th>Số bài đăng đấu giá trong một ngày</th>
                                            <th>Mô tả</th>
                                            <th>Thao tác</th>

                                        </tr>
                                    </thead>

                                    <tbody id="data">

                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}
                                        @foreach($type_members as $type_member)

                                        <tr >
                                            <td  style=" text-align: center; ">{{$type_member->member_vip_id}}</td>
                                            <td  style=" text-align: center; ">
                                                <img  height="70px" src="{{$type_member->member_vip_id ==1? asset('public/storage/users-avatar/vip.PNG'): asset('public/storage/users-avatar/basic.PNG')}}" alt="">

                                            </td>
                                            <td  style=" text-align: center; ">{{$type_member->member_vip_name}}</td>
                                            <td  style=" text-align: center; " class="price">
                                                {{number_format($type_member->member_vip_price, 0, '', ',')}} đ
                                            </td>
                                            <td  style=" text-align: center; ">{{$type_member->member_type_number_posts_per_day}} lần 1 ngày</td>
                                            <td  data-toggle="tooltip" data-placement="bottom" title="{{$type_member->member_vip_note}}" style=" text-align: center;overflow: hidden;
                                            text-overflow: ellipsis;    max-width: 226px;">{{$type_member->member_vip_note}}

                                            </td>

                                            <td  >
                                                         {{-- <button type="button" class="btn btn-round btn-success" >Sửa</button> --}}
                                            <a href="" data-toggle="modal" data-target="#editMember{{$type_member->member_vip_id}}" style="padding-left:30px"><i class="fa fa-pencil"></i></a>


                                                {{-- modal sửa --}}
                                            <div  class="modal fade" id="editMember{{$type_member->member_vip_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Sửa loại tài khoản</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form>
                                                            <input id="id_member_vip{{$type_member->member_vip_id}}" value="{{$type_member->member_vip_id}}"  hidden>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Tên loại tài khoản:</label>
                                                                <input required id="name{{$type_member->member_vip_id}}" readonly value="{{$type_member->member_vip_name}}"type="text" class="form-control" id="recipient-name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Giá đăng ký:</label>
                                                                {{-- <input id="input" step="10000" type="number" value="{{$type_member->member_vip_price}}" min="0" class="form-control" > --}}
                                                                <input required  {{$type_member->member_vip_id == 2 ? 'readonly' : ''}} id="input{{$type_member->member_vip_id}}" value="{{$type_member->member_vip_price}}" step="10000"  min="0" class="form-control" >

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Số bài đăng đấu giá trong một ngày (giới hạn bài đăng):</label>
                                                                <input required id="number_posts{{$type_member->member_vip_id}}"  value="{{$type_member->member_type_number_posts_per_day}}" type="number" max="5" min="1" list="cityname" class="form-control" >
                                                                    {{-- <datalist  id="cityname">
                                                                        <option value="Không giới hạn bài đăng">
                                                                    </datalist> --}}
                                                                </div>
                                                                <div class="form-group">
                                                                  <label for="message-text" class="col-form-label">Quyền lợi và thông tin khác:</label>
                                                                <textarea hidden rows="10"  class="form-control" >
                                                                        {{$type_member->member_vip_note}}
                                                                    </textarea>
                                                                    <textarea rows="5" required class="form-control" id="note{{$type_member->member_vip_id}}" style="white-space: pre-line;" name="mota"> {{$type_member->member_vip_note}}</textarea>

                                                                </div>
                                                            </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                            <button id="edit{{$type_member->member_vip_id}}" onclick="edit({{$type_member->member_vip_id}})" type="button" class="btn btn-primary">Sửa tài khoản</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                {{-- <a href="{{Route('pbh.delete',['id' => $pbh->id])}}"><i class="fa fa-trash-o fa-fw"></i></a> --}}
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




    <script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>

   {!! Toastr::message() !!}

   {{-- <script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script> --}}
   <script src="{{asset('public/admin/toastr/jquery.min.js')}}" ></script>
<script>
    $(document).ready(function(){
        // getData();
            // vip :id =1
        $('#input1').on('input', function(e){
            $(this).val(formatCurrency(this.value.replace(/[, VNĐ]/g,'')));
        }).on('keypress',function(e){
            if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
        }).on('paste', function(e){
            var cb = e.originalEvent.clipboardData || window.clipboardData;
            if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
        });
function formatCurrency(number){
    var n = number.split('').reverse().join("");
    var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
    return  n2.split('').reverse().join('') + ' VNĐ';
}

var hihi =$('#input1').val();
// $('body').on('mouseout', function(e){
    $('#input1').val(formatCurrency(hihi.replace(/[, VNĐ]/g,''))
// }
).on('keypress',function(e){
    if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
}).on('paste', function(e){
    var cb = e.originalEvent.clipboardData || window.clipboardData;
    if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
});

// thường id: 2
$('#input2').on('input', function(e){
            $(this).val(formatCurrency(this.value.replace(/[, VNĐ]/g,'')));
        }).on('keypress',function(e){
            if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
        }).on('paste', function(e){
            var cb = e.originalEvent.clipboardData || window.clipboardData;
            if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
        });
function formatCurrency(number){
    var n = number.split('').reverse().join("");
    var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
    return  n2.split('').reverse().join('') + ' VNĐ';
}

var hihi =$('#input2').val();
// $('body').on('mouseout', function(e){
    $('#input2').val(formatCurrency(hihi.replace(/[, VNĐ]/g,''))
// }
).on('keypress',function(e){
    if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
}).on('paste', function(e){
    var cb = e.originalEvent.clipboardData || window.clipboardData;
    if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
});





//     $('#input').on('input', function(e){
//     $('#input').val(formatCurrency(this.value.replace(/[, VNĐ]/g,'')));
// }
// ).on('keypress',function(e){
//     if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
// }).on('paste', function(e){
//     var cb = e.originalEvent.clipboardData || window.clipboardData;
//     if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
// });
// function formatCurrency(number){
//     var n = number.split('').reverse().join("");
//     var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
//     return  n2.split('').reverse().join('') + ' VNĐ';
// }

//     $('#add').on('click', function(){
//         var name = $('#name').val();
//         var price = $('#input').val();
//         var number_posts = $('#number_posts').val();
//         var info = $('#info').val();
//         if(info == '' || price== ''|| number_posts == '' || info == '' ){

//         }
//         else{
//             $.ajax({
//                 url: "",
//                 method: "POST",
//                 data:{name: name, price: price, number_posts: number_posts, info: info},
//                 _token: "{{ csrf_token() }}",
//                 success: function(data){
//                     $('#exampleModal').reset();
//                     swal("Thêm loại tài khoản thành công!", "", "success");
//                 }
//                 else{
//                     swal("Thêm loại tài khoản không thành công!", "", "danger");
//                 }
//             });
//         }
//     })



// function getData(){
//     $.ajax({
//                 url: "{{route('getData_member_vip')}}",
//                 method: "POST",
//                 data:{  "_token": "{{ csrf_token() }}",},
//                 success: function(data){

//                     // $('#exampleModal').reset();
//                     // console.log(data.data);
//                     swal("Thêm loại tài khoản thành công!", "", "success");
//                 },

//                 error: function (jqXhr, textStatus, errorMessage) { // error callback
//                     console.log(errorMessage);
//                     swal("Thêm loại tài khoản không thành công!", "", "danger");
//                 }
//             });
// }




});
</script>
<script>

    // set value:

    // $('#edit{{$type_member->member_vip_id}}').on('click', function(){
    //  edit();
    // });
function edit(numberID){
    var id =$(`#id_member_vip${numberID}`).val();
    var price =$(`#input${numberID}`).val();
    var number_posts = $(`#number_posts${numberID}`).val();
    var info = $(`#note${numberID}`).val();
$.ajax({
         url: "{{route('member_vip_edit')}}",
         method: "POST",
         data:{id_member_vip: id, price:price , number_posts:number_posts , info:info  ,_token: "{{ csrf_token() }}"},

         success: function(data){
             console.log(data);

            //  $('#exampleModal').reset();
             location.reload();
             swal("Sửa loại tài khoản thành công!", "", "success");
             // reload();
         },

         error: function (jqXhr, textStatus, errorMessage) { // error callback
             console.log(errorMessage);
             swal("Sửa loại tài khoản không thành công!", "", "danger");
         }
     });
}


</script>

@endsection

