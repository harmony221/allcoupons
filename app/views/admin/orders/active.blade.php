<table class='listing-table' style="width:100%">
  <h3><span class='fa fa-tags'></span>Ակտիվ կտրոններ</h3><hr>
  <tr>
    <th>Ակցիա</th>
    <th>Գնորդ</th>
    <th>Կոդ</th>
  </tr>
  @foreach($orders as $order)
  	<tr>
    	<td><a target='_blank' href={{URL::action('CouponsController@showCoupon' , $order->coupon->id)}}>{{$order->coupon->name}}</a></td>
    	<td>{{$order->user->first_name." ".$order->user->last_name." 0".$order->user->phone}}</td>
    	<td>{{$order->order_code}}</td>
  </tr>
  @endforeach
</table>