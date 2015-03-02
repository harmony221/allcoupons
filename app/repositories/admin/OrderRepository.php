<?php namespace Admin;
use Order;
class OrderRepository
{
	public function __construct(Order $order){
		$this->order = $order;
	}

	public function activeOrders(){
		return $this->order->where('used' , '0')->where('expiration_date' , '>=' , date('Y-m-d', time()))->orderBY('created_at' , 'DESC')->get();
	}

	public function expiredOrders(){
		return $this->order->where('used' , '0')->where('expiration_date' , '<' , date('Y-m-d', time()))->orderBY('created_at' , 'DESC')->get();
	}
}