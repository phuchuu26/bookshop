<!DOCTYPE html>

<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('public/page/img/favicon.ico')}}"  type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('public/page/img/icon.png')}}" >
    <title>BOOKSTORE || @yield('title') </title>

    <!-- ************************* CSS Files ************************* -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/page/css/bootstrap.min.css')}}" >

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('public/page/css/font-awesome.min.css')}}">

    <!-- All Plugins CSS css -->
    <link rel="stylesheet" href="{{asset('public/page/css/plugins.css')}}" >

    <!-- style css -->
    <link rel="stylesheet" href="{{asset('public/page/css/main.css')}}" >
    <link rel="stylesheet" href="{{asset('public/page/css/style.css')}}" >
    <!-- modernizr JS
    ============================================ -->
    <script src="{{asset('public/page/js/modernizr-2.8.3.min.js')}}" ></script>
    <script src="https://js.pusher.com/3.1/pusher.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

        <style>
            .bui-review-score__badge {
    /* background: #003580; */
    background: #ffe11b;
    float: right;
    color: #fff;
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
    font-size: 16px;
    font-weight: 500;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    vertical-align: baseline;
    border-radius: 6px 6px 6px 0;
    height: 32px;
    width: 32px;
    min-width: 32px;
}
        </style>



</head>

<body>




@include('page.header')

@yield('page_content')

@include('page.footer')




    <!-- ************************* JS Files ************************* -->

    <!-- jQuery JS -->
      {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script src="{{asset('public/page/js/jquery.min.js')}}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}

    <!-- Bootstrap and Popper Bundle JS -->
    <script src="{{asset('public/page/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugins JS -->
    <script src="{{asset('public/page/js/plugins.js')}}"></script>

    <!-- Ajax Mail JS -->
    <script src="{{asset('public/page/js/ajax-mail.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('public/page/js/main.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript"></script>
{{-- <script>
    Pusher.logToConsole = true;
  var pusher = new Pusher("5f9437b8677edc9e4714", {
    encrypted: true,
    cluster: "ap1",
    authEndpoint: 'http://bookshop.com/chatify/chat/auth',
    auth: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }
  });

</script> --}}

</body>

</html>
