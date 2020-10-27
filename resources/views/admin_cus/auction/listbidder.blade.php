@extends('admin.layout')
@section('title','Danh sách những khách hàng đã đấu giá')
@section('admin_content')
<head>
    <style>
        td {
    text-align: center;
}      th {
    text-align: center;
}
    </style>
</head>
<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Danh sách khách hàng đã đấu giá</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('ad.home')}}">{{Auth::user()->vaitro->role_name}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Đấu giá</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách khách hàng đã đấu giá</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card" >
                        <div class="header" style="padding-bottom: 0px !important">

                            {{-- <a  href="{{route('auth.add')}}" class="btn btn-round btn-success">Thêm</a> --}}

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
                        {{-- {{dd($time)}} --}}
                        <div class="body">

                            <div class="table-responsive">
                                {{-- {{dd(strtotime(\Carbon\Carbon::parse($time)))}} --}}
                                {{-- {{dd($time)}} --}}
                                @php
                                $time1 = strtotime($time->Endtime_auction_date);
                                $startAuction = $time1 - $timeStillAuction;
                                @endphp
                                {{-- {{dd($startAuction)}} --}}
                                <div style="font-weight: bold;float: right;" class="time">Thời gian bắt đầu đấu giá : {{ date('H:i d/m/Y', $startAuction)}} </div>
                                <br>
                                <div style="font-weight: bold;float: right;" class="time">Thời gian kết thúc đấu giá : {{ \Carbon\Carbon::parse($time->Endtime_auction_date)->format('H:i d/m/Y')}} </div>
                                {{-- js-basic-example --}}
                                <table class="table table-hover dataTable table-custom spacing5">
                                    <thead style="background-color: #343A40!important;" class="a">
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên khách hàng</th>
                                            <th>Thời gian đấu giá</th>
                                            <th>Số tiền đấu giá cao nhất</th>
                                            <th>Số lần đấu giá</th>

                                            {{-- <th>Thao tác</th> --}}

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
    $i =1;
    @endphp
                                            @foreach($bidders as $bi)
                                        <tr>
                                            <td>{{$i == 1 ? 'Người thắng cuộc' : $i}}</td>
                                            @php
    $i ++;
    @endphp
                                            <td>{{$bi->info->info->info_lastname .' '.$bi->info->info->info_name}}</td>
                                            <td>{{  date('H:i d/m/Y', strtotime($bi->created_at)) }}</td>

                                            <td>
                                                {{ number_format($bi->list_bidder_auction_money,0,',','.') }} đ
                                                {{-- <a href="{{Route('auth.edit',['id' => $au->id])}}" style="padding-right: 30px;"><i class="fa fa-pencil"></i></a> --}}

                                                {{-- <a href="{{Route('auth.delete',['id' => $au->id])}}"><i class="fa fa-trash-o fa-fw"></i></a> --}}
                                            </td>
                                            <td>
                                                {{-- {{dd($bi)}} --}}
                                                {{-- {{dd(Auth::user()->id)}} --}}
                                                {{$bi->countPerUser($bi->id_auction_book,$bi->id_account)}}
                                            </td>
                                        </tr>

                                        @endforeach


                                    </tbody>
                                </table>
                                {{-- {{ $bidders->links() }} --}}
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

