<h3><span class='fa fa-tag'></span>Ստուգել հաճախորդի ներկայացրած կտրոնի կոդը</h3><hr>
<div class='coupon-create-form'>
	{{Form::open(['id' => 'coupon-checking-form'])}}
		{{Form::text('order_code' , null , ['class' => 'form-control' , 'placeholder' => 'Մուտքագրեք կտրոնի վեցնիշանոց կոդը' , 'autocomplete' => 'off'])}}
		{{Form::submit('ստուգել' , ['class' => 'btn btn-primary'])}}
	{{Form::close()}}
	<div id="response-information"></div>
</div>