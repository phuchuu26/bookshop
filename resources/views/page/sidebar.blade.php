<div class="col-lg-3 order-lg-1">
    <aside class="sidebar">
        <!-- Product Categories Widget Start -->
        <div class="sidebar-widget product-widget product-cat-widget">
            <h3 class="widget-title">Thể loại sách</h3>
            <div class="widget_conent">
                <ul class="product-categories">
                    @foreach($theloai as $tl)
                    <li class="cat-item cat-parent">
                    <a href="{{Route('category',['id' => $tl->id])}}">{{$tl->category_name}}</a>
                    {{-- <span class="count">({{$tl->subcategory->count()}})</span> --}}
                    <span style="float: right;" class="badge badge-dark">{{$tl->subcategory->count()}}</span>
                        <ul class="children">
                            @foreach($tl->subcategory as $stl)
                            <li class="cat-item">
                            <a href="{{route('p.subcategory',['id' => $stl->id ])}}">{{$stl->subcategory_name}}</a>
                            <span style="float: right;" class="badge badge-info">{{$stl->getbook->count()}}</span>
                            </li>
                            @endforeach

                        </ul>
                    </li>
                    @endforeach


                </ul>
            </div>
        </div>
        <!-- Product Categories Widget End -->

        <!-- Product color Widget Start -->
        {{-- <div class="sidebar-widget product-widget product-color-widget">
            <h3 class="widget-title">Màu sắc</h3>
            <div class="widget_conent">
                <ul class="product-color">
                    <li><a href="shop.html">D</a><span>(2)</span></li>
                    <li><a href="shop.html">Blue</a><span>(4)</span></li>
                    <li><a href="shop.html">Gold</a><span>(5)</span></li>
                </ul>
            </div>
        </div> --}}
        <!-- Product color Widget End -->

        <!-- Price Filter Widget Start -->
        <div class="sidebar-widget product-widget product-price-widget">
            <h3 class="widget-title">Lọc giá tiền</h3>
            <div class="widget_conent">
                <form action="#" method="post">
                    <div id="slider-range" class="price-slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                        <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 16.6667%; width: 79.1667%;">

                        </div>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 16.6667%;">

                        </span>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 95.8333%;">

                        </span>
                    </div>
                    <div class="filter-price">
                        <div class="filter-price__count">
                            <div class="filter-price__input-group">
                                <span class="gia">Giá: </span>
                                <br>
                                <input type="text" id="amount" class="amount-range gia" readonly="">
                            </div>
                            <br>
                            <button type="submit" class="sidebar-btn">
                                Lọc
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- <article class="card-group-item">
            <header class="card-header">
                <h6 class="title">Khoảng tiền </h6>
            </header>
            <div class="filter-content">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Từ</label>
                            <input type="range" class="custom-range" min="0" max="50000" step="1000"
                                id="sotientu" name="keyword_sotientu"
                                value="">
                            <span><span id="sotientu-text"></span></span>
                        </div>
                        <div class="form-group col-md-6 text-right">
                            <label>Đến</label>
                            <input type="range" class="custom-range" min="50000" max="200000" step="1000"
                                id="sotienden" name="keyword_sotienden"
                                value="">
                            <span><span id="sotienden-text"></span></span>
                        </div>
                    </div>
                </div> <!-- card-body.// -->
            </div>
        </article> --}}
        <!-- Price Filter Widget End -->

        <!-- Price Compare Widget Start -->
        {{-- <div class="sidebar-widget product-widget product-compare-widget">
            <h3 class="widget-title">Compare</h3>
            <div class="widget_conent">
                <ul>
                    <li>
                        <a href="sinngle-product.html">Condimentum furniture</a>
                        <span class="compare-remove"><i class="fa fa-times"></i></span>
                    </li>
                    <li>
                        <a href="sinngle-product.html">Auctor gravida enim</a>
                        <span class="compare-remove"><i class="fa fa-times"></i></span>
                    </li>
                    <li>
                        <a href="sinngle-product.html">Condimentum furniture</a>
                        <span class="compare-remove"><i class="fa fa-times"></i></span>
                    </li>
                </ul>
                <div class="compare-widget-bottom">
                    <a href="#">Clear all</a>
                    <a href="compare.html" class="sidebar-btn">Compare</a>
                </div>
            </div>
        </div> --}}
        <!-- Price Compare Widget End -->

        <!-- Product Banner Widget Start -->
        {{-- <div class="sidebar-widget banner-widget">
            <div class="promo-box full-width bg--white">
                <a href="#">
                    <img src="{{asset('public/page/img/home1-product-banner-1.jpg')}}" alt="promo">
                </a>
            </div>
        </div> --}}
        <!-- Product Banner Widget End -->

        <!-- Product Tags Widget Start -->
        {{-- <div class="sidebar-widget product-tags-widget">
            <h3 class="widget-title">Product Tags</h3>
            <div class="widget_conent">
                <div class="tagcloud">
                    <a href="blog.html" rel="1">chilled</a>
                    <a href="blog.html" rel="2">dark</a>
                    <a href="blog.html" rel="3">euro</a>
                    <a href="blog.html" rel="2">fashion</a>
                    <a href="blog.html" rel="1">food</a>
                    <a href="blog.html" rel="4">hardware</a>
                    <a href="blog.html" rel="3">hat</a>
                    <a href="blog.html" rel="2">hipster</a>
                    <a href="blog.html" rel="1">holidays</a>
                    <a href="blog.html" rel="2">light</a>
                    <a href="blog.html" rel="1">mac</a>
                    <a href="blog.html" rel="3">place</a>
                    <a href="blog.html" rel="2">t-shirt</a>
                    <a href="blog.html" rel="1">travel</a>
                    <a href="blog.html" rel="2">video-2</a>
                    <a href="blog.html" rel="2">white</a>
                </div>
            </div>
        </div> --}}
        <!-- Product Tags Widget End -->

    </aside>
</div>
