<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
	
		{{HTML::script('js/jquery.js')}}
		{{HTML::script('js/bootstrap.js')}}
		{{HTML::script('js/main.js')}}
		{{HTML::style('css/bootstrap.css')}}
		{{HTML::style('css/bootstrap-theme.css')}}
		{{HTML::style('css/fa.css')}}
		{{HTML::style('css/main.css')}}
		@yield('meta')
	</head>
	<body>
		<ul class='main-menu'>
			<li id='menu-item-coupons'><span class='fa fa-bullhorn'></span><span><a href='/'>Ակցիաներ</a></span>
				<ul class='row coupons-submenu'>
					<ul class='coupons-submenu-items col-lg-4 col-md-4 col-sm-4 col-xs-4'></ul>
					<div class='coupons-submenu-discription col-lg-8 col-md-8 col-sm-8 col-xs-8'>
						<h3 style="text-align:center">Թոփ ակցիաներ</h3><hr>
					</div>
				</ul>
			</li>
			@if( !Auth::check() || Auth::user()->role_id != 1) 
				<li class="pull-right"><a href='{{URL::action("UsersController@registerForm")}}'>Գրանցում</a></li>
				<li class='pull-right'><a href='{{URL::action("UsersController@loginForm")}}'>Մուտք</a></li>
			@endif
			@if(Auth::check() && Auth::user()->role_id == 1)
			<li class="pull-right"><a href='{{URL::action("UsersController@logout")}}'><span class='fa fa-angle-right'></span><span>Ելք</span></a></li>
			<li class='pull-right'><a href={{URL::action('UsersController@userProfile')}}><span class='fa fa-user'></span><span>{{Auth::user()->first_name}}</span></a></li>
			@endif
		</ul>
		<div class='content'>
			

