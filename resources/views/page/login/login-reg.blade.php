@extends('page.layout')
@section('title','Đăng nhập')
@section('page_content')

<!-- Main Wrapper Start -->
	<main id="content" class="main-content-wrapper">
	        <div class="login-register-area">
	            <div class="container">

	            	


	                <div class="row">
	                    <div class="col-lg-6 mb-md--40">
	                        <h2 class="heading-secondary mb--30">Đăng nhập</h2>
	                    @if(session('thongbao'))
                            <div style="width: 90%; margin-left: 5%; margin-top: 3%" class="alert alert-danger">{{session('thongbao')}}</div>
                        @endif
						@if(session('disable'))
                            <div style="width: 90%; margin-left: 5%; margin-top: 3%" class="alert alert-info">{{session('disable')}}</div>
                        @endif
						@if(count($errors) > 0)
                            <div style="width: 90%; margin-left: 5%; margin-top: 3%" class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
	                        <div class="login-reg-box bg--white">
	                            <form action="{{route('postlogin')}}"  method="POST" enctype="multipart/form-data">
                                {{csrf_field() }}

	                                <div class="form__group mb--20">
	                                    <label class="form__label" for="username_email">
	                                        Username <span>*</span>
	                                    </label>
	                                    <input type="text" name="username" id="username_email" class="form__input">
	                                </div>

	                                <div class="form__group mb--20">
	                                    <label class="form__label" for="password">
	                                        Password <span>*</span>
	                                    </label>
	                                    <input type="password" name="password" id="password" class="form__input">
	                                </div>

	                                <div class="form__group d-flex align-items-center">

	                                    <button type="submit" class="btn btn-5 btn-style-1 color-1"style="    margin-bottom: 10px;">Đăng nhập</button>
	                                    <div class="form__checkbox--group ml--20">

	                                        <input type="checkbox" name="sessionStore" id="sessionStore" class="form__checkbox">
	                                        <label for="sessionStore" class="form__checkbox--label">Remember me</label>
	                                    </div>
	                                </div>

	                                <a href="#" class="forgot-pass">Bạn quên mật khẩu?</a>
	                            </form>
	                        </div>
	                    </div>

	                    {{-- Đăng ký --}}
	                    <div class="col-lg-6">
	                        <h2 class="heading-secondary mb--30">Đăng ký</h2>
	                        @if(count($errors) > 0)
		                        <div class="alert alert-danger">
		                            @foreach($errors->all() as $err)
		                                {{$err}}<br>
		                            @endforeach
		                        </div>
		                    @endif
	                        <div class="login-reg-box bg--white">
	                            <form action="{{route('p.reg')}}"  method="POST" enctype="multipart/form-data">
                                {{csrf_field() }}
									
									<div class="row">

										<div class="form__group mb--20 col-md-6">
		                                    <label class="form__label" for="register_email">
		                                        Tên <span>*</span>
		                                    </label>
		                                    <input type="text" name="name"  class="form__input">
		                                </div>

		                                <div class="form__group mb--20 col-md-6">
		                                    <label class="form__label" for="register_email">
		                                        Họ <span>*</span>
		                                    </label>
		                                    <input type="text" name="lastname"  class="form__input">
		                                </div>


		                            </div>


		                            {{-- Username --}}

	                                <div class="form__group mb--20">
	                                    <label class="form__label" for="register_email">
	                                        Username <span>*</span>
	                                    </label>
	                                    <input type="text" name="username"  class="form__input">
	                                </div>



									{{-- Email --}}

	                                <div class="form__group mb--20">
	                                    <label class="form__label" for="register_email">
	                                        Email address <span>*</span>
	                                    </label>
	                                    <input type="text" name="email"  class="form__input">
	                                </div>

	                                {{-- phone --}}

	                                <div class="form__group mb--20">
	                                    <label class="form__label" for="register_email">
	                                        Phone <span>*</span>
	                                    </label>
	                                    <input type="text" name="phone" class="form__input">
	                                </div>


	                                {{-- Password --}}

	                                <div class="form__group mb--20">
	                                    <label class="form__label" for="register_password">
	                                        Password <span>*</span>
	                                    </label>
	                                    <input type="password" name="password" id="register_password" class="form__input">
	                                </div>

	                                {{-- Confirm Password --}}

	                                <div class="form__group mb--20">
	                                    <label class="form__label" for="register_password">
	                                        Confirm Password <span>*</span>
	                                    </label>
	                                    <input type="password" name="confirmpassword" class="form__input">
	                                </div>



	                                {{--  --}}
	                                <div class="form__group">
	                                    <button type="submit" class="btn btn-5 btn-style-2">Đăng ký</button>
	                                </div>
	                            </form>

	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	</main>
<!-- Main Wrapper End -->

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
   {!! Toastr::message() !!}



@endsection