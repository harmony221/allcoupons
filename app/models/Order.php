<?php

class Order extends \Eloquent {
	protected $fillable = ['order_code' , 'coupon_id' , 'user_id' , 'expiration_date' , 'used' , 'used_date'];

	public function coupon(){
		return $this->belongsTo('Coupon');
	}

	public function user(){
		return $this->belongsTo('User');
	}
}