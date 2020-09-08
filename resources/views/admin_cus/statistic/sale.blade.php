@extends('admin.layout')
@section('title','Thống kê doanh thu')
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
                        <h2>Thống kê doanh thu</h2>
                    </div>



                    <div class="body">

                        <div class="row">
                            <div class="col-md-6">
                                <form method="get" action="#" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                    <div class="form-group">
                                        <label for="tuNgay">Từ ngày</label>
                                        <input type="date" class="form-control" id="tuNgay" name="tuNgay">
                                    </div>
                                    &nbsp &nbsp
                                    <div class="form-group">
                                        <label for="denNgay">Đến ngày</label>
                                        <input type="date" class="form-control" id="denNgay" name="denNgay">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="btnLapBaoCao">Lập báo cáo</button>
                                </form>
                            </div>
                            <div class="col-md-12">
                                {{-- <h1>{{ $chart1->options['chart_title'] }}</h1> --}}
                                {{-- {!! $chart1->renderHtml() !!} --}}
                                <canvas id="chartOfobjChart" style="width: 100%;height: 400px;"></canvas>
                            </div>
                        </div>
                        {{-- {!! $chart1->renderChartJsLibrary() !!} --}}
                        {{-- {!! $chart1->renderJs() !!} --}}

                        {{-- tui nghi 2 dong tren chu de vao section nen no ko nhan dc a' --}}


                        <!-- Các script dành cho thư viện Numeraljs -->
                        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> --}}
                        <script src="{{ asset('public/vendor/chartjs/numeral.js') }}"></script>
                        <script>
                            // Đăng ký tiền tệ VNĐ
                            numeral.register('locale', 'vi', {
                                delimiters: {
                                    thousands: ',',
                                    decimal: '.'
                                },
                                abbreviations: {
                                    thousand: 'k',
                                    million: 'm',
                                    billion: 'b',
                                    trillion: 't'
                                },
                                ordinal: function(number) {
                                    return number === 1 ? 'một' : 'không';
                                },
                                currency: {
                                    symbol: 'vnđ'
                                }
                            });
                            // Sử dụng locate vi (Việt nam)
                            numeral.locale('vi');
                            </script>
                        <!-- Các script dành cho thư viện ChartJS -->
                        <script src="{{ asset('public/vendor/chartjs/Chart.js') }}"></script>
                        <script
                        src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
                        crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                        <script>

                            $(document).ready(function() {

                                var objChart;
                                var $chartOfobjChart = document.getElementById("chartOfobjChart").getContext("2d");
                                $("#btnLapBaoCao").click(function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        url: '{{ route('statistic_sale_data_cusnhaf') }}',
                                        type: "GET",
                                        data: {
                                            tuNgay: $('#tuNgay').val(),
                                            denNgay: $('#denNgay').val(),
                                        },
                                        success: function(response) {
                                            var myLabels = [];
                                            var myData = [];
                                            $(response.data).each(function() {
                                                myLabels.push((this.thoiGian));
                                                myData.push(this.tongThanhTien);
                                            });
                                            myData.push(0); // creates a '0' index on the graph
                                            if (typeof $objChart !== "undefined") {
                                                $objChart.destroy();
                                            }
                                            $objChart = new Chart($chartOfobjChart, {
                                                // The type of chart we want to create
                                                type: "line",
                                                data: {
                                                    labels: myLabels,
                                                    datasets: [{
                                                        data: myData,
                                                        borderColor: "#25CCF7",
                                                        backgroundColor: "#1B9CFC",
                                                        borderWidth: 2
                                                    }]
                                                },
                                                // Configuration options go here
                                                options: {
                                                    legend: {
                                                        display: false
                                                    },
                                                    title: {
                                                        display: true,
                                                        text: "Báo cáo đơn hàng"
                                                    },
                                                    scales: {
                                                        xAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: 'Ngày đạt doanh thu'
                                                            }
                                                        }],
                                                        yAxes: [{
                                                            ticks: {
                                                                callback: function(value) {
                                                                    return numeral(value).format('0,0 $')
                                                                }
                                                            },
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: 'Doanh thu'
                                                            }
                                                        }]
                                                    },
                                                    tooltips: {
                                                        callbacks: {
                                                            label: function(tooltipItem, data) {
                                                                return ' doanh thu đạt ' + numeral(tooltipItem.value).format('0,0 $') +' trong ngày'
                                                            }
                                                        }
                                                    },
                                                    responsive: true,
                                                    maintainAspectRatio: true,
                                                }
                                            });
                                        }
                                    });
                                });
                            });
                            </script>

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



@section('custom-scripts')

@endsection
