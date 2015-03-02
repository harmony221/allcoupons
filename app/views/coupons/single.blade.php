@extends('template.template')
@section('title')
	{{$coupon->name}}
@stop
@section('meta')
		<meta charset=utf-8>
        <meta name="description" content={{$coupon->discription}}>
        <meta property="og:image" content={{URL::to("/photos/".$coupon->img_src)}}>
        <meta property="og:title" content={{$coupon->name}}>
        <meta property="og:description" content={{$coupon->discription}}>
@stop
@section('content')
	<div class='col-lg-9 col-md-9 col-sm-9 col-xs-9 sale-single-view'>
		<div class='row'>
			<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
				<div class='single-sale-image'>
					{{HTML::image("/photos/".$coupon->img_src)}}
					<div class='single-sale-percent'>
						{{$coupon->sale_percent."%"}}
					</div>
				</div>
			</div>
			<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
				<h4 class='single-sale-header'>{{$coupon->name}}</h4><hr>
				<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
					<div class='single-sale-price'>
						<h2>{{$coupon->price}} դրամ</h2>
						@if(Auth::check() && Auth::user()->role_id == '1')
							<a href="#modalPayment" class='btn btn-primary single-coupon-buy' data-toggle="modal">Գնել</a>
						@else
							<a href={{URL::action('UsersController@loginForm')}} class='btn btn-primary single-coupon-buy' data-toggle="modal">Գնել</a>
						@endif
					</div>
					<!-- AddToAny BEGIN -->
						<div class="a2a_kit a2a_kit_size_32 a2a_default_style share-buttons-set">
						<p><b>Կիսվեք ընկերների հետ</b></p><hr>
						<a class="a2a_dd" href="https://www.addtoany.com/share_save"></a>
						<a class="a2a_button_facebook"></a>
						<a class="a2a_button_twitter"></a>
						<a class="a2a_button_google_plus"></a>
						<a class="a2a_button_vk"></a>
						</div>
						<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
					<!-- AddToAny END -->
				</div>
				<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
					<div class='sale-expiration-date'>
						<p><b>Ակցիան գործում է մինչև</b></p><hr>
						<h4><span class='fa fa-bell-o'></span>{{$coupon->expiration_date}}<h4>
					</div>
					<div class='sale-order-count'>
						<p><b>Արդեն գնել են</b></p><hr>
						<h4><span class='fa fa-users'></span>{{$coupon->orders->count()}}<h4>
					</div>

				</div>
			</div>
		</div><hr>
		<div class='single-sale-discription'>
			<h3>Նկարագրություն</h3>
			{{$coupon->discription}}
		</div>
	</div>
	<div class='col-lg-3 col-md-3 col-sm-3 col-xs-3 sale-company-mini-view'>
		<div class='sale-company-mini-image'>
		@if(!empty($coupon->user->img_src))
			{{HTML::image('/companylogos/'.$coupon->user->img_src)}}
		@endif
		</div>
		<h4><span class='fa fa-bullhorn'></span>{{$coupon->user->company_name}}</h4><hr>
		<p><span class='fa fa-globe'></span>{{$coupon->user->city->name}}</p>
		<p><span class='fa fa-home'></span>{{$coupon->user->company_adress}}</p>
		<p><span class='fa fa-phone'></span>0{{$coupon->user->phone}}</p>
		<p><span class='fa fa-envelope'></span><a target="_blank" href='mailto:{{$coupon->user->email}}'>{{$coupon->user->email}}</a></p>
	</div>
@stop
@if(Auth::check() && Auth::user()->role_id == '1')
<div class="modal fade" id="modalPayment" data-id={{$coupon->id}}>
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Ընտրեք վճարման տեսակը:</h4>
			</div>
			<div class="modal-body" style="text-align:center">
				{{HTML::image('/logos/arca.gif')}}  
				{{HTML::image('/logos/visamaster.gif')}}  
				{{HTML::image('/logos/idram.png')}}  
			</div>
			<div class="modal-footer" style="text-align: center">
				<a class='btn btn-primary' id='user-pay-button'>Վճարել</a>
			</div>
		</div>
    </div>
</div>
@endif