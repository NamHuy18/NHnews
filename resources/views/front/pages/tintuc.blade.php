@extends('front.layouts.master')

@section('content')
	<!-- Home -->

	<div class="home2">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="front_asset/images/index.jpeg" data-speed="0.8"></div>
		<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title">Tin Tức</div>
							<div class="breadcrumbs">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="{{route('home')}}">Trang Chủ</a></li>
									<li><a href="loaitin/{{$tintuc->loaitin->id}}/{{$tintuc->loaitin->tenkhongdau}}.html">{{$tintuc->loaitin->ten}}</a></li>

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
		<div class="container">
			<div class="row">

				<!-- Single Post -->

				<div class="col-lg-10">

					<div class="single_post">
						<div class="post_image"><img src="upload/tintuc/{{$tintuc->image}}" alt=""></div>
						<div class="post_content">
							<div class="post_category cat_technology"><a href="loaitin/{{$tintuc->loaitin->id}}/{{$tintuc->loaitin->tenkhongdau}}.html">{{$tintuc->loaitin->ten}}</a></div>
							<div class="post_title"><a href="single.html">{{$tintuc->tieude}}</a></div>
							<div class="post_info d-flex flex-row align-items-center justify-content-start">
								<div class="post_author d-flex flex-row align-items-center justify-content-start">
									<div><div class="post_author_image"><img src="front_asset/images/author_1.jpg" alt=""></div></div>
									<div class="post_author_name"><a >{{$tintuc->tacgia}}</a></div>
								</div>
								<div class="post_date"><a href="#">{{$tintuc->created_at}}</a></div>
							
							</div>
							<div class="post_text">
								<p>{!!$tintuc->noidung!!} </p>
							</div>
						</div>

						<!-- Social Share -->
						<div class="post_share d-flex flex-row align-items-center justify-content-start">
							<div class="post_share_title">Share:</div>
							<ul class="post_share_list d-flex flex-row align-items-center justify-content-center">
								<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						
						<!-- Comments -->
						<div class="post_comments_container">
							<div class="post_comments_title">2 Comments</div>

							<!-- Comments -->
							@foreach($tintuc->comment as $cm)
							<div class="post_comments">
								
								<ul class="post_comments_list">
									
									<!-- Comment -->
									<li class="comment">
										<div class="comment_info d-flex flex-row align-items-center justify-content-start">
											<div><div class="comment_image"><img src="front_asset/images/comment_1.jpg" alt=""></div></div>
											<small><div class="comment_author"><a href="#">{{$cm->user->name}}</a></div></small>
										</div>
										<div class="post_date"><a >{{$cm->created_at}}</a></div>
										<div class="comment_content">
											<div class="comment_text">
												<p>{{$cm->noidung}}</p>
											</div>
										</div>
									</li>

								</ul>

							</div>
							@endforeach
						</div>

						<!-- Reply  -->
						@if(Auth::check())
						<div class="reply_form_container">

							@if(session('thongbao'))
								<div class="alert alert-success">
									{{session('thongbao')}}
								</div>
							@endif
							<div class="reply_form_title">Viết Bình Luận</div>
							<form action="comment/{{$tintuc->id}}" id="reply_form" class="reply_form" method="POST">
								<input type="hidden" name="_token" value="{{csrf_token()}}">

								<textarea class="reply_input reply_textarea" name="noidung" placeholder="Bình Luận"></textarea>
								<button class="reply_button trans_200"> Gửi</button>
							</form>
						</div>
						@endif
					</div>

				</div>

				<!-- Sidebar -->

				<div class="col-lg-2">
					<div class="sidebar">

						<!-- Latest Posts -->
						<div class="sidebar_latest">
							<div class="sidebar_title">Tin Liên Quan </div>
							<div class="latest_posts">
								@foreach($tinlienquan as $tlq)
								<!-- Latest Post -->
								<div class="latest_post d-flex flex-row align-items-start justify-content-start">
									<div><div class="latest_post_image"><a href="tintuc/{{$tlq->id}}/{{$tlq->tieudekhongdau}}.html"><img src="upload/tintuc/{{$tlq->image}}" alt=""></a></div></div>
									<div class="latest_post_content">

										<div class="latest_post_title"><a href="tintuc/{{$tlq->id}}/{{$tlq->tieudekhongdau}}.html">{{$tlq->tieude}}</a></div>
										<div class="latest_post_date">{{$tlq->created_at}}</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>

						<!-- Most Viewed -->

						<div class="most_viewed">
							<div class="sidebar_title">Tin Nổi Bật </div>
							<div class="most_viewed_items">
								@foreach($tinnoibat as $tnb)
								<!-- Most Viewed Item -->
								<div class="latest_post d-flex flex-row align-items-start justify-content-start">
									<div><div class="latest_post_image"><a href="tintuc/{{$tnb->id}}/{{$tnb->tieudekhongdau}}.html"><img src="upload/tintuc/{{$tnb->image}}" alt="https://unsplash.com/@anniespratt"></a></div></div>
									<div class="latest_post_content">

										<div class="latest_post_title"><a href="tintuc/{{$tnb->id}}/{{$tnb->tieudekhongdau}}.html">{{$tnb->tieude}}</a></div>
										<div class="latest_post_date">{{$tnb->created_at}}</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection