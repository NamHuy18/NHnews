	@extends('front.layouts.master')

	@section('content')

	<div class="home">

		<!-- Home Slider -->
		<div class="home_slider_container">

			
			<div class="owl-carousel owl-theme home_slider">
				@foreach($banner as $bn)
				<img src="upload/banner/{{$bn->image}}">
				@endforeach
			</div>
	
			<!-- Home Slider Navigation -->
			<div class="home_slider_nav home_slider_prev trans_200"><i class="fa fa-angle-left trans_200" aria-hidden="true"></i></div>
			<div class="home_slider_nav home_slider_next trans_200"><i class="fa fa-angle-right trans_200" aria-hidden="true"></i></div>
		</div>
	</div>

	<!-- Content Container -->

	<div class="content_container">
		
		<!-- Featured Title -->
		<div class="featured_title">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section_title_container d-flex flex-row align-items-start justify-content-start">
							<div>
								<div class="section_home">Trang Chủ</div><br>
								<div class="section_subtitle_home">Tin Nổi Bật</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">

			 	<!-- Main Content -->

				<div class="col-lg-12">
					<div class="main_content">
						@foreach($theloai as $tl)
							@if(count($tl->tintuc) > 0)

						<div class="technology">

							<div class="section_title_container d-flex flex-row align-items-start justify-content-start">
								<div>
									<div class="section_title">{{$tl->ten}}</div>

								</div>
								<div class="section_bar"></div>
							</div>

							<?php 
							$data = $tl->tintuc->where('noibat',1)->sortByDesc('created_at')->take(3);

							?>

							<div class="technology_content">
								
								@foreach($data->all() as $tintuc)
								<div class="post_item post_h_large">
									<div class="row">

										<div class="col-lg-5">
											<div class="post_image"><a href="tintuc/{{$tintuc['id']}}/{{$tintuc['tieudekhongdau']}}.html"><img src="upload/tintuc/{{$tintuc['image']}}" alt=""></a></div>
										</div>

										<div class="col-lg-7">
											<div class="post_content">

										

												<div class="post_title"><a href="tintuc/{{$tintuc['id']}}/{{$tintuc['tieudekhongdau']}}.html">{{$tintuc['tieude']}}</a></div>

												<div class="post_info d-flex flex-row align-items-center justify-content-start">
													<div class="post_author d-flex flex-row align-items-center justify-content-start">
														
														<div><div class="post_author_image"><img src="front_asset/images/author_1.jpg" alt=""></div></div>

														<div class="post_author_name"><a href="#">{{$tintuc['tacgia']}}</a></div>

													</div>

													<div class="post_date"><a href="#">{{$tintuc['created_at']}}</a></div>

													<div class="post_comments ml-auto"><a>{{count($tintuc->comment)}} bình luận </a></div>

												</div>
												<div class="post_text">
													<p>{{$tintuc['tomtat']}}</p>
												</div>
											</div>
										</div>
									</div>	
								</div>
								@endforeach
							</div>
						</div>	
							@endif


						@endforeach
<!-- 						<div class="load_more">
							<div class="load_more_button"><a href="#">load more</a></div>
						</div> -->

					</div>
				</div>




			</div>
		</div>
	</div>

	@endsection