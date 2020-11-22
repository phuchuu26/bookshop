@extends('admin.layout')
@section('title','Danh sách đấu giá')
@section('admin_content')

<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Danh sách đấu giá</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('ad.home')}}">{{Auth::user()->vaitro->role_name}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Đấu giá</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách đấu giá</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card" >
                        <div class="header" style="padding-bottom: 0px !important">

                            <a  href="{{route('add_auctionBook')}}" class="btn btn-round btn-success">Thêm</a>

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
                                    <tbody  style="text-align-last: center;">

                                        @foreach($list as $li)

                                        <tr>
                                            <td>{{$li->id }}</td>
                                            <td><img src=" {{asset('public/upload/products/')}}/{{$li->auction_book_image }}" height="90px" alt="">
                                            </td>
                                                <td>

                                             {{$li->auction_book_title}}</td>
                                            <td>{{$li->auction_book_quantity}}</td>
                                            <td>
                                                 {{$li->auction_book_time}}
                                                 {{$li->auction_book_time_type}}

                                            </td>
                                            <td class="input" >
                                                {{-- <input type="text" value="{{$li->auction_book_reserve_price}}"> --}}
                                                {{number_format($li->auction_book_reserve_price, 0, '', ',')}} đ
                                            </td>
                                            <td>
                                                {{-- trạng thái  --}}

                                                @if($li->auction_book_status == 'Chưa duyệt')
                                                <button type="button" style=" color:white;" class="btn btn-sm btn-warning" >
                                                    {{$li->auction_book_status}}
                                                </button>
                                                @elseif($li->auction_book_status == 'Được xét duyệt')
                                                <button type="button" style=" color:white;" class="btn btn-sm btn-success" >
                                                {{$li->auction_book_status}}
                                                </button>
                                                @elseif($li->auction_book_status == 'Kết thúc đấu giá')
                                                <button type="button" style=" color:white;" class="btn btn-sm btn-info" >
                                                {{$li->auction_book_status}}
                                                </button>
                                                @else
                                                <button type="button" style=" color:white;" class="btn btn-sm btn-danger" >
                                                    {{$li->auction_book_status}}
                                                    </button>
                                                @endif
                                            {{-- <a class="btn btn-round btn-warning" href="">
                                                {{$li->auction_book_status}}
                                            </a> --}}
                                            </td>

                                            <td colspan="2">
                                                @if($li->auction_book_status == 'Kết thúc đấu giá')
                                                     <a href="{{Route('seenListBidder',['id' => $li->id])}}" style=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                @elseif($li->auction_book_status == 'Được xét duyệt')
                                                     <a href="{{Route('auction.admin.change_status',['id' => $li->id])}}" style=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                @elseif($li->auction_book_status == 'Chưa duyệt')
                                                    <a href="{{Route('edit_auction',['id' => $li->id])}}" style="padding-right: 15px;"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    <a href="{{route('delete_auction',['id' => $li ->id])}}"><i class="fa fa-trash-o fa-fw"></i></a>
                                                @endif
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
<script>
//     var hihi = $('.input');
//     console.log(hihi);
//     for(let i =0; i < hihi.length;i++ ){
//         // console.log(hihi[i].outerText);
//         // console.log(i.val());
//         var hihi1 = hihi[i].outerText;
//         $('body').on('hover', function(e){
//             // console.log('vi');
//         $('.input['+this.i+']').val(formatCurrency(hihi1.replace(/[, VNĐ]/g,'')));
//     }
//     ).on('keypress',function(e){
//         if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
//     }).on('paste', function(e){
//         var cb = e.originalEvent.clipboardData || window.clipboardData;
//         if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
//     });
//     function formatCurrency(number){
//     var n = number.split('').reverse().join("");
//     var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
//     return  n2.split('').reverse().join('') + ' VNĐ';
// }
//     }
// var hihi = $('.input');
// for(let i =0; i < hihi.length;i++ ){
//     var x = hihi[i].outerText;
//     // console.log(x);
//     var a = x.toLocaleString('en-US', {style : 'currency', currency : 'VND'});
//     console.log(a);
// }

</script>

@endsection

