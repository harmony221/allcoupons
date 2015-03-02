<?php
class CouponRepositroy
{
	public function __construct(Coupon $coupon){
		$this->coupon = $coupon;
	}

	public function getConfirmed(){
		return $this->coupon->where('confirmed' , 1)->where('expiration_date' , '>=' , date( 'Y-m-d' , time() ) )->orderBy('updated_at' , "DESC")->get();
	}

	public function getCouponById($id){
		return $this->coupon->where('id' , $id)->where('expiration_date' , '>=' , date( 'Y-m-d' , time() ) )->where('confirmed' , 1)->first();
	}

	
}