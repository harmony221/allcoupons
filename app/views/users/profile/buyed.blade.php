@if($orders->count() === 0)
Գնված կտրոններ չկան:
@endif
@foreach($orders as $order)
	<div class='user-coupon-wrapper row'>
		<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4 user-coupon-image'>
			{{HTML::image(Croppa::url('/photos/'.$order->coupon->img_src , 150 , 150))}}
		</div>
		<div class='col-lg-8 col-md-8 col-sm-8 col-xs-8 user-coupon-info'>
			<h3 class="user-coupon-code">Կոդ <span>{{$order->order_code}}</span></h3>
			<p class='user-coupon-name'>{{$order->coupon->name}}</p>
			<p class="user-coupon-address">Կտրոնը ներկայացնել {{$order->coupon->service_address}} հասցեով:</p>
			<span class='user-coupon-date' style='background: #28ae60;'>
				Վավեր է մինչև {{$order->expiration_date}}
			</span>
		</div>
	</div>
@endforeach
