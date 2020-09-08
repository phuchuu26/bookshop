@extends('admin.layout')
@section('title','Thêm sách')
<head>
    <style>

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
                <div class="col-md-12">
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


                        @if(session('duoi_file'))
                            <div class="alert alert-danger">  {{session('duoi_file')}}</div>
                        @endif

                        <div class="body">
                            <form id="basic-form" novalidate  method="POST"  action="{{Route('b.post.add')}}" enctype="multipart/form-data"> {{ csrf_field() }}

                                {{-- Hàng 1  --}}
                                    {{-- Danh mục --}}
                                <div class="row">
                                    <div class="input-group mb-3 col-md-6">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Danh mục</label>
                                        </div>
                                        <select class="custom-select a" id="danhmuc" name="idcategory">
                                            <option>------ Chọn danh mục -------</option>

                                            @foreach($category as $ctg)
                                                <option value="{{$ctg->id}}">{{$ctg->category_name}}</option>

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
                                                <option value="{{$sctg->id}}">{{$sctg->subcategory_name}}</option>
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
                                                <option value="{{$pbh->id}}">{{$pbh->publishinghouse_name}}</option>
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
                                                <option value="{{$bc->id}}">{{$bc->bookcompany_name}}</option>
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
                                                <option value="{{$auth->id}}">{{$auth->author_name}}</option>
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

                                    <input type="text" name="bookname" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3 col-md-5">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Số lượng sách</label>
                                        </div>

                                        <input type="text" name="amount" class="form-control" required>
                                    </div>
                                </div>

                                        {{-- Hàng 4 --}}

                                <div class="row">
                                        {{--  --}}
                                    <div class="input-group mb-3 col-md-5">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Giá ban đầu</label>
                                        </div>

                                        <input type="text" name="sale" class="form-control" placeholder="Có khuyến mãi thì nhập vào đây !" required>

                                    </div>
                                      {{--  --}}

                                        {{--  --}}
                                    <div class="input-group mb-3 col-md-5">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Giá bán</label>
                                        </div>

                                        <input type="text" name="price" class="form-control" placeholder="Giá muốn bán vào đây !" required>

                                    </div>
                                      {{--  --}}
                                </div>

                                <div class="row">
                                    <div class="input-group col-md-6">
                                        <p ><span style="color:#ffc107">*</span> Giá ban đầu phải lớn hơn giá bán !</p>
                                    </div>

                                </div>

                                        {{-- Hàng 5  --}}

                                <div class="row">

                                    <div class="input-group mb-3 col-md-4">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Năm phát hành</label>
                                        </div>

                                        <input type="text" name="releasedate" class="form-control" required>

                                    </div>
                                            {{--  --}}

                                     <div class="input-group mb-3 col-md-4">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Số trang</label>
                                        </div>

                                        <input type="text" name="numberpage" class="form-control" required>

                                    </div>

                                    <div class="input-group mb-3 col-md-4">

                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Khối lượng</label>
                                        </div>

                                        <input type="text" name="weight" class="form-control" required>

                                    </div>
                                        {{--  --}}
                                </div>
                                                    {{--  --}}

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="mota" id="editor"></textarea>

                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Ảnh bìa</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="book_image">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>

                                                    {{--  --}}

                                 @for($i = 1 ; $i <= 3 ; $i++)

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Hình ảnh {!! $i !!}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"  name="image2[]">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>

                                @endfor



                                <br>
                                <button type="submit" class="btn btn-success">Thêm</button>
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
