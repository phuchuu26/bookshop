@extends('admin.layout')
@section('title','Thêm sách')
<head>
    <style>
        .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
    min-height: 120px;
}
/* #anhbia{
    animate:5s;
    transition: all 2.5s linear;
}
.av1{
    animate:5s;
    transition: all 2.5s linear;
    animation-duration: 4s;
}
.av1:hover {
    transition: all 800ms ease-out;
}
.av2{
    animate:5s;
    transition: 10s;
    animation-duration: 4s;
    transition-delay: 11s;
}.av3{
    animate:5s;
    transition: 10s;
} */
.body.gui {
    text-align: center;
    margin-top: -31px;
}
.body.hinh {
    min-height: 698px;
}
.body.hinh {
    margin-left: -31px;
}
        select.custom-select {
    color: black;
}
span.input-group-text {
    max-height: 37px;
}
.av{
    display: flex;
}
.col-sm-8.col-md-12.a {
    margin-left: 47px;
}
.body.form {
    min-height: 698px;
}
button#anhbia {
    margin-left: 80px;
}
    </style>
</head>
@section('admin_content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    {{-- <div class="col-md-6 col-sm-12">
                        <h1>Thêm thể loại</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                            <li class="breadcrumb-item"><a href="#">Form</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Validation</li>
                            </ol>
                        </nav>
                    </div>      --}}

                </div>
            </div>
            <div class="row clearfix">

                <div class="col-md-9">
                    <div class="card">
                        <div class="header">
                            <h2>Thêm sách</h2>
                        </div>


                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('size'))
                            <div class="alert alert-danger">  {{session('size')}}</div>
                        @endif
                        @if(session('nullanhbia'))
                        <div class="alert alert-danger">  {{session('nullanhbia')}}</div>
                        @endif


                        @if(session('duoi_file'))
                            <div class="alert alert-danger">  {{session('duoi_file')}}</div>
                        @endif

                        <div class="body form">
                            <form id="basic-form" novalidate  method="POST"  action="{{Route('update_auction',['id' => $auction_book->id])}}" enctype="multipart/form-data"> {{ csrf_field() }}

                                {{-- Hàng 1  --}}
                                    {{-- Danh mục --}}
                                <div class="row">
                                    <div class="input-group mb-3 col-md-6">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Danh mục</label>
                                        </div>
                                        {{-- {{dd($auction_book->theloai->category->id)}} --}}
                                        <select class="custom-select a" id="danhmuc" name="idcategory">
                                            <option>------ Chọn danh mục -------</option>

                                            @foreach($category as $ctg)

                                                <option {{$auction_book->theloai->category->id == $ctg->id ? 'selected' : ''}}  value="{{$ctg->id}}">{{$ctg->category_name}}</option>

                                            @endforeach
                                        </select>

                                    </div>


                                    {{-- Thể loại --}}
                                    <div class="input-group mb-3 col-md-6">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Thể loại</label>
                                        </div>
                                        <select class="custom-select" id="theloai" name="idsubcategory">
                                            <option>------ Chọn thể loại -------</option>

                                            @foreach($subcategory as $sctg)
                                                <option {{$auction_book->id_subcategory ==$sctg->id ? 'selected' : ''}} value="{{$sctg->id}}">{{$sctg->subcategory_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group mb-3 col-md-6">
                                        <a href="#" style="font-size: 13px;">
                                            <i class="fa fa-plus"></i>
                                            Thêm danh mục
                                        </a>
                                    </div>

                                    <div class="input-group mb-3 col-md-6">
                                        <a href="#" style="font-size: 13px;">
                                            <i class="fa fa-plus"></i>
                                            Thêm thế loại
                                        </a>
                                    </div>

                                </div>

                                {{-- Hàng 2  --}}
                                    {{-- Nhà xuất bản --}}
                                <div class="row">
                                    <div class="input-group mb-3 col-md-6">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Nhà xuất bản</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="idpublishinghouse">
                                            <option>------ Chọn nhà xuất bản -------</option>

                                            @foreach($publishinghouse as $pbh)
                                                <option {{$auction_book->id_publishinghouse  ==$pbh->id ? 'selected' : ''}} value="{{$pbh->id}}">{{$pbh->publishinghouse_name}}</option>
                                            @endforeach

                                        </select>

                                    </div>


                                    {{-- Nhà phân phối --}}
                                    <div class="input-group mb-3 col-md-6">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Nhà phân phối</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="idbookcompany">
                                            <option>------ Chọn nhà phân phối -------</option>

                                            @foreach($bookcompany as $bc)
                                                <option  {{$auction_book->id_bookcompany   ==$bc->id ? 'selected' : ''}} value="{{$bc->id}}">{{$bc->bookcompany_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group mb-3 col-md-6">
                                        <a href="#" style="font-size: 13px;">
                                            <i class="fa fa-plus"></i>
                                            Thêm nhà xuất bản
                                        </a>
                                    </div>

                                    <div class="input-group mb-3 col-md-6">
                                        <a href="#" style="font-size: 13px;">
                                            <i class="fa fa-plus"></i>
                                            Thêm nhà phân phối
                                        </a>
                                    </div>

                                </div>

                                {{-- {{ var_dump($auction_book) }} --}}
                                {{-- {{dd($auction_book)}} --}}
                                {{-- @php(dd($auction_book)) --}}
                                 {{-- @dd($auction_book) --}}

                                {{-- Hàng 3 --}}
                                    {{-- Tác giả --}}
                                <div class="row">
                                    <div class="input-group mb-3 col-md-8">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Tác giả</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="idauthor">
                                            <option>------ Chọn tác giả -------</option>

                                            @foreach($author as $auth)
                                                <option  {{$auction_book->id_author ==$auth->id ? 'selected' : ''}} value="{{$auth->id}}">{{$auth->author_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="input-group mb-3 col-md-4">
                                        <a href="#" style="margin-top: 10px;">
                                            <i class="fa fa-plus"></i>
                                            Thêm tác giả
                                        </a>
                                    </div>

                                </div>


                                {{-- //////////////////////////////////////////////////////////// --}}

                                 <div class="row ">
                                    <div class="input-group mb-3 col-md-7">

                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Tên sách</label>
                                    </div>

                                <input type="text" name="bookname" value="{{$auction_book->auction_book_title}}" class="form-control" >
                                    </div>
                                    <div class="input-group mb-3 col-md-5">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Số lượng sách</label>
                                        </div>

                                        <input type="number" value="{{$auction_book->auction_book_quantity}}" name="amount" class="form-control" required>
                                    </div>
                                </div>

                                        {{-- Hàng 4 --}}



                                        {{-- Hàng 5  --}}

                                <div class="row">

                                    <div class="input-group mb-3 col-md-4">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Năm phát hành</label>
                                        </div>

                                        <input type="number" value="{{$auction_book->auction_book_releasedate}}" name="releasedate" class="form-control" required>

                                    </div>

                                     <div class="input-group mb-3 col-md-4">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Số trang</label>
                                        </div>

                                        <input type="number" id="hihi" value="{{$auction_book->auction_book_numberpage}}" name="numberpage" class="form-control" required>

                                    </div>
                                    <div class="input-group mb-3 col-md-4">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Giá khởi điểm</label>
                                        </div>

                                        <input id="input" type="text" value="{{$auction_book->auction_book_reserve_price}}" name="reserve_price" class="form-control" required>

                                    </div>


                                        {{--  --}}
                                </div>

                                                    {{--  --}}
                                <div class="row">
                                    <div class="input-group mb-3 col-md-8">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Thời gian đấu giá mong muốn</label>
                                            </div>
                                            <select   name="time" class="custom-select" id="inputGroupSelect03">
                                                <option   selected>Chọn định dạng thời gian</option>
                                                <option value="Ngày" {{$auction_book->auction_book_time_type == 'Ngày' ? 'selected':''}}>Ngày</option>
                                              <option value="Giờ"  {{ $auction_book->auction_book_time_type == 'Giờ'  ? 'selected':''}}>Giờ</option>
                                              <option value="Phút"  {{ $auction_book->auction_book_time_type == 'Phút' ? 'selected':''}}>Phút</option>
                                            </select>
                                            <input value="{{$auction_book->auction_book_time}}" style="height:38px;" name="value_time" type="number" name="weight" class="form-control a" required>
                                          </div>
                                    </div>

                                    <div class="input-group mb-3 col-md-4">

                                        <div class="input-group-prepend">
                                            <label style="height:38px;" class="input-group-text" for="inputGroupSelect01">Khối lượng</label>
                                        </div>

                                        <input   value="{{$auction_book->auction_book_weight}}" style="height:38px;" type="text" name="weight" class="form-control" required>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <?php
                                    $data = str_replace( '&', '&amp;', $auction_book->auction_book_description );
                                ?>
                                    <textarea  style="min-height: 150px;" name="mota" id="editor">{{ $data}}</textarea>
                                </div>


                                                    {{--  --}}

                                 {{-- @for($i = 1 ; $i <= 3 ; $i++)

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Hình ảnh {!! $i !!}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"  name="image2[]">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>

                                @endfor --}}




                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="header">
                            <h2>Thêm ảnh bìa sách</h2>
                        </div>

                        {{-- @if(session('size'))
                            <div class="alert alert-danger">  {{session('size')}}</div>
                        @endif


                        @if(session('duoi_file'))
                            <div class="alert alert-danger">  {{session('duoi_file')}}</div>
                        @endif
 --}}
                        <div class="body hinh">




                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Ảnh bìa</span>
                                </div>
                                <div class="custom-file">
                                    {{-- <input type="file" class="custom-file-input" name="book_image">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label> --}}
                                </div>
                            </div>
                            {{-- {{$count}} --}}
                            <div class="av">
                                <div class="col-sm-8  col-md-12 a">
                                    <label for="avatar">
                                    <img src="{{asset('public/upload/products/')}}/{{$auction_book->auction_book_image}}"  id="image" alt="Chọn hình đại diện" width="145" height="145" />
                                    </label>
                                <input accept=".png, .jpg, .jpeg" style="display: none;" value="" type="file" name="book_image" id="avatar" multiple
                                        onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <br>
                            </div>


                                <br>
                                {{-- pic 2 --}}
                                {{-- @foreach($files as $image_sp) --}}
                                <div class="av1">
                                    <div class="col-sm-8  col-md-12 a">
                                        <label for="avatar1">
                                        <img src="{{$count == 0 ?asset('public/admin/img/default-image.jpg'): (asset('public/upload/detail').'/'.$image_sp[0]->image_auction_name)}}"  id="image1" alt="Chọn hình đại diện" width="145" height="145" />
                                        </label>
                                        {{-- accept=".png, .jpg, .jpeg" --}}
                                        <input  style="display: none;"   type="file" name="book_image1" id="avatar1" multiple
                                            onchange="document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <br>

                                </div>
                                <br>
                                {{-- pic 3 --}}
                                <div class="av2">
                                    <div class="col-sm-8  col-md-12 a">
                                        <label for="avatar2">
                                        <img src="{{$count <= 1 ? asset('public/admin/img/default-image.jpg') : asset('public/upload/detail/'.$image_sp[1]->image_auction_name)}}"  id="image2" alt="Chọn hình đại diện" width="145" height="145" />
                                        </label>
                                        <input accept=".png, .jpg, .jpeg" style="display: none;"   type="file" name="book_image2" id="avatar2" multiple
                                            onchange="document.getElementById('image2').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <br>

                                </div>
                                <br>
                                {{-- pic 4--}}
                                <div class="av3">
                                    <div class="col-sm-8  col-md-12 a">
                                        <label for="avatar3">
                                        <img  src="{{ $count <= 2 ? asset('public/admin/img/default-image.jpg') : asset('public/upload/detail/'. $image_sp[2]->image_auction_name)}}" id="image3" alt="Chọn hình đại diện" width="145" height="145" />
                                        </label>
                                        <input accept=".png, .jpg, .jpeg" style="display: none;"   type="file" name="book_image3" id="avatar3" multiple
                                            onchange="document.getElementById('image3').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    <br>

                                </div>

                        <div id="demo">

                        </div>


            {{-- pic 2 --}}

            <button style="margin-bottom: 3px;" type="button" onclick="them()" id="anhbia" class="btn btn-success">Thêm ảnh bìa</button>
                        </div>
                    </div>
                </div>



            </div>
            <div class="row ">

                <div class="col-md-12">
                    <div class="card">
                        <div class="body gui">
                            <button type="submit" style="min-width:130px;" class="btn btn-success">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>


    <script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>

   {!! Toastr::message() !!}
<script src="{{asset('public/admin/toastr/jquery.min.js')}}" ></script>
<script type="text/javascript">
        var arr = 0;
    console.log({{$count}});
    if({{$count}}>0){
        if({{$count}}==3){
        $(".av1").show();
        $(".av2").show();
        $(".av3").show();
        $('#anhbia').hide();
        }
        if({{$count}} ==2){
            arr = 2;
            $(".av1").show();
            $(".av2").show();
            $(".av3").hide();
        }
        if({{$count}} ==1){
            arr = 1;
            $(".av1").show();
            $(".av2").hide();
            $(".av3").hide();

        }
// console.log({{$count}});
    }
    else{

        $(".av1").hide();
        $(".av2").hide();
        $(".av3").hide();
        // them();
    }
    function them(){
         this.arr++;
         $(".av1").show();

         if(this.arr >1){
             $(".av2").show();
            }
            if(this.arr >2){
                $(".av3").show();
                $('#anhbia').hide();
            }
            console.log(this.arr);

        }
    </script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>
<script>
    // $(document).ready(function(){
    // var a =    $('#input');
//     setTimeout(function(){
//     $('#input').val(formatCurrency(this.value.replace(/[, VNĐ]/g,'')));
// }, 100).on('paste', function(e){
//     var cb = e.originalEvent.clipboardData || window.clipboardData;
//     if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
// });;
 var hihi =$('#input').val();
// $('body').on('mouseout', function(e){
    $('#input').val(formatCurrency(hihi.replace(/[, VNĐ]/g,''))
// }
).on('keypress',function(e){
    if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
}).on('paste', function(e){
    var cb = e.originalEvent.clipboardData || window.clipboardData;
    if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
});


    $('#input').on('input', function(e){
    $('#input').val(formatCurrency(this.value.replace(/[, VNĐ]/g,'')));
}
).on('keypress',function(e){
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
    // }
</script>
<script type="text/javascript">
    $(document).ready(function(){


        // alert('chạy được');
        //kiểm tra xem coi nó chạy không
        $("#danhmuc").change(function(){
            var id_theloai = $(this).val();


             // alert(id_theloai);
            //kiểm tra xem có chạy được nhận id option của loaibaiban không


            $.get("/quan-tri/ajax/sub-category/"+id_theloai,function(data){
                // alert(data);
                $("#theloai").html(data);
                $('#theloai').selectpicker('refresh');
                // phải câu lênh selectpicker('refresh') để ko bị lỗi boostrap-selecet

            });
        });
    });
</script>





@endsection
