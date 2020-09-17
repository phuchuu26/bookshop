@extends('admin.layout')
@section('title','Thể loại')
@section('admin_content')

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Thể loại</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('ad.home')}}">Admin</a></li>
                                <li class="breadcrumb-item"><a href="#">Danh sách</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thể loại</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card" >
                        <div class="header" style="padding-bottom: 0px !important">

                            <a  href="{{route('s.ctg.add')}}" class="btn btn-round btn-success">Thêm</a>

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
                            <div class="table-responsive">
                                <table class="table table-hover  dataTable table-custom spacing5">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Danh mục </th>
                                            <th>Thể loại</th>
                                            <th>Thao tác</th>

                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Danh mục </th>
                                            <th>Thể loại</th>
                                            <th>Thao tác</th>

                                        </tr>
                                    </tfoot> --}}
                                    <tbody>

                                        @foreach($subcategory as $sctg)

                                        <tr>
                                            <td>{{$sctg->id}}</td>
                                            <td>{{$sctg->category->category_name}}</td>
                                            <td>{{$sctg->subcategory_name}}</td>
                                            <td colspan="2">
                                                <a href="{{Route('s.ctg.edit',['id' => $sctg->id])}}" style="padding-right: 30px;"><i class="fa fa-pencil"></i></a>

                                                <a href="{{Route('s.ctg.delete',['id' => $sctg->id])}}"><i class="fa fa-trash-o fa-fw"></i></a>
                                            </td>
                                        </tr>

                                        @endforeach



                                    </tbody>
                                </table>
                                {{ $subcategory->links() }}
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


@endsection

