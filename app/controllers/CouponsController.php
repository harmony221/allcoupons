<?php

class CouponsController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function __construct(CouponRepositroy $couponRepositroy){
		$this->couponRepositroy = $couponRepositroy;
	}

	public function getAllConfirmedCoupons()
	{
		return View::make( 'index' , ['coupons' => $this->couponRepositroy->getConfirmed()]);
	}

	public function showCoupon($id){
		if(null != $coupon = $this->couponRepositroy->getCouponById($id)){
			return View::make('coupons.single' , ['coupon' => $coupon]);
		} else {
			return Redirect::to('/');
		}
	}

}
