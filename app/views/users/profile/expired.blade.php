@if($orders->count() === 0)
Անվավեր կտրոններ չկան:
@endif
@foreach($orders as $order)
	<div class='user-coupon-wrapper row'>
		<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4 user-coupon-image'>
			{{HTML::image(Croppa::url('/photos/'.$order->coupon->img_src , 150 , 150))}}
		</div>
		<div class='col-lg-8 col-md-8 col-sm-8 col-xs-8 user-coupon-info'>
			<p class='user-coupon-name'>{{$order->coupon->name}}</p>
			<span class='user-coupon-date' style='background: #e74c3c;'>
				Վավերականության ժամկետը լրացել է {{$order->expiration_date}}
			</span>
		</div>
	</div>
@endforeach
