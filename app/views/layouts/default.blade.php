<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title> 
			@section('title') 
			@show 
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
		<link href="{{ asset('css/bootstrapSwitch.css') }}" rel="stylesheet"><!-- Bootstrap switch from https://github.com/nostalgiaz/bootstrap-switch.git -->
        <link href="{{ asset('css/adec-common.css') }}" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	<body>
        <div id="header" class="brand hidden-xs">
            <div class="container">
                <img id="header_vandy_logo" src="/img/branding/header-international-edu-university-logo.png" />
                <img id="header_adec_logo" src="/img/branding/header-adec-logo.png" />
                <!--                <img id="header_hands_world" src="/img/branding/header-hands-world.png" /> -->
            </div>
        </div>
        <div id="wrap" class="container">
            <div class="header-spacer hidden-xs"> &nbsp; </div>

            <!-- Navbar -->
            <div class="navbar navbar-default" role="navigation">
<!--                    <div class="container">-->
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">ADEC</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    @if (Sentry::check())
                    <ul class="nav navbar-nav">
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ URL::to('') }}">my Dashboard</a></li>

<!--           Not being used             -->
<!--                        <li class="dropdown">-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li><a href="#">Action</a></li>-->
<!--                                <li><a href="#">Another action</a></li>-->
<!--                                <li><a href="#">Something else here</a></li>-->
<!--                                <li class="divider"></li>-->
<!--                                <li><a href="#">Separated link</a></li>-->
<!--                                <li class="divider"></li>-->
<!--                                <li><a href="#">One more separated link</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
                    </ul>
                    @endif

<!--       NOT USING SEARCH RIGHT NOW             -->
<!--                    <form class="navbar-form navbar-left" role="search">-->
<!--                        <div class="form-group">-->
<!--                            <input type="text" class="form-control" placeholder="Search">-->
<!--                        </div>-->
<!--                        <button type="submit" class="btn btn-default">Submit</button>-->
<!--                    </form>-->
                    <ul class="nav navbar-nav navbar-right">
                        @if (Sentry::check())
                        <li class="navbar-text">{{ Sentry::getUser()->email }}</li>
                        <li class="divider-vertical"></li>
                        <li {{ (Request::is('users/show/' . Sentry::getUser()->id) ? 'class="active"' : '') }}><a href="{{ URL::to('/users/show/'.Sentry::getUser()->id) }}">Account</a></li>
                        <li><a href="{{ URL::to('users/logout') }}">Logout</a></li>
                        @else
                        <li {{ (Request::is('users/login') ? 'class="active"' : '') }}><a href="{{ URL::to('users/login') }}">Login</a></li>
                        <li {{ (Request::is('users/register') ? 'class="active"' : '') }}><a href="{{ URL::to('users/register') }}">Register</a></li>
                        @endif
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li {{ (Request::is('users*') ? 'class="active"' : '') }}><a href="{{ URL::to('/users') }}">Users</a></li>
                                <li {{ (Request::is('groups*') ? 'class="active"' : '') }}><a href="{{ URL::to('/groups') }}">Groups</a></li>
                                <li {{ (Request::is('schools*') ? 'class="active"' : '') }}><a href="{{ URL::to('/schools') }}">Schools</a></li>
                                <li {{ (Request::is('gls*') ? 'class="active"' : '') }}><a href="{{ URL::to('/gls') }}">GLSs</a></li>
                        <li {{ (Request::is('discussions*') ? 'class="active"' : '') }}><a href="{{ URL::to('/discussions') }}">Discussions</a></li>
                                <li {{ (Request::is('resource*') ? 'class="active"' : '') }}><a href="{{ URL::to('/resources') }}">Resources</a></li>
                                <li {{ (Request::is('tag*') ? 'class="active"' : '') }}><a href="{{ URL::to('/tags') }}">Categories</a></li>
                                <li class="divider"></li>
                                <li><a href="/coachactivity">Coach Activity</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>

                </div><!-- /.navbar-collapse -->
<!--                    </div>-->
            </div>



            <!-- Container -->
            <div class="row">
                <div class="container">
                    <!-- Notifications -->
                    @include('notifications')
                    <!-- ./ notifications -->

                    <!-- Content -->
                    @yield('content')
                    <!-- ./ content -->
                </div>
            </div>


		<!-- ./ container -->


        </div>

        <!-- footer -->
        <div id="footer">
            <div id="footer_content_wrapper">
                <div class="container">
                    <p>&copy 2013 - international-edu University, in cooperation with the Abu Dhabi Education Council</p>
                    <p lang="ar" dir="rtl">جامعة فاندربيلت بالتعاون مع مجلس أبو ظبي للتعليم</p>
                </div>
            </div>
        </div>
		<!-- Javascripts
		================================================== -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/restfulizer.js') }}"></script> <!-- Thanks to Zizaco for this script:  http://zizaco.net  -->
		<script src="{{ asset('js/bootstrapSwitch.js') }}"></script> <!-- Bootstrap switch from https://github.com/nostalgiaz/bootstrap-switch.git -->

	</body>
</html>
