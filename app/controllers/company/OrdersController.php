<?php namespace Company;
use View , Input , Auth;

class OrdersController extends \BaseController {

public function __construct(OrderRepository $orderRepository){
	$this->orderRepository = $orderRepository;
}

public function checkOrderForm(){
	return View::make('company.orders.check');
}

public function checkOrder(){
	$inputs = Input::all();
	$inputs['company'] = Auth::user()->id;
	return $this->orderRepository->checkOrder($inputs);
}

public function useOrder(){
	$inputs = Input::all();
	$company = Auth::user()->id;
	$code = $inputs['code'];
	$id = $inputs['id'];
	if($this->orderRepository->useOrder($code , $id)){
		return 'true';
	} else {
		return 'false';
	}
}

}