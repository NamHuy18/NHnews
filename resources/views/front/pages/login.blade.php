@extends('front.layouts.master')

@section('content')
	<div class="home1">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="front_asset/images/index.jpeg" data-speed="0.8"></div>
		<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title">Đăng Nhập</div>
							<div class="breadcrumbs">

								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li><a href="{{route('home')}}">Trang Chủ</a></li>
								
								</ul>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Page Content -->
    <div class="content_container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">				  	
				  	<div class="panel-body">

				  		@if(count($errors) > 0)
				  			<div class="alert alert-danger">
				  				@foreach($errors->all() as $err)
				  					{{$err}}<br>
				  				@endforeach
				  			</div>
				  		@endif

				  		@if(session('thongbao'))
				  			<div class="alert alert-danger">
				  				{{session('thongbao')}}
				  			</div>
				  		@endif

				    	<form action="{{route('login')}}" method="POST">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" 
							  	>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" placeholder="Password" name="password">
							</div>
							<br>
							<button type="submit" class="load_more_button"><a href="">Đăng nhập</a>
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection