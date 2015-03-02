@extends('template.template')
@section('content')
	<div class='homepage-coupons-listing'>
		@foreach($coupons as $coupon)
			<div class='homepage-single-coupon'>
				<div class='homepage-single-coupon-image'>
					{{HTML::image(Croppa::url('photos/'.$coupon->img_src , 250, 250) , $coupon->name , ['width'=>250, 'height' => 250])}}
				</div>
				<div class='homepage-single-coupon-price'>
					{{$coupon->price." դրամ"}}
				</div>
				<div class='homepage-single-coupon-header'>
					{{$coupon->name}}
				</div>
				<div class='homepage-single-coupon-sale-percent'>
					{{$coupon->sale_percent."%"}}
				</div>
				<div class='homepage-single-coupon-view-more'>
					<a href={{URL::action('CouponsController@showCoupon' , $coupon->id)}} class='btn btn-primary'>Մանրամասն</a>
				</div>
			</div>
		@endforeach
	</div>
@stop