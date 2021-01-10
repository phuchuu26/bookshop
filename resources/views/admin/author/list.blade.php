@extends('admin.layout')
@section('title','Tác giả')
@section('admin_content')

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Tác giả</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('ad.home')}}">{{Auth::user()->vaitro->role_name}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Danh sách</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tác giả</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card" >
                        <div class="header" style="padding-bottom: 0px !important">

                            <a  href="{{route('auth.add')}}" class="btn btn-round btn-success">Thêm</a>

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
                                {{-- js-basic-example --}}
                                <table class="table table-hover dataTable table-custom spacing5">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tác giả</th>
                                            <th>Ghi chú</th>
                                            @if(\Auth::user()->level == 1)
                                            <th>Thao tác</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tác giả</th>
                                            <th>Ghi chú</th>

                                            <th>Thao tác</th>

                                        </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @php
                                        $stt = 0;
                                        @endphp
                                        @foreach($author as $au)

                                        <tr>
                                            <td>{{++$stt}}</td>
                                            <td>{{$au->author_name}}</td>
                                            <td>{!!$au->author_info !!}</td>

                                            <td colspan="2">
                                                @if(\Auth::user()->level == 1)
                                                    <a href="{{Route('auth.edit',['id' => $au->id])}}" style="padding-right: 30px;"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{Route('auth.delete',['id' => $au->id])}}"><i class="fa fa-trash-o fa-fw"></i></a>
                                                @endif
                                            </td>
                                        </tr>

                                        @endforeach


                                    </tbody>
                                </table>
                                {{ $author->links() }}
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

