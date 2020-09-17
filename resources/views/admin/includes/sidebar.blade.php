
<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
    <a href="{{route('ad.home')}}" ><img src="{{asset('public/admin/css/icon.svg')}}" alt="Admin Logo" class="img-fluid logo"><span>{{Auth::user()->vaitro->role_name}}</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{asset('public/admin/img/user.png')}}"  class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Xin chào,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{Auth::user()->info->info_lastname}} {{Auth::user()->info->info_name}}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="#" ><i class="icon-user"></i>Hồ sơ người dùng</a></li>

                    <li><a href="{{route('act.home')}}" ><i class="icon-home"></i>Trang của tui</a></li>

                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Chỉnh sửa</a></li>

                    <li class="divider"></li>
                    <li><a href="{{route('p.logout')}}" ><i class="icon-power"></i>Đăng xuất</a></li>
                </ul>
            </div>
        </div>
<nav id="left-sidebar-nav" class="sidebar-nav">
    <ul id="main-menu" class="metismenu">

        <li class="header">Bản điều khiển</li>
        @if(Auth::user()->level == 1)
            <li>
                <a href="#uiIcons" class="has-arrow"><i class="icon-speedometer"></i><span>Giao diện</span></a>
                <ul>
                    <li><a href="#"> Ảnh bìa</a></li>
                </ul>
            </li>

            <li>
                <a href="#uiIcons" class="has-arrow"><i class="icon-user"></i><span>Thành viên</span></a>
                <ul>
                    <li><a href="#"> Quyền</a></li>
                    <li><a href="#">Danh sách thành viên</a></li>
                </ul>
            </li>
        @endif

        <li>
            <a href="#Tables" class="has-arrow"><i class="icon-layers"></i><span>Danh sách</span></a>
            <ul>
                @if(Auth::user()->level == 1)
                    <li><a href="{{Route('ctg.list')}}" >Danh mục</a></li>
                @endif

                <li><a href="{{Route('s.ctg.list')}}" >Thể loại</a></li>
                <li><a href="{{Route('auth.list')}}" >Tác giả</a></li>
                <li><a href="{{Route('pbh.list')}}" >Nhà xuất bản</a></li>
                <li><a href="{{Route('cby.list')}}" >Nhà phân phối</a></li>
                <li><a href="{{Route('b.list')}}" >Sách</a></li>


            </ul>
        </li>
        <li>
            <a href="#charts" class="has-arrow"><i class="icon-pie-chart"></i><span>Thống kê</span></a>
            <ul>
            @if(Auth::user()->level ==1)
                <li><a href="{{route('statistic_bill')}}" >Thống kê đơn hàng</a></li>
            <li><a href="{{route('statistic_sale')}}" >Thống kê doanh thu</a></li>
            <li><a href="{{route('quantity_product')}}" >Thống kê sản phẩm bán chạy</a></li>
            <li><a href="{{route('quantity')}}" >Thống kê số lượng sách</a></li>
            @endif
            @if(Auth::user()->level==2)
            <li><a href="{{route('statistic_bill_cus')}}" >Thống kê đơn hàng</a></li>
            <li><a href="{{route('statistic_sale_cus')}}" >Thống kê doanh thu</a></li>
            <li><a href="{{route('quantity_cus')}}" >Thống kê số lượng sách</a></li>
            @endif
            </ul>
        </li>
{{-- dau gia --}}
        <li>
            <a href="#charts" class="has-arrow"><i class="icon-pie-chart"></i><span>Đấu giá</span></a>
            <ul>
            @if(Auth::user()->level ==1)
                <li><a href="{{route('statistic_bill')}}" >Danh sách yêu cầu đấu giá</a></li>
            @endif
            @if(Auth::user()->level==2)
            {{-- <li><a href="{{route('addAuctionBook')}}" >Danh sách sản phẩm đấu giá</a></li> --}}
            <li><a href="{{route('add_auctionBook')}}" >Yêu cầu đấu giá</a></li>
            <li><a href="{{route('auction.management')}}" >Quản lý đấu giá</a></li>
            @endif
            </ul>
        </li>

    </ul>
</nav>
