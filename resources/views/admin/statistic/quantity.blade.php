@extends('admin.layout')
@section('title','Thống kê số lượng sản phẩm')
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
                        <h2>Thống kê số lượng sản phẩm</h2>
                    </div>


                    <button type="submit" class="btn btn-primary" id="btnLapBaoCao1">Thống kê số lượng theo loại sản phẩm</button>
                    <button type="submit" class="btn btn-primary" id="btnLapBaoCao2">Thống kê số lượng theo nhà cung cấp</button>
                    <button type="submit" class="btn btn-primary" id="btnLapBaoCao3">Thống kê số lượng theo nhà xuất bản</button>
                    <button type="submit" class="btn btn-primary" id="btnLapBaoCao4">Thống kê số lượng theo loại tác giả</button>
                    <div class="body">

                        <div class="row">
                            <div class="col-md-6">
                                {{-- <button type="submit" class="btn btn-primary" id="btnLapBaoCao">Lập báo cáo</button> --}}
                                {{-- <form method="get" action="#" enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    <div class="row">

                                </div>
                                </form> --}}
                            </div>
                            <div class="col-md-12">
                                {{-- <h1>{{ $chart1->options['chart_title'] }}</h1> --}}
                                {{-- {!! $chart1->renderHtml() !!} --}}
                                <canvas id="chartOfobjChart" style="width: 100%;height: 400px;"></canvas>
                                <canvas id="chartOfobjChart1" style="width: 100%;height: 400px;"></canvas>
                                <canvas id="chartOfobjChart2" style="width: 100%;height: 400px;"></canvas>
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
// thong ke theo loai
                                var objChart;
                                var $chartOfobjChart = document.getElementById("chartOfobjChart").getContext("2d");
                                $("#btnLapBaoCao1").click(function(e) {
                                    e.preventDefault();
                                    // location.reload();
                                    // abort();


                                $.ajax({
                                        url: '{{ route('quantity_category') }}',
                                        type: "GET",
                                        data: {
                                            tuNgay: $('#tuNgay').val(),
                                            denNgay: $('#denNgay').val(),
                                        },
                                        success: function(response) {
                                            var myLabels = [];
                                            var myData = [];
                                            $(response.data).each(function() {
                                                myLabels.push((this.ten));
                                                myData.push(this.amount);
                                            });
                                            myData.push(0); // creates a '0' index on the graph
                                            if (typeof $objChart !== "undefined") {
                                                $objChart.destroy();
                                            }
                                            $objChart = new Chart($chartOfobjChart, {
                                                // The type of chart we want to create
                                                type: "bar",
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
                                                        text: "Thống kê số lượng theo loại sản phẩm"
                                                    },
                                                    scales: {
                                                        xAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: 'Thể loại sách'
                                                            }
                                                        }],
                                                        yAxes: [{
                                                            ticks: {
                                                                callback: function(value) {
                                                                    return numeral(value).format('0,0 ')+' cuốn'
                                                                }
                                                            },
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: 'Số lượng sách'
                                                            }
                                                        }]
                                                    },
                                                    tooltips: {
                                                        callbacks: {
                                                            label: function(tooltipItem, data) {
                                                                return 'có ' + numeral(tooltipItem.value).format('0,0 ' ) + ' cuốn'
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

                            //     function stop(){
                            // a.abort();
                            // }

                                // thong ke theo ncc
                                // var objChart1;
                                var objChart;
                                var $chartOfobjChart2 = document.getElementById("chartOfobjChart").getContext("2d");
                                $("#btnLapBaoCao2").click(function(e) {
                                    // a.abort();
                                    // $("#chartOfobjChart").remove();
                                    // e.preventDefault();
                                    $.ajax({
                                        // async: false,
                                        url: '{{ route('quantity_company') }}',
                                        type: "GET",
                                        data: {
                                            tuNgay: $('#tuNgay').val(),
                                            denNgay: $('#denNgay').val(),
                                        },
                                        success: function(response) {
                                            var myLabels = [];
                                            var myData = [];
                                            $(response.data).each(function() {
                                                myLabels.push((this.ten));
                                                myData.push(this.amount);
                                            });
                                            myData.push(0); // creates a '0' index on the graph
                                            if (typeof $objChart !== "undefined") {
                                                $objChart.destroy();
                                            }
                                            $objChart = new Chart($chartOfobjChart2, {
                                                // The type of chart we want to create
                                                type: "bar",
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
                                                        text: "Thống kê số lượng theo nhà cung cấp"
                                                    },
                                                    scales: {
                                                        xAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: 'Thể loại sách'
                                                            }
                                                        }],
                                                        yAxes: [{
                                                            ticks: {
                                                                callback: function(value) {
                                                                    return numeral(value).format('0,0 ')+' cuốn'
                                                                }
                                                            },
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: 'Số lượng sách'
                                                            }
                                                        }]
                                                    },
                                                    tooltips: {
                                                        callbacks: {
                                                            label: function(tooltipItem, data) {
                                                                return 'có ' + numeral(tooltipItem.value).format('0,0 ' ) + ' cuốn'
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


                // thong ke nha san xuat

                            var objChart;
// get canvas
                                var $chartOfobjChart3 = document.getElementById("chartOfobjChart").getContext("2d");
                                $("#btnLapBaoCao3").click(function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        url: '{{ route('quantity_nxb') }}',
                                        type: "GET",
                                        data: {
                                            tuNgay: $('#tuNgay').val(),
                                            denNgay: $('#denNgay').val(),
                                        },
                                        success: function(response) {
                                            var myLabels = [];
                                            var myData = [];
                                            $(response.data).each(function() {
                                                myLabels.push((this.ten));
                                                myData.push(this.amount);
                                            });
                                            myData.push(0); // creates a '0' index on the graph
                                            if (typeof $objChart !== "undefined") {
                                                $objChart.destroy();
                                            }
                                            $objChart = new Chart($chartOfobjChart3, {
                                                // The type of chart we want to create
                                                type: "bar",
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
                                                        text: "Thống kê số lượng theo nhà xuất bản"
                                                    },
                                                    scales: {
                                                        xAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: 'Nhà xuất bản'
                                                            }
                                                        }],
                                                        yAxes: [{
                                                            ticks: {
                                                                callback: function(value) {
                                                                    return numeral(value).format('0,0 ')+' cuốn'
                                                                }
                                                            },
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: 'Số lượng sách'
                                                            }
                                                        }]
                                                    },
                                                    tooltips: {
                                                        callbacks: {
                                                            label: function(tooltipItem, data) {
                                                                return 'có ' + numeral(tooltipItem.value).format('0,0 ' ) + ' cuốn'
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
                                // thong ke tac gia

                                var $chartOfobjChart4 = document.getElementById("chartOfobjChart").getContext("2d");
                                $("#btnLapBaoCao4").click(function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        url: '{{ route('quantity_author') }}',
                                        type: "GET",
                                        data: {
                                            tuNgay: $('#tuNgay').val(),
                                            denNgay: $('#denNgay').val(),
                                        },
                                        success: function(response) {
                                            var myLabels = [];
                                            var myData = [];
                                            $(response.data).each(function() {
                                                myLabels.push((this.ten));
                                                myData.push(this.amount);
                                            });

                                            myData.push(0); // creates a '0' index on the graph
                                            if (typeof $objChart !== "undefined") {
                                                $objChart.destroy();
                                            }
                                            $objChart = new Chart($chartOfobjChart4, {
                                                // The type of chart we want to create
                                                type: "bar",
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
                                                        text: "Thống kê số lượng theo nhà phân phối"
                                                    },
                                                    scales: {
                                                        xAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: 'Nhà phân phối'
                                                            }
                                                        }],
                                                        yAxes: [{
                                                            ticks: {
                                                                callback: function(value) {
                                                                    return numeral(value).format('0,0 ')+' cuốn'
                                                                }
                                                            },
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: 'Số lượng sách'
                                                            }
                                                        }]
                                                    },
                                                    tooltips: {
                                                        callbacks: {
                                                            label: function(tooltipItem, data) {
                                                                return 'có ' + numeral(tooltipItem.value).format('0,0 ' ) + ' cuốn'
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
