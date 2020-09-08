    <!-- Footer Start -->
    <footer class="footer">
        <div class="subscription-area tertiary-bg" style="background-color: #146c78">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 mb-sm--30">
                        <div class="subscription-text">
                            <div class="subscription-text__icon">
                                <i class="fa fa-envelope-open color--white"></i>
                            </div>
                            <div class="subscription-text__right">
                                <h3 class="color--white">Bản tin</h3>
                                <p class="color--white">Đăng ký nhận bản tin của chúng tôi để được cập nhật từ chúng tôi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <form class="newsletter-form validate" action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate="">
                            <input type="email" class="newsletter-form__input" id="email" placeholder="Điền email của bạn vào đây..">
                            <input type="submit" value="Đăng ký" class="newsletter-form__submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-top">
            <div class="container">
                <div class="row pt--40 pb--40">
                    <div class="col-md-4 mb-sm--30">
                        <div class="method-box">
                            <div class="method-box__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="method-box__content">
                                <h4>0939.630.348</h4>
                                <p>Đường dây hỗ trợ miễn phí!!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-sm--30">
                        <div class="method-box">
                            <div class="method-box__icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="method-box__content">
                                <h4>phucsteam98@gmail.com</h4>
                                <p>Hỗ trợ đặt hàng!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="method-box">
                            <div class="method-box__icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="method-box__content">
                                <h4>Thứ 2 - Chủ nhật / 0:00 - 24:00</h4>
                                <p>Ngày / giờ làm việc!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr class="line">
                    </div>
                </div>
                <div class="row pt--40 pb--40">
                    <div class="col-lg-8 mb-md--30">
                        <div class="row">
                            <div class="col-md-4 mb-sm--30">
                                <div class="footer-widget">
                                    <h3 class="widget-title">LIÊN HỆ CHÚNG TÔI</h3>
                                    <ul class="widget-menu">
                                        <li><a href="#">Thương hiệu sách</a></li>
                                        <li><a href="#">Phiếu quà tặng</a></li>
                                        <li><a href="#">Chi nhánh</a></li>
                                        <li><a href="wishlist.html">Danh sách sách trong giỏ hàng</a></li>
                                        {{-- <li><a href="my-account.html">Order History</a></li> --}}
                                        <li><a href="my-account.html">Theo dõi đơn hàng</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 mb-sm--30">
                                <div class="footer-widget">
                                    <h3 class="widget-title">DỊCH VỤ KHÁCH HÀNG</h3>
                                    <ul class="widget-menu">
                                        <li><a href="contact.html">Liên hệ</a></li>
                                        {{-- <li><a href="#">Returns</a></li> --}}
                                        {{-- <li><a href="my-account.html">Lịch sử </a></li> --}}
                                        <li><a href="#">Xem địa chỉ công ty</a></li>
                                        <li><a href="my-account.html">Tài khoản</a></li>
                                        <li><a href="#">Thông báo</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="footer-widget">
                                    <h3 class="widget-title">THÔNG TIN HỆ THỐNG</h3>
                                    <ul class="widget-menu">
                                        <li><a href="about-us.html">Về chúng tôi</a></li>
                                        <li><a href="my-account.html">Thông tin vận chuyên</a></li>
                                        <li><a href="privacy.html">Chính sách bảo mật</a></li>
                                        <li><a href="terms-and-conditions.html">Điều khoản và điều kiện</a></li>
                                        <li><a href="#">Sự bảo đảm</a></li>
                                        <li><a href="faq.html">Câu hỏi thường gặp</a></li>
                                        @if(Auth::check())
                                    <li><a href="{{route('p.login')}}">Trang của bạn</a></li>
                                    @else
                                    <li><a href="{{route('p.login')}}">Đăng nhập</a></li>
                                    @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-widget mb--40">
                            <h3 class="widget-title">ỨNG DỤNG TRÊN DI ĐỘNG SẼ SỚM RA MẮT</h3>
                            <div class="app-btn-group">
                                <a href="#" class="app-btn apple-btn">App store</a>
                                <a href="#" class="app-btn gplay-btn">CH Play</a>
                            </div>

                        </div>
                        <div class="footer-widget social-widget">
                            <h3 class="widget-title">Theo dõi chúng tôi</h3>
                            <ul class="social social-2">
                                <li class="social__item">
                                    <a class="social__link" href="facebook.com" data-toggle="tooltip" data-placement="top" title="facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a class="social__link" href="twitter.com" data-toggle="tooltip" data-placement="top" title="twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a class="social__link" href="pinterest.com" data-toggle="tooltip" data-placement="top" title="pinterest">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a class="social__link" href="linkedin.com" data-toggle="tooltip" data-placement="top" title="linkedin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a class="social__link" href="vimeo.com" data-toggle="tooltip" data-placement="top" title="vimeo">
                                        <i class="fa fa-vimeo"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <hr class="line">
                    </div>
                </div>
                <div class="row pt--40 pb--40">
                    <div class="col-md-6 text-md-left text-center mb-sm--30">
                        <!-- Copyright Text Start -->
                        <p class="copyright-text">Copyright &copy; 2020  <a href="{{route('p.home')}}">Nienluan</a> All rights reserved.</p>
                        <!-- Copyright Text End -->
                    </div>
                    <div class="col-md-6 text-md-right text-center">
                        <img src="{{asset('public/page/img/payment-icon.png')}}" alt="payment">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Scroll To Top -->
    <a class="scroll-to-top" href=""><i class="fa fa-angle-up"></i></a>
        <!-- Modal -->

</div>
