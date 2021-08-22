<!DOCTYPE html>
<html lang="en">

	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<title>
        @yield('title','ZERO | Home')
        </title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('dashbord') }}/assets/images/logo/favicon.png">

		<!-- css include -->
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/materialize.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/icofont.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/owl.theme.default.min.css">

		<!-- my css include -->
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/custom-menu.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/style.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/responsive.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/custom.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashbord') }}/assets/css/alertify.min.css">


	</head>


	<body>




		<div class="thetop"></div>
		<!-- for back to top -->

		<div class='backToTop'>
			<a href="#" class='scroll'>
				<span>T</span>
				<span>O</span>
				<span>P</span>
				<span class="go-up">
					<i class="icofont icofont-long-arrow-up"></i>
				</span>
			</a>
		</div>
		<!-- backToTop -->




		<!-- ==================== header-section Start ==================== -->
		<header id="header-section" class="header-section w100dt navbar-fixed">

			<nav class="nav-extended main-nav">
				<div class="container">
					<div class="row">
						<div class="nav-wrapper w100dt">

							<div class="logo left">
								<a href="{{ url('/') }}" class="brand-logo">
									<h2 class="website_name">Z E R O</h2>
								</a>
							</div>
							<!-- logo -->

							<div>
								<a href="#" data-activates="mobile-demo" class="button-collapse">
									<i class="icofont icofont-navigation-menu"></i>
								</a>
								<ul id="nav-mobile" class="main-menu center-align hide-on-med-and-down">
									<li class="@yield('home')"><a href="{{ url('/') }}">HOME</a></li>
									<li class="dropdown @yield('category')">
										<a href="#">CATEGORIES <i class="icofont icofont-simple-down"></i></a>
										<ul class="dropdown-container">
                                            @foreach ($categories as $category)
                                                <li><a href="{{ url('category/details') }}/{{ $category->category_name }}">{{ strtoupper($category->category_name) }}</a></li>
                                            @endforeach

										</ul>
										<!-- /.dropdown-container -->
									</li>
									<li class="@yield('contact')"><a href="{{ route('contact') }}">CONTACT</a></li>

                                    @auth
                                        <li class="dropdown @yield('user')">
                                            <a>{{ strtoupper(Auth::user()->name) }}<i class="icofont icofont-simple-down"></i></a>
                                            <ul class="dropdown-container">
                                                <li><a href="{{ route('user.dashbord') }}">DASHBORD</a></li>
                                                <li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item d-block p-h-15 p-v-10">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                                                <span class="m-l-10">{{ __('LOGOUT') }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                            <!-- /.dropdown-container -->
                                        </li>
                                    @else
                                        <li><a href="{{ url('login') }}">LOGIN</a></li>
                                    @endauth



								</ul>
								<!-- /.main-menu -->

								<!-- ******************** sidebar-menu ******************** -->
								<ul class="side-nav" id="mobile-demo">
									<li class="snavlogo center-align"><h2 class="website_name">Z E R O</h2></li>
									<li class="active"><a href="{{ url('/') }}">HOME</a></li>
									<li class="dropdown">
										<a href="#">CATEGORIES <i class="icofont icofont-simple-down"></i></a>
										<ul class="dropdown-container">
                                            @foreach ($categories as $category)
                                                <li><a href="{{ url('category/details') }}/{{ $category->category_name }}">{{ $category->category_name }}</a></li>
                                            @endforeach

										</ul>
										<!-- /.dropdown-container -->
									</li>
									<li><a href="contact.html">CONTACT</a></li>
									@auth
                                        <li class="dropdown">
                                            <a>{{ strtoupper(Auth::user()->name) }}<i class="icofont icofont-simple-down"></i></a>
                                            <ul class="dropdown-container">
                                                <li><a href="{{ route('user.dashbord') }}">DASHBORD</a></li>
                                                <li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item d-block p-h-15 p-v-10">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                                                <span class="m-l-10">{{ __('LOGOUT') }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                            <!-- /.dropdown-container -->
                                        </li>
                                    @else
                                        <li><a href="{{ url('login') }}">LOGIN</a></li>
                                    @endauth
								</ul>
							</div>
							<!-- main-menu -->

                            <a href="#" class="search-trigger right">
								<i class="icofont icofont-search"></i>
							</a>
							<!-- search -->
							<div id="myNav" class="overlay">
								<a href="javascript:void(0)" class="closebtn">&times;</a>
								<div class="overlay-content">
									<form>
										<input type="text" name="search" placeholder="Search...">
										<br>
										<button class="waves-effect waves-light" type="submit" name="action">Search</button>
									</form>
								</div>
							</div>

						</div>
						<!-- /.nav-wrapper -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</nav>

		</header>
		<!-- /#header-section -->
		<!-- ==================== header-section End ==================== -->




            @yield('frontend_content')





		<!-- ==================== footer-section Start ==================== -->
		<footer id="footer-section" class="footer-section w100dt">
			<div class="container">

				<div class="footer-logo w100dt center-align mb-30">
					<a href="{{ url('/') }}" class="brand-logo">
                        <h2 class="website_name">Z E R O</h2>
                    </a>
				</div>
				<!-- /.footer-logo -->

				<ul class="footer-social-links w100dt center-align mb-30">
					<li><a href="#" class="facebook">FACEBOOK</a></li>
					<li><a href="#" class="twitter">TWITTER</a></li>
					<li><a href="#" class="google-plus">GOOGLE+</a></li>
					<li><a href="#" class="linkedin">LINKDIN</a></li>
					<li><a href="#" class="pinterest">PINTEREST</a></li>
					<li><a href="#" class="instagram">INSTAGRAM</a></li>
				</ul>

				<p class="center-align">
					All Right Reserved, Deasined by
					<a href="{{ url('/') }}" class="l-blue">ZERO</a>
				</p>

			</div>
			<!-- container -->
		</footer>
		<!-- /#footer-section -->
		<!-- ==================== footer-section End ==================== -->


		<!-- my custom js -->
		<script type="text/javascript" src="{{ asset('frontend') }}/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="{{ asset('frontend') }}/js/materialize.js"></script>
		<script type="text/javascript" src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="{{ asset('frontend') }}/js/custom.js"></script>
        <script type="text/javascript" src="{{ asset('dashbord') }}/assets/js/alertify.min.js"></script>
		<script type="text/javascript" src="{{ asset('frontend') }}/js/ajax.js"></script>

        @yield('footer_scripts')


	</body>

</html>
