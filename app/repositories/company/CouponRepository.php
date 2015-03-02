<?php namespace Company;
use Coupon;
class CouponRepository
{
	public function __construct(Coupon $coupon){
		$this->coupon = $coupon;

	}

	public function createCoupon($inputs){
		return $this->coupon->create($inputs);
	}

	public function getCompanyActiveCoupons($id){
		return $this->coupon->where('user_id' , $id)->where('confirmed' , '1')->where('expiration_date' , '>=' , date( 'Y-m-d' , time() ) )->orderBy('expiration_date' , 'ASC')->get();
	}
}