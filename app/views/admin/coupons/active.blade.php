<h3><span class='fa fa-bullhorn'></span>Գործող ակցիաներ</h3><hr>
@if(($coupons->count() == 0))
<span class='fa fa-check-circle'></span><span>Գործող կտրոններ դեռևս չկան</span>
@endif
@foreach($coupons as $coupon)
<div class='coupon-listing-header'>
<a class='fa fa-eye tag-icon btn btn-primary' data-id=0 style="font-size:14px;"></a><span style="font-size:20px;">{{date('Y-m-d' , strtotime($coupon->updated_at))." - ".$coupon->expiration_date." / ".$coupon->user->company_name}}</span> / արդեն գնել են ({{$coupon->orders->count()}})
<div class='row single-coupon'>
  <div class='coupon-create-form col-lg-6 col-md-6 col-sm-6 col-xs-6'>
  {{Form::model($coupon , ['data-id' => $coupon->id , 'id' => 'coupon-confirming-form'])}}
    {{Form::label('name' , 'Վերնագիր')}}
    {{Form::text('name' , null , ['class'=>'form-control'])}}
    {{Form::label('discription' , 'Նկարագրություն')}}
    {{Form::textarea('discription' , null , ['class'=>'form-control'])}}
    {{Form::label('category_id' , 'Կատեգորիա')}}
    {{Form::select('category_id' , $categories , null , ['class'=>'form-control'])}}
    {{Form::label('service_address' , 'Հասցե')}}
    {{Form::text('service_address' , null , ['class'=>'form-control'])}}
    {{Form::label('sale_percent' , 'Զեղչի չափ (%)')}}
    {{Form::text('sale_percent' , null , ['class'=>'form-control'])}}
    {{Form::label('price' , 'Գին ( դրամ )')}}
    {{Form::text('price' , null , ['class'=>'form-control'])}}
    {{Form::label('expiration_date' , 'Գործում է մինչև..')}}
    {{Form::text('expiration_date' , null , ['class' => 'form-control'])}}
    {{Form::label('using_valid_days' , 'Կտրոնի վավերականության ժամանակահատված (օր)')}}
    {{Form::text('using_valid_days' , null , ['class' => 'form-control'])}}
    {{Form::submit('հաստատել' , ['class' => 'btn btn-primary'])}} <input value='մերժել' type='button' class='btn btn-danger ' data-id={{$coupon->id}} id='coupon-reject'>
  {{Form::close()}}
    
</div>
<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>
  <table class='listing-table' style="width:100%">
  <tr>

    <th>Գործընկեր</th>
    <th>Կոնտակտային անձ</th>
    <th>Հեռախոս</th>
    <th>Քաղաք</th>
    <th>Ստեղծվել է</th>
  </tr>
    <tr>
      <td>{{$coupon->user->company_name}}</td>
      <td>{{$coupon->user->first_name." ".$coupon->user->last_name}}</td>
      <td>{{$coupon->user->phone}}</td>
      <td>
        @if($coupon->user->city)
          {{$coupon->user->city->name}}
        @endif
      </td>
      <td>{{$coupon->created_at}}</td>
  </tr>
</table>
<div class='pending-coupon-image'>
  {{HTML::image(Croppa::url("photos/".$coupon->img_src, 300, 300 , ['resize']) , $coupon->name)}}
</div>
<div class='validation-errors'></div>
</div>
</div>
</div>
@endforeach