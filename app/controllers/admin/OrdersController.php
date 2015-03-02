<?php namespace Admin;
use View;

class OrdersController extends \BaseController {

public function __construct(OrderRepository $orderRepository){
	$this->orderRepository = $orderRepository;

}

public function activeOrders(){
	return View::make('admin.orders.active' , ['orders' => $this->orderRepository->activeOrders()]);
}

public function expiredOrders(){
	return View::make('admin.orders.expired' , ['orders' => $this->orderRepository->expiredOrders()]);
}

}