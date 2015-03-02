<?php namespace Admin;
use Coupon;
class CouponRepository
{
	public function __construct(Coupon $coupon){
		$this->coupon = $coupon;
	}

	public function getCouponById($id){
		return $this->coupon->find($id);
	}

	public function getPendingCoupons(){
		return $this->coupon->where('confirmed' , 0)->orderBy('created_at' , 'DESC')->get();
	}

	public function getActiveCoupons(){
		return $this->coupon->where('confirmed' , 1)->where('expiration_date' , '>=' , date( 'Y-m-d' , time() ) )->orderBy('expiration_date' , 'ASC')->get();
	}

	public function getRejectedCoupons(){
		return $this->coupon->where('confirmed' , 2)->where('expiration_date' , '>=' , date( 'Y-m-d' , time() ) )->orderBy('updated_at' , 'DESC')->get();
	}

	public function getPendingCouponById($id){
		return $this->coupon->where('id' , $id)->first()->get();
	}

	public function rejectCoupon($id){
		$coupon = $this->getCouponById($id);
		$coupon->confirmed = 2;
		return $coupon->save();
	}

	public function updateAndConfirmCoupon($id , $inputs){
		$coupon = $this->getCouponById($id);
		$coupon->price = $inputs['price'];
		$coupon->name = $inputs['name'];
		$coupon->discription = $inputs['discription'];
		$coupon->category_id = $inputs['category_id'];
		$coupon->service_address = $inputs['service_address'];
		$coupon->sale_percent = $inputs['sale_percent'];
		$coupon->expiration_date = $inputs['expiration_date'];
		$coupon->confirmed = 1;
		return $coupon->save();
	}

}