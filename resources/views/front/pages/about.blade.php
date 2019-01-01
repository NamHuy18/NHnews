@extends('front.layouts.master')

@section('content')
<div class="home3">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="front_asset/images/index.jpeg" data-speed="0.8"></div>
		<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title">About</div>
							<div class="breadcrumbs">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="{{route('home')}}">Trang Chủ</a></li>
									<li> Giới Thiệu</li>
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
				

				<div class="col-lg-4 contact_col">
					<div class="contact_content">
						<div class="section_home">Giới Thiệu</div>

						<div class="contact_info">
							<ul>
								<div class="post_text"><p>Trang tin tức cung cấp thông tin chính xác, uy tín. Tin tức được cập nhật liên tục 1 ngày 24h, 1 tuần 7 ngày. Web được hoàn thiện bởi DNH.</p>
								 </div>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-8 contact_col">
					<img src="front_asset/images/about_intro.jpg">
				</div>

			</div>
		</div>
	</div>

@endsection