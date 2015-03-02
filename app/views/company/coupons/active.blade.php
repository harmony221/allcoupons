<table class='listing-table' style="width:100%">
  <h3><span class='fa fa-bullhorn'></span>Գործող ակցիաներ</h3><hr>
  <tr>
    <th>Անվանում</th>
    <th>Հայտարարվել է</th>
    <th>Ավարտվում է</th>
    <th>Արդեն գնել են</th>
    <th>Չեղչից օգտվել են</th>
  </tr>
  @foreach($coupons as $coupon)
  	<tr>
    	<td><a target='_blank' href={{URL::action('CouponsController@showCoupon' , $coupon->id)}}>{{$coupon->name}}</a></td>
    	<td>{{date('Y-m-d' , strtotime($coupon->updated_at))}}</td>
    	<td>{{date('Y-m-d' , strtotime($coupon->expiration_date))}}</td>
      <td>{{$coupon->orders->count()}}</td>
      <td>{{$coupon->usedOrders->count()}}</td>
  </tr>
  @endforeach
</table>