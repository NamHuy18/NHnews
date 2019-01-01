<!DOCTYPE html>
<html lang="en">
<head>
<title>NH News |@yield('title')</title>
<base href="{{asset('')}}">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Tech Mag template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="front_asset/styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="front_asset/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="front_asset/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="front_asset/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="front_asset/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="front_asset/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="front_asset/styles/responsive.css">
<link rel="stylesheet" type="text/css" href="front_asset/styles/category.css">
<link rel="stylesheet" type="text/css" href="front_asset/styles/category_responsive.css">
<link rel="stylesheet" type="text/css" href="front_asset/styles/single.css">
<link rel="stylesheet" type="text/css" href="front_asset/styles/single_responsive.css">
<link rel="stylesheet" type="text/css" href="front_asset/styles/contact.css">
<link rel="stylesheet" type="text/css" href="front_asset/styles/contact_responsive.css">



@yield('css')
</head>
<body>

<div class="super_container">
	
@include('front.layouts.header')



@yield('content')


@include('front.layouts.footer')

</div>

<script src="front_asset/js/jquery-3.2.1.min.js"></script>
<script src="front_asset/styles/bootstrap-4.1.2/popper.js"></script>
<script src="front_asset/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="front_asset/plugins/greensock/TweenMax.min.js"></script>
<script src="front_asset/plugins/greensock/TimelineMax.min.js"></script>
<script src="front_asset/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="front_asset/plugins/greensock/animation.gsap.min.js"></script>
<script src="front_asset/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="front_asset/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="front_asset/plugins/easing/easing.js"></script>
<script src="front_asset/plugins/parallax-js-master/parallax.min.js"></script>
<script src="front_asset/js/custom.js"></script>

@yield('script')
</body>
</html>