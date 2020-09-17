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
                                <li class="breadcrumb-item"><a href="{{route('ad.home')}}">Admin</a></li>
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
                                    <thead style="text-align-last: center;">
                                        <tr>
                                            <th>ID</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sách</th>
                                            <th>Số lượng</th>
                                            <th>Thời gian đấu giá</th>
                                            <th>Giá khởi điểm</th>
                                            <th>Trạng thái</th>

                                            <th>Thao tác</th>

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

                                        @foreach($list as $li)

                                        <tr>
                                            <td>{{$li->id }}</td>
                                            <td><img src=" {{asset('public/upload/products/')}}/{{$li->auction_book_image }}" height="90px" alt="">
                                            </td>
                                                <td>

                                             {{$li->auction_book_title}}</td>
                                            <td>{{$li->auction_book_quantity}}</td>
                                            <td> {{$li->auction_book_time}}</td>
                                            <td> {{$li->auction_book_reserve_price}}</td>
                                            <td>
                                                @if($li->auction_book_status == 'Chưa duyệt')
                                                <button type="button" style=" color:white;" class="btn btn-sm btn-warning" >
                                                    {{$li->auction_book_status}}
                                                </button>
                                                @else
                                                @endif
                                            {{-- <a class="btn btn-round btn-warning" href="">
                                                {{$li->auction_book_status}}
                                            </a> --}}
                                            </td>

                                            <td colspan="2">
                                                <a href="{{Route('auth.edit',['id' => $li->id])}}" style="padding-right: 30px;"><i class="fa fa-pencil"></i></a>

                                            <a href="{{route('delete_auction',['id' => $li ->id])}}"><i class="fa fa-trash-o fa-fw"></i></a>
                                            </td>
                                        </tr>

                                        @endforeach


                                    </tbody>
                                </table>
                                {{ $list->links() }}
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

