@extends('front.layouts.master')


@section('content')
	<div class="home1">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="front_asset/images/index.jpeg" data-speed="0.8"></div>
		<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title">{{$loaitin->ten}}</div>
							<div class="breadcrumbs">

								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="{{route('home')}}">Trang Chủ</a></li>
									<li>Tin Tức</li>
								</ul>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Content Container -->

	<div class="content_container">
		
		<!-- Featured Posts -->
		<div class="featured_title">
			<div class="container">

				@foreach($tintuc as $tt)
				<div class="row">
					<div class="col-lg-12">

						<div class="posts">
								

							<div class="post_item post_h_large">
								<div class="row">
									<div class="col-lg-5">
										<div class="post_image"><a href="tintuc/{{$tt->id}}/{{$tt->tieudekhongdau}}.html"><img src="upload/tintuc/{{$tt->image}}" alt="https://unsplash.com/@jmckinven"></a></div>
									</div>
									<div class="col-lg-7">
										<div class="post_content">

											<div class="post_title"><a href="tintuc/{{$tt->id}}/{{$tt->tieudekhongdau}}.html">{{$tt->tieude}}</a></div>

											<div class="post_info d-flex flex-row align-items-center justify-content-start">
												<div class="post_author d-flex flex-row align-items-center justify-content-start">
													<div><div class="post_author_image"><img src="front_asset/images/author_1.jpg" alt=""></div></div>

													<div class="post_author_name"><a >{{$tt->tacgia}}</a></div>
												</div>
												<div class="post_date"><a >{{$tt->created_at}}</a></div>
												<div class="post_comments ml-auto"><a>{{count($tt->comment)}} bình luận </a></div>
											</div>
											<div class="post_text">
												<p>{{$tt->tomtat}}</p>
											</div>
										</div>
									</div>
								</div>	
							</div>

						</div>
					</div>


				</div>
				@endforeach
										<!-- Load more button -->
<!-- 						<div class="load_more">
							<div class="load_more_button"><a href="#">load more</a></div>
						</div> -->
						<div style="text-align: center">
							{{$tintuc -> links()}}
						</div>
						
						
			</div>

		</div>
	</div>

	@endsection

