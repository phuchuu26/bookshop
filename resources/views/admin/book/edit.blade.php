@extends('admin.layout')
@section('title','Sữa sách')
<head>
    <style>
        select#inputGroupSelect01 {
    color: black;
    }
    select.custom-select {
    color: black;
    }
    </style>
</head>
@section('admin_content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    {{-- <div class="col-md-6 col-sm-12">
                        <h1>Sữa thể loại</h1>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Sữa sách</h2>
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


                        @if(session('duoi_file'))
                            <div class="alert alert-danger">  {{session('duoi_file')}}</div>
                        @endif

                        <div class="body">
                            <form id="basic-form" novalidate  method="POST"  action="{{Route('b.post.edit',['id' => $book->id])}}" enctype="multipart/form-data"> {{ csrf_field() }}

                                {{-- Hàng 1  --}}
                                    {{-- Danh mục --}}
                                <div class="row">
                                    <div class="input-group mb-3 col-md-6">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Danh mục</label>
                                        </div>
                                        <select class="custom-select" id="danhmuc" name="idcategory">



                                             @foreach($category as $ctg)
                                            <!-- $baiban chuyển đên model baiban xong chuyển đên model loainho để lấy ra được id của loại bai bản = loai nho -->
                                                <option
                                                    @if($book->theloai->category->id == $ctg->id)
                                                    {{"selected"}}
                                                    @endif

                                                    value="{{$ctg->id}}">{{$ctg->category_name}}
                                                </option>
                                            @endforeach


                                        </select>

                                    </div>


                                    {{-- Thể loại --}}
                                    <div class="input-group mb-3 col-md-6">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Thể loại</label>
                                        </div>
                                        <select class="custom-select" id="theloai" name="idsubcategory">

                                            <option>......</option>
                                            @foreach($subcategory as $sctg)
                                                <option

                                                    @if($book->theloai->id == $sctg ->id)
                                                    {{"selected"}}
                                                    @endif

                                                    value="
                                                    {{$sctg->id}}">{{$sctg->subcategory_name}}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group mb-3 col-md-6">
                                        <a href="#" style="font-size: 13px;">
                                            <i class="fa fa-plus"></i>
                                            Sữa danh mục
                                        </a>
                                    </div>

                                    <div class="input-group mb-3 col-md-6">
                                        <a href="#" style="font-size: 13px;">
                                            <i class="fa fa-plus"></i>
                                            Sữa thế loại
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



                                            @foreach($publishinghouse as $pbh)
                                              <option
                                                    @if($book->id_publishinghouse == $pbh->id)
                                                        {{"selected"}}
                                                    @endif
                                                    value="{{$pbh->id}}">{{$pbh->publishinghouse_name}}
                                                </option>
                                            @endforeach


                                        </select>

                                    </div>


                                    {{-- Nhà phân phối --}}
                                    <div class="input-group mb-3 col-md-6">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Nhà phân phối</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="idbookcompany">



                                            @foreach($bookcompany as $bc)
                                              <option
                                                    @if($book->id_bookcompany == $bc->id)
                                                        {{"selected"}}
                                                    @endif
                                                    value="{{$bc->id}}">{{$bc->bookcompany_name}}
                                                </option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group mb-3 col-md-6">
                                        <a href="#" style="font-size: 13px;">
                                            <i class="fa fa-plus"></i>
                                            Sữa nhà xuất bản
                                        </a>
                                    </div>

                                    <div class="input-group mb-3 col-md-6">
                                        <a href="#" style="font-size: 13px;">
                                            <i class="fa fa-plus"></i>
                                            Sữa nhà phân phối
                                        </a>
                                    </div>

                                </div>



                                {{-- Hàng 3 --}}
                                    {{-- Tác giả --}}
                                <div class="row">
                                    <div class="input-group mb-3 col-md-8">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Tác giả</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="idauthor">


                                             @foreach($author as $auth)
                                                <option
                                                @if($book->id_author == $auth->id)
                                                    {{"selected"}}
                                                @endif
                                                value="{{$auth->id}}">{{$auth->author_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="input-group mb-3 col-md-4">
                                        <a href="#" style="margin-top: 10px;">
                                            <i class="fa fa-plus"></i>
                                            Sữa tác giả
                                        </a>
                                    </div>

                                </div>


                                {{-- //////////////////////////////////////////////////////////// --}}

                                 <div class="input-group mb-3 ">

                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Tên sách</label>
                                    </div>

                                    <input type="text" name="bookname" value="{{$book->book_title}}" class="form-control" required>

                                </div>

                                        {{-- Hàng 4 --}}

                                <div class="row">
                                        {{--  --}}
                                    <div class="input-group mb-3 col-md-5">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Giá ban đầu</label>
                                        </div>

                                        <input type="text" name="sale" value="{{$book->book_sale}}" class="form-control" placeholder="Có khuyến mãi thì nhập vào đây !" required>

                                    </div>
                                      {{--  --}}

                                        {{--  --}}
                                    <div class="input-group mb-3 col-md-5">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Giá bán</label>
                                        </div>

                                        <input type="text" name="price" value="{{$book->book_price}}" class="form-control" placeholder="Giá muốn bán vào đây !" required>

                                    </div>
                                      {{--  --}}
                                </div>

                                <div class="row">
                                    <div class="input-group col-md-6">
                                        <p ><span style="color:#ffc107">*</span> Giá ban đầu phải lớn hơn giá bán !</p>
                                    </div>

                                </div>



                                        {{--  --}}

                                <div class="row">


                                    <div class="input-group mb-3 col-md-3">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Năm phát hành</label>
                                        </div>

                                        <input type="text" name="releasedate" value="{{$book->book_releasedate}}" class="form-control" required>

                                    </div>

                                            {{--  --}}

                                     <div class="input-group mb-3 col-md-3">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Số trang</label>
                                        </div>

                                        <input type="text" name="numberpage" value="{{$book->book_numberpage}}" class="form-control" required>

                                    </div>
                                                            {{--  --}}

                                    <div class="input-group mb-3 col-md-3">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Khối lượng</label>
                                        </div>

                                        <input type="text" name="weight" value="{{$book->book_weight}}" class="form-control" required>

                                    </div>

                                </div>
                                                    {{--  --}}

                                <div class="form-group">
                                    <label>Mô tả</label>

                                        <textarea name="mota" value="{{$book->book_description}}" id="editor">{{$book->book_description}}</textarea>

                                </div>

                                {{-- Ảnh bìa --}}
                                <div class="row">
                                    <div class="form-group col-md-2" >
                                        <br>
                                        <img  class="img-fluid" src="{{asset('public/upload/')}}/{{$book->book_image}}" style="margin-top: 15%; margin-bottom: 15px; margin-left: 30px; height: 180px; width: 180px;">

                                    </div>

                                    <div class="form-group col-md-10" >
                                        <label>Ảnh bìa</label>
                                        <div class="form-group col-md-8">
                                            <input type="file" name="book_image"  class="dropify">
                                         </div>


                                    </div>
                                </div>


                                {{-- /////////////////////////////////////////////////////// --}}
                                {{-- sưa nhiêu qua để qua bên test.blaode --}}


                                <br>
                                <button type="submit" class="btn btn-success">Sữa</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>



<script src="{{asset('public/admin/toastr/jquery.min.js')}}" ></script>


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
