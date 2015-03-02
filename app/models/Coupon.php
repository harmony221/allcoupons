<?php

class Coupon extends \Eloquent {
	protected $fillable = ['price' , 'using_valid_days' , 'name' , 'discription' , 'user_id' , 'category_id' , 'service_address' , 'sale_percent' , 'expiration_date' , 'confirmed' , 'img_src'];

	public function user(){
		return $this->belongsTo('User');
	}

	public function category(){
		return $this->belongsTo('Category');
	}

	public function orders(){
		return $this->hasMany('Order');
	}
	public function usedOrders(){
		return $this->hasMany('Order')->where('used' , '1');
	}
}