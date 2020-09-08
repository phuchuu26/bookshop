@extends('admin.layout')
@section('title','Sữa danh mục')
<head>
    <style>
        select#inputGroupSelect01 {
    color: black!important;
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
                            <h2>Sữa danh mục</h2>
                        </div>

                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        <div class="body">
                            <form id="basic-form" novalidate  method="POST"  action="{{Route('ctg.post.edit',['id' => $category->id])}}" enctype="multipart/form-data"> {{ csrf_field() }}

                                <div class="input-group mb-3 ">

                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Tên danh mục</label>
                                    </div>

                                    <input type="text" value="{{$category->category_name}}" name="name"  class="form-control" required>

                                </div>

                                <br>
                                <button type="submit" class="btn btn-success">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
