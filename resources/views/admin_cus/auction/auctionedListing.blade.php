@extends('admin.layout')
@section('title','Danh sách đã thực hiện đấu giá')
@section('admin_content')
<head>
    <style>

        /* progressBar countdown  */
        div.progress-bar {
            text-align: center!important;
            border-radius: 9px;
    /* padding-left: 6px; */
}
        .progress-bar {
            /* border-radius: 37px; */
  width: 238px;
  margin: 5px auto;
  /* text-align: center!important; */
  height: 22px;
  background-color:#c2c2c2;

}
/* #progressBar div {
  box-sizing: border-box;
} */
.progress-bar div {
    /* border-radius: 37px; */
  height: 100%;
  /* text-align: center!important; */
  padding: 0 0px;
  line-height: 22px; /* same as #progressBar height if we want text middle aligned */
  width: 0;
  background-color: #1cbbc3;
  box-sizing: border-box;
}
/* end progressBar countdown  */

        .spinner-grow.text-warning {
    float: left;
    margin-right: 12px;
}
.tit {
    padding-top: 7px;
    padding-left: 19px!important;
    margin-left: 14px!important;
}
        td.title {
    max-width: 150px;
    white-space: nowrap;
    /* min-width: 21px; */
    /* border: 1px solid #000000; */
    overflow: hidden;
    text-overflow: ellipsis;
}
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
                        <h1>Danh sách đã thực hiện đấu giá</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('ad.home')}}">{{Auth::user()->vaitro->role_name}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Đấu giá</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách đã thực hiện đấu giá</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>


            <div class="alert alert-warning" role="warning">
                <div class="spinner-grow text-warning" role="status">
                    <span class="sr-only">Sách đã đấu giá thành công => Vui lòng thanh toán trong vòng 24h. Nếu không sách sẽ được chuyển sang người đấu giá
                        cao thứ hai.</span>
                    </div>
                            <div class="tit">

                                Sách đã đấu giá thành công => Vui lòng thanh toán trong vòng 24h. Nếu không sách sẽ được chuyển sang người đấu giá
                                cao thứ hai.

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

                                <table class="table table-hover dataTable table-custom spacing5">
                                    <thead style="background-color: #343A40!important;" class="a">
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sách</th>
                                            <th>Nguời sở hữu</th>
                                            <th>Thời gian đấu giá</th>
                                            <th>Số lần đấu giá</th>
                                            <th>Số tiền đấu giá lớn nhất</th>
                                            <th>Trạng thái</th>

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
                                        {{-- {{dd($auctionedLists)}} --}}

    @php
    $i =1;
    @endphp
                                            @foreach($auctionedLists as $key => $auctionedList)
                                        <tr>
                                        <td>{{$i}} {{$auctionedList->getBook->id}} {{$key}}</td>
                                            @php
    $i ++;
    @endphp
                                            <td class="title" style="">
                                                {{$auctionedList->getBook->auction_book_title}}
                                            </td>
                                            <td>
                                                {{$auctionedList->getBook->account->info->info_lastname .' '.$auctionedList->getBook->account->info->info_name}}
                                            </td>
                                            <td>
                                                @php
                                                $type = $auctionedList->getBook->auction_book_time_type;
                                                if($type == 'Giờ'){
                                                    $time1 = $auctionedList->getBook->auction_book_time * 60*60;
                                                }else{
                                                    $time1 = $auctionedList->getBook->auction_book_time * 60;
                                                }
                                                // $timetmp = strtotime($time1);
                                                $time2 = strtotime($auctionedList->getBook->endtime->Endtime_auction_date);
                                                $startAuction = $time2 - $time1;
                                                @endphp
                                                    {{-- {{$auctionedList->getBook->endtime->Endtime_auction_date}} --}}
                                                    {{ date('H:i d/m/Y', $startAuction) }} <br> --- <br>
                                                    {{ \Carbon\Carbon::parse($auctionedList->getBook->endtime->Endtime_auction_date)->format('H:i d/m/Y')}}
                                            </td>
                                            <td>

                                                {{$auctionedList->count($auctionedList->id_auction_book)}}
                                            </td>
                                            <td>
                                                {{-- {{dd($auctionedList)}} --}}
                                                {{-- {{$auctionedList->maxPrice($auctionedList->id_auction_book)}} --}}
                                                {{ number_format($auctionedList->maxPrice($auctionedList->id_auction_book),0,',','.') }} đ
                                            </td>
                                            {{-- {{dd($auctionedList->getBook->auction_book_miss_pay)}} --}}
                                            {{-- {{dd($auctionedList->getBook->auction_book_final_winner)}} --}}

                                            @if($auctionedList->getBook->auction_book_final_winner == Auth::user()->id)

                                                {{-- xét xem đã thanh toán chưa --}}
                                                @if($auctionedList->getBook->checkPayment() == false)

                                                        <td class="status[{{$auctionedList->getBook->id}}]">
                                                        {{-- <input class="test" value="{{$auctionedList->getBook->auction_book_title}}" > --}}
                                                        <a href="{{route('checkout_acution',['id' => $auctionedList->getBook->id])}}">

                                                                <button  data-toggle="tooltip" data-placement="top" title="Thanh toán ngay..." class="btn btn-warning" type="button" >
                                                                    Thành công
                                                                    <span  class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                                    Chưa thanh toán
                                                                </button>
                                                            </a>
                                                            <div class="progress-bar"  id="progressBar{{$key}}">
                                                                <div class="div" style="border-radius: 9px;text-align-last: center;"></div>
                                                            </div>
                                                        </td>
                                                        <script>
                                                            // $(document).ready(function(){
                                                                // for
                                                                // var number
                                                                if($('#progressBar').val() != undefined){
                                                                    console.log('YES');

                                                                }else{
                                                                    console.log('NO');

                                                                }


                                                // var test = $('.status[{{$auctionedList->getBook->id}}]');
                                                // var a = 'test{{$auctionedList->getBook->id}}';
                                                // console.log(a);
                                                // var test1 = $('.test').val();
                                                // console.log(test1);

                                                    var numberDayStill = {{$auctionedList->getBook->auction_book_miss_pay}} + 1;

                                                    //   số người bỏ lỡ thanh toán + 1 = ra thời gian kết thúc thanh toán của người thanh toán tiếp theo
                                                var timeEndPayment = {{strtotime( $auctionedList->getBook->endtime->Endtime_auction_date . " + ".( $auctionedList->getBook->auction_book_miss_pay +1 )." days")}};
                                                // var a= '{{$auctionedList->getBook->endtime->Endtime_auction_date . " +1 days"}}';
                                                console.log(timeEndPayment);
                                                // var timeInMillis = Date.parse();

                                                var now = new Date();
                                                var duration = Date.parse(now)/1000;
                                                var timeleft1 = timeEndPayment - duration;
                                                console.log(duration);
                                                console.log(timeleft1);


                                                function progress(timeleft, timetotal, $element) {

                                                        var progressBarWidth = timeleft * $element.width() / timetotal;
                                                            var res = '';
                                                        // xet gio phut giay :
                                                        var distance = timeleft*1000;
                                                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                                        // console.log(days);
                                                            if(hours == 0){
                                                                if(minutes == 0){
                                                                    res = seconds + " Giây ";
                                                                    // document.querySelector("#demo").style.color = "red";
                                                                }
                                                                else{
                                                                    res =
                                                                minutes + " Phút " + seconds + " Giây ";
                                                                // document.querySelector("#demo").style.color = "red";
                                                                }
                                                            }
                                                            else{
                                                                res =  hours + " Giờ " +
                                                                minutes + " Phút " + seconds + " Giây ";
                                                            }

                                                        $element.find('div').animate({ width: progressBarWidth }, 500).html("Còn lại " + res );
                                                        if(timeleft > 0) {
                                                            // console.log(timeleft);
                                                            var a = timeleft / timetotal;
                                                            if(a <= 0.1 ){
                                                                $("#progressBar{{$key}}").find('div').css("background-color","red");
                                                                //     setTimeout(function() {
                                                                    // progress(timeleft - 1, timetotal, $element);
                                                                    //     }, 1000);
                                                                }
                                                                // console.log(a);

                                                                if( a <= 0.04){

                                                                    $("#progressBar{{$key}}").find('div').css("max-height","15px");
                                                                    $("#progressBar{{$key}}").find('div').css("line-height","17px");
                                                                }
                                                                if(a <= 0.03){

                                                                    $("#progressBar{{$key}}").find('div').css("max-height","12px");
                                                                    $("#progressBar{{$key}}").find('div').css("line-height","14px");
                                                                }
                                                                setTimeout(function() {
                                                            progress(timeleft - 1, timetotal, $element);
                                                                }, 1000);


                                                        }else{
                                                                   $.ajax({
                                                                        type: 'POST', //THIS NEEDS TO BE GET
                                                                        url: '{{route('endDurationAuction',['id'=>$auctionedList->getBook->id])}}',
                                                                        data:{
                                                                            "_token": "{{ csrf_token() }}",
                                                                            "numberMiss":{{$auctionedList->getBook->auction_book_miss_pay}},
                                                                            "endTime":{{strtotime($auctionedList->getBook->endtime->Endtime_auction_date)}},
                                                                            },
                                                                        success: function (data) {
                                                                            console.log(data);
                                                                            setTimeout(function(){
                                                                                    location.reload();
                                                                                }, 3000);
                                                                            // location.reload();
                                                                        },
                                                                        error: function() {
                                                                            console.log(data);
                                                                        }
                                                                    });

                                                            $("#progressBar{{$key}}").find('div').html("Hết thời gian thanh toán");
                                                            $("#progressBar{{$key}}").find('div').css("line-height","24px");
                                                        }
                                                };
                                                var big = 86400 *{{$auctionedList->getBook->auction_book_miss_pay + 1}};
                                            progress(timeleft1, 86400, $('#progressBar{{$key}}'));

                                            // });
                                            </script>
                                            @else
                                            {{-- đã thanh toán đấu giá --}}
                                            <td>
                                                <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Xem trạng thái đơn hàng..."  type="button" >
                                                <a style="color: white" href="{{route('detail_bill_auction',['id'=> $auctionedList->getBook->id])}}">
                                                      Thanh toán thành công

                                                  </a>
                                                </button>
                                              </td>
                                            @endif
                                                  @else
                                                  <td>
                                                  <button class="btn btn-danger" type="button" >
                                                    Thất bại
                                                  </button>
                                                </td>
                                                  @endif
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
{{-- {{dd($auctionedList->getBook->endtime->Endtime_auction_date )}} --}}
{{-- {{dd($auctionedLists)}} --}}

    <script src="{{asset('public/admin/toastr/jquery.min.js')}}"></script>

    <script src="{{asset('public/admin/toastr/toastr.min.js')}}" ></script>


   {!! Toastr::message() !!}


@endsection

