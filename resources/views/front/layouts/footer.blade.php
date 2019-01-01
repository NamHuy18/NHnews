	<!-- Footer -->

	<footer class="footer">
		
		<div class="footer_content">
			<!-- Image credit: https://unsplash.com/@badashphotos -->
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="front_asset/images/index.jpeg" data-speed="0.8"></div>
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="logo_container">
							<a href="{{route('home')}}">
								<div class="logo"><span>NH News</span></div>
								<div class="logo_sub">~~~~~~~Website tin tức~~~~~~~</div>
							</a>
						</div>
						<div class="footer_nav_container text-center">
							<nav class="footer_nav">
								<ul class="footer_nav_list d-flex flex-md-row flex-column align-items-center justify-content-start">
									<li ><a href="{{route('about')}}">About</a></li>
                                    <li ><a href="{{route('contact')}}">Contact</a></li>

                                    @if(Auth::check())
                                        <li><a href="{{route('user')}}"><i class="fa fa-dribbble" aria-hidden="true">{{Auth::user()->name}}</i></a></li>
                                        <li><a href="{{route('logout')}}">Sign Out</a></li>                                       
                                    @else
                                        <li ><a href="{{route('signup')}}">Sign Up</a></li>
                                        <li ><a href="{{route('login')}}">Sign In</a></li>
                                    @endif

								</ul>
							</nav>
						</div>
						<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed By NH
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
					</div>
				</div>
			</div>
		</div>
	</footer>