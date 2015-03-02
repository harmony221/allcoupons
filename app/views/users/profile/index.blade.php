@extends('template.template')
@section('title')
	{{Auth::user()->first_name." ".Auth::user()->last_name." - allcoupons.am"}}
@stop
@section('content')
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
	<ul class='user-profile-coupons'>
		<li id='user-buyed-coupons'><span class='fa fa-tags'></span><span>Գնված Կտրոններ</span></li>
		<li id='user-used-coupons'><span class='fa fa-check'></span><span>Օգտագործված Կտրոններ</span></li>
		<li id='user-expired-coupons'><span class='fa fa-exclamation'></span><span>Անվավեր Կտրոններ</span></li>
	</ul>
	{{HTML::image('/logos/ajax-loader.gif' , null , ['class' => 'user-profile-loader'])}}
	<div class="user-profile-coupons-info">
	</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">top</div>
@stop