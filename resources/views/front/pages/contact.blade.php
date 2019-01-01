	@extends('front.layouts.master')

	@section('content')
	<div class="home3">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="front_asset/images/index.jpeg" data-speed="0.8"></div>
		<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title">Contact</div>
							<div class="breadcrumbs">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="{{route('home')}}">Trang Chủ</a></li>
									<li> Liên Hệ</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="contact">
		<div class="container">
			<div class="row">
				
				<!-- Contact Content -->
				<div class="col-lg-4 contact_col">
					<div class="contact_content">
						<div class="contact_title">Thông tin liên hệ</div>

						<div class="contact_info">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="contact_info_box d-flex flex-column align-items-center justify-content-center">
										<div class="contact_info_icon"><img src="front_asset/images/icon_9.svg" alt=""></div>
									</div>
									<div class="contact_info_content">434 Trần Khát Chân</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="contact_info_box d-flex flex-column align-items-center justify-content-center">
										<div class="contact_info_icon"><img src="front_asset/images/icon_10.svg" alt=""></div>
									</div>
									<div class="contact_info_content">+848 232 5588</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="contact_info_box d-flex flex-column align-items-center justify-content-center">
										<div class="contact_info_icon"><img src="front_asset/images/icon_11.svg" alt=""></div>
									</div>
									<div class="contact_info_content">namhuydo18@gmail.com</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Contact Form -->
				<div class="col-lg-8 contact_col">
					<div class="contact_form_container">
						<div class="contact_title">Gửi Phản Hồi</div>

						@if(session('thongbao'))
							<div class="alert alert-success">
								{{session('thongbao')}}
							</div>
						@endif

						 @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                        @endif

						<form action="{{route('contact')}}" method="POST" id="contact_form" class="contact_form">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="row">
								<div class="col-md-6">
									<input type="text" name="name" class="contact_input" placeholder="Name" required="required">
								</div>
								<div class="col-md-6">
									<input type="email" name="email" class="contact_input" placeholder="E-mail" required="required">
								</div>
							</div>

							<textarea class="contact_input contact_textarea" name="noidung" placeholder="Message" required="required"></textarea>
							<button type="submit" class="contact_button trans_200"> Gửi</button>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
		<div class="google_map_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="contact_map">
						<!-- Google Map -->
						<div class="map">
							<div id="google_map" class="google_map">
								<div class="map_container">
									<div id="map"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	

	@endsection

	@section('script')
	<script src="front_asset/js/jquery-3.2.1.min.js"></script>
<script src="front_asset/styles/bootstrap-4.1.2/popper.js"></script>
<script src="front_asset/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="front_asset/plugins/greensock/TweenMax.min.js"></script>
<script src="front_asset/plugins/greensock/TimelineMax.min.js"></script>
<script src="front_asset/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="front_asset/plugins/greensock/animation.gsap.min.js"></script>
<script src="front_asset/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="front_asset/plugins/easing/easing.js"></script>
<script src="front_asset/plugins/progressbar/progressbar.min.js"></script>
<script src="front_asset/plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="front_asset/js/contact.js"></script>
@endsection