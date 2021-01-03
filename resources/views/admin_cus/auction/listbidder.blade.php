@extends('admin.layout')
@section('title','Danh sách những khách hàng đã đấu giá')
@section('admin_content')
<head>
    <style>
div#progressBar {
    /* width: 203.75px; */
    /* width: 110px; */
    width: 238px;
}
.div {
    /* align-self: center; */
    /* width: 110px; */
}
/* progressBar countdown  */
div.progress-bar {
    text-align: center!important;
    border-radius: 9px;
/* padding-left: 6px; */
}
.progress-bar {
    /* border-radius: 37px; */
/* width: 90%; */
width: 110.75px;
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


td {
text-align: center;
}      th {
text-align: center;
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

                                            <th>Trạng thái</th>

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
                                            <td>{{$i}}</td>
                                            @php
                                                $time_start = $bi->getBook->endtime->starttime_auction_date;
                                                $time_end = $bi->getBook->endtime->Endtime_auction_date;
                                                // dd(strtotime($time_end));
                                            if($time_current < strtotime($time_end) && $time_current > strtotime($time_start))
                                            {
                                                $still_auction = true;
                                            }

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
                                            {{-- {{dd($bi)}} --}}
                                            @if($bi->getBook->auction_book_final_winner == $bi->id_account)

                                            <td>
                                                {{-- da thanh toan roi --}}
                                                @if($bi->getBook->checkPayment())
                                                @php
                                                $check = true;
                                                @endphp
                                                    <button class="btn btn-success" type="button" >
                                                        Đã thanh toán
                                                      </button>
                                                    @else
                                                      @php
                                                      $check = true;
                                                      @endphp
                                                          <button class="btn btn-warning" type="button" >
                                                              Chưa thanh toán
                                                            </button>
                                                            <div class="progress-bar"  id="progressBar">
                                                                <div class="div" style="border-radius: 9px;text-align-last: center;"></div>
                                                            </div>
                                                            <script>
                                                        // $(document).ready(function(){
                                                            // for
                                                            // var number
                                                            if($('#progressBar').val() != undefined){
                                                                console.log('YES');

                                                            }else{
                                                                console.log('NO');

                                                            }




                                                        var numberDayStill = {{$bi->getBook->auction_book_miss_pay}} + 1;

                                                        //   số người bỏ lỡ thanh toán + 1 = ra thời gian kết thúc thanh toán của người thanh toán tiếp theo
                                                    var timeEndPayment = {{strtotime( $bi->getBook->endtime->Endtime_auction_date . " + ".( $bi->getBook->auction_book_miss_pay +1 )." days")}};
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
                                                                    $("#progressBar").find('div').css("background-color","red");
                                                                    //     setTimeout(function() {
                                                                        // progress(timeleft - 1, timetotal, $element);
                                                                        //     }, 1000);
                                                                    }
                                                                    // console.log(a);

                                                                    if( a <= 0.04){

                                                                        $("#progressBar").find('div').css("max-height","15px");
                                                                        $("#progressBar").find('div').css("line-height","17px");
                                                                    }
                                                                    if(a <= 0.03){

                                                                        $("#progressBar").find('div').css("max-height","12px");
                                                                        $("#progressBar").find('div').css("line-height","14px");
                                                                    }
                                                                    setTimeout(function() {
                                                                progress(timeleft - 1, timetotal, $element);
                                                                    }, 1000);


                                                            }else{
                                                                    $.ajax({
                                                                            type: 'POST', //THIS NEEDS TO BE GET
                                                                            url: '{{route('endDurationAuction',['id'=>$bi->getBook->id])}}',
                                                                            data:{
                                                                                "_token": "{{ csrf_token() }}",
                                                                                "numberMiss":{{$bi->getBook->auction_book_miss_pay}},
                                                                                "endTime":{{strtotime($bi->getBook->endtime->Endtime_auction_date)}},
                                                                                },
                                                                            success: function (data) {
                                                                                console.log(data);
                                                                                if(data.success){


                                                                                    setTimeout(function(){
                                                                                        location.reload();
                                                                                    }, 3000);
                                                                                }
                                                                                },
                                                                            error: function() {
                                                                                console.log(data);
                                                                            }
                                                                        });

                                                                $("#progressBar").find('div').html("Hết thời gian thanh toán");
                                                                $("#progressBar").find('div').css("line-height","24px");
                                                            }
                                                    };
                                                    var big = 86400 *{{$bi->getBook->auction_book_miss_pay + 1}};
                                                progress(timeleft1, 86400, $('#progressBar'));

                                                // });
                                                </script>
                                                @endif
                                            </td>
                                            @else
                                            <td>

                                                @if(isset($check))
                                                <button class="btn btn-danger">Đấu giá thất bại</button>
                                             @else
                                                        @if(isset($still_auction))

                                                            <button class="btn btn-warning">Đang diễn ra</button>
                                                        @else
                                                            <button class="btn btn-danger">Thời gian thanh toán quá hạn</button>

                                                        @endif
                                                @endif
                                            </td>
                                            @endif
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

