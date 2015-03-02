<?php
class OrderRepository
{
	public function __construct(Order $order , Coupon $coupon) {
		$this->order  = $order;
		$this->coupon = $coupon;
	}

	public function createOrder($inputs){
		$coupon = $this->coupon->find($inputs['coupon_id']);
		$inputs['expiration_date'] = date('Y-m-d' , strtotime("+".$coupon->using_valid_days." day"));
		return $this->order->create($inputs);
	}

	public function getUserBuyedCoupons($id){
		return $this->order->where('user_id' , $id)->where('used' , '0')->where('expiration_date' , ">=" , date('Y-m-d' , time()))->orderBy('created_at' , 'DESC')->get();
	}

	public function getUserUsedCoupons($id){
		return $this->order->where('user_id' , $id)->where('used' , '1')->orderBY('used_date' , 'DESC')->get();
	}

	public function getUserExpiredCoupons($id){
		return $this->order->where('user_id' , $id)->where('used' , '0')->where('expiration_date' , "<" , date('Y-m-d' , time()))->orderBY('expiration_date' , 'DESC')->get();
	}
}