<!DOCTYPE HTML>
<html class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php if(isset($breadcrumb_t))echo $breadcrumb_t . ' - '; ?>
    Kampuzz.com - Mammoth Guide of Colleges, Courses &amp; Exams</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
  {{ HTML::style('css/bootstrap.css') }}
  {{ HTML::style('css/bootstrap-theme.css') }}
  {{ HTML::style('css/style.css') }}
  {{ HTML::style('vendor/prettyphoto/css/prettyPhoto.css') }}
  {{ HTML::style('vendor/owl-carousel/css/owl.carousel.css') }}
  {{ HTML::style('vendor/owl-carousel/css/owl.theme.css') }}
  <!--[if lte IE 9]>
  {{ HTML::style('css/ie.css') }}
  <![endif]-->
  {{ HTML::style('css/custom.css') }}
  {{ HTML::style('css/color.css') }}
  {{ HTML::script('js/modernizr.js') }}
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico')}}">
</head>
<body class="home floated-search">
<!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
    <!-- Start Site Header -->
    <div class="site-header-wrapper">
        <header class="site-header">
            <div class="container sp-cont">
                <div class="site-logo">
                    <h1><a href="{{ URL::route('home') }}"><img src="{{ URL::asset('images/logo.png') }}" alt="Kampuzz.com"></a></h1>
                    <span class="site-tagline">Mammoth Guide of <br>Colleges, Courses &amp; Exams</span>
                </div>
                @if(Auth::guest())
                <div class="header-right">
                    <div class="user-login-panel">
                        <a href="#" class="user-login-btn" data-toggle="modal" data-target="#loginModal"><i class="icon-profile"></i></a>
                    </div>
                    <div class="topnav dd-menu">
                        <ul class="top-navigation sf-menu">
                            <!-- <li><a href="#">Create Account</a></li>-->
                        </ul>
                    </div>
                </div>
                @else
   <div class="header-right">
                    <div class="user-login-panel logged-in-user">
                        <a href="#" class="user-login-btn" id="userdropdown" data-toggle="dropdown">

                            <span class="user-informa">
                                <span class="meta-data">Welcome</span>
                                <span class="user-name">{{ Auth::user()->name }}</span>
                            </span>
                            <span class="user-dd-dropper"><i class="fa fa-angle-down"></i></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="userdropdown">
                            <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('user.profile') }}">Profile</a></li>
                            <li><a href="{{ route('user.qna') }}">Q&amp;A</a></li>
                            <li><a href="{{ route('user.logout') }}">Log Out</a></li>
                        </ul>
                    </div>
                    <div class="topnav dd-menu">
                        <ul class="top-navigation sf-menu">

                        </ul>
                    </div>
                </div>
                @endif

            </div>
        </header>
        <!-- End Site Header -->
        <div class="navbar">
            <div class="container sp-cont">
                <div class="search-function">
                    <span><i class="fa fa-envelope-o"></i> Email us at <strong>info@kampuzz.com</strong></span>
                </div>
                <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <!-- Main Navigation -->
                <nav class="main-navigation dd-menu toggle-menu" role="navigation">
                   {{ ($menu) }}
                </nav> 
            </div>
        </div>
    </div>
    @if(Route::currentRouteName()=='home')
        @include('includes.home-banner')
    @else
        @include('includes.breadcrumb')
    @endif
    
    <!-- Start Body Content -->
    <div class="main" role="main">
        <div id="content" class="content full padding-b0">
            <div class="container">
                @include('flash::message')
@yield('content')

            </div>
            <div class="spacer-50"></div>
            
        </div>
    </div>
    <!-- End Body Content -->
    <!-- Start site footer -->
    <footer class="site-footer">
        <div class="site-footer-top">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-4 col-sm-6 footer_widget widget widget_custom_menu widget_links">
                        <h4 class="widgettitle">Career Options</h4>
                        @include('includes.widget_career_options')
                    </div>
                    <div class="col-md-4 col-sm-6 footer_widget widget widget_custom_menu widget_links">
                        <h4 class="widgettitle">Study Abroad</h4>
                        @include('includes.widget_abroad')
                    </div>
                    <div class="col-md-4 col-sm-6 footer_widget widget text_widget">
                        <h4 class="widgettitle">About Kampuzz.com</h4>
                        <p>KAMPUZZ serves as one of the leading information provider in the field of Education, and provides best results and solutions with scrutinized researching amongst a bundle. It represents a unique identity in the enlarged sector comprising of Academic Portal, and maintains an Indian originality at its best. KAMPUZZ offers the online seekers with simplified, traditionalized and rapid search results, and allow you to manage your searches distinctively from one category to another</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 copyrights-left">
                        <p>&copy; {{ date('Y')}} Live Kampuzz Pvt. Ltd. All Rights Reserved</p>
                    </div>
                    <div class="col-md-6 col-sm-6 copyrights-right">
                        <ul class="social-icons social-icons-colored pull-right">
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li class="youtube"><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li class="flickr"><a href="#"><i class="fa fa-flickr"></i></a></li>
                            <li class="vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                            <li class="digg"><a href="#"><i class="fa fa-digg"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End site footer -->
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>  
</div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Login to your account</h4>
            </div>
            <div class="modal-body">
@include('includes/login_form')
            </div>
            <div class="modal-footer">
                <button type="button" onclick="login('{{ route('fblogin') }}')" class="btn btn-block btn-facebook btn-social"><i class="fa fa-facebook"></i> Login with Facebook</button>
                <button type="button" onclick="login('{{ route('glogin') }}')" class="btn btn-block btn-twitter btn-social"><i class="fa fa-google"></i> Login with Google</button>
            </div>
        </div>
    </div>
</div>
{{ HTML::script('js/jquery-2.0.0.min.js') }}
{{ HTML::script('vendor/prettyphoto/js/prettyphoto.js') }}
{{ HTML::script('js/ui-plugins.js') }}
{{ HTML::script('js/helper-plugins.js') }}
{{ HTML::script('vendor/owl-carousel/js/owl.carousel.min.js') }}
{{ HTML::script('vendor/password-checker.js') }}
{{ HTML::script('js/bootstrap.js') }}
{{ HTML::script('js/init.js') }}
{{ HTML::script('vendor/flexslider/js/jquery.flexslider.js') }}
<script>

        function login(url){
       // alert(url);
            window.location.href=url;
        }
        </script>
</body>
</html>