<?php namespace Company;
use Order, Response;
class OrderRepository
{
	public function __construct(Order $order){
		$this->order = $order;

	}

	public function checkOrder($inputs){
		if(null != $order = $this->order->where('used' , '0')->where('order_code' , trim( strtolower( $inputs['order_code'] ) ) )->first() ) {
			if($order->coupon->user_id == $inputs['company']) {
				if( $order->expiration_date >= date( 'Y-m-d' , time() ) ) {
				return Response::json(['order' => [
					'id'        => $order->id,
					'user'      => $order->user->first_name." ".$order->user->last_name,
					'coupon'    => $order->coupon->name,
					'coupon_id' => $order->coupon->id,
					'date'      => $order->created_at,
					'code'      => $order->order_code
					]]);
			} else {
				return Response::json(['expired' => "Կտրոնը այլևս վավեր չէ: Վավերականության ժամկետը լրացել է` ".$order->expiration_date]);
			}

			} else {
				return Response::json(['not_exist' => "Տվյալ կոդով կտրոն գոյություն չունի:"]);
		}
			 
		} else {
				return Response::json(['not_exist' => "Տվյալ կոդով կտրոն գոյություն չունի:"]);
		}
	}

	public function useOrder($code , $id) {
		if(null != $order = $this->order->where('used' , '0')->where('order_code' , $code)->where('id' , $id)->first() ) {
			$order->used = 1;
			$order->used_date = date('Y-m-d' , time() );
			$order->order_code = null;
			return $order->save();
		}
	}
}