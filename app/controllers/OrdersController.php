<?php

class OrdersController extends BaseController {

	
	

	public function __construct(OrderRepository $orderRepository){
		$this->orderRepository = $orderRepository;
	}

	public function storeOrder(){
		$inputs = Input::all();
		$inputs['user_id'] = Auth::user()->id;
		$inputs['order_code'] = strtolower(str_random('6'));
		$inputs['used'] = 0;
		if($this->orderRepository->createOrder($inputs)){
			return 'true';
		}
	}

	public function buyedCoupons(){
		return View::make('users.profile.buyed' , ['orders' => $this->orderRepository->getUserBuyedCoupons(Auth::user()->id)]);
	}

	public function usedCoupons(){
		return View::make('users.profile.used' , ['orders' => $this->orderRepository->getUserUsedCoupons(Auth::user()->id)]);
	}

	public function expiredCoupons(){
		return View::make('users.profile.expired' , ['orders' => $this->orderRepository->getUserExpiredCoupons(Auth::user()->id)]);
	}

}
