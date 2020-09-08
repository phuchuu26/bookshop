@extends('admin.layout')
@section('title','Nhà xuất bản')
@section('admin_content')
	
<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Nhà xuất bản</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('ad.home')}}">Admin</a></li>
                                <li class="breadcrumb-item"><a href="#">Danh sách</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Nhà xuất bản</li>
                            </ol>
                        </nav>
                    </div>            
                    
                </div>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card" >
                        <div class="header" style="padding-bottom: 0px !important">

                            <a  href="{{route('pbh.add')}}" class="btn btn-round btn-success">Thêm</a>

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
                                <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nhà xuất bản</th>
                                            <th>Thao tác</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nhà xuất bản</th>
                                            <th>Thao tác</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach($publishinghouse as $pbh)

                                        <tr>
                                            <td>{{$pbh->id}}</td>
                                            <td>{{$pbh->publishinghouse_name}}</td>
                                            <td colspan="2">
                                                <a href="{{Route('pbh.edit',['id' => $pbh->id])}}" style="padding-right: 30px;"><i class="fa fa-pencil"></i></a>

                                                <a href="{{Route('pbh.delete',['id' => $pbh->id])}}"><i class="fa fa-trash-o fa-fw"></i></a>
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


@endsection

