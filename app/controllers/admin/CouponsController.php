<?php namespace Admin;
use View, CategoryRepository, Request, Input, Validator, Redirect, Response;

class CouponsController extends \BaseController {

public function __construct(CouponRepository $couponRepository , CategoryRepository $categoryRepository) {
	$this->couponRepository = $couponRepository;
	$this->categoryRepository = $categoryRepository;
}

public function getPendingCoupons(){
	return View::make('admin.coupons.pending' , ['coupons' => $this->couponRepository->getPendingCoupons() , 'categories' => $this->categoryRepository->getAllCategoriesList()]);
}

public function getActiveCoupons(){
	return View::make('admin.coupons.active' , ['coupons' => $this->couponRepository->getActiveCoupons() , 'categories' => $this->categoryRepository->getAllCategoriesList()]);
}

public function getRejectedCoupons(){
	return View::make('admin.coupons.rejected' , ['coupons' => $this->couponRepository->getRejectedCoupons() , 'categories' => $this->categoryRepository->getAllCategoriesList()]);
}

public function rejectCoupon(){
	if(Request::ajax()) {
		$inputs = Input::all();
		$id = $inputs['coupon_id'];
		if(null != $coupon = $this->couponRepository->getCouponById($id)){
			$this->couponRepository->rejectCoupon($id);
			return 'success';
		} else return 'Unknown Coupon';
	}
}

public function confirmCoupon(){
	if(Request::ajax()) {
		$inputs = Input::all();
		$id = $inputs['id'];
		$rules = [
				'price' => 'required|numeric',
				'name' => 'required',
				'discription' => 'required',
				'category_id' => 'required',
				'service_address' => 'required',
				'sale_percent' => 'required|numeric',
				'using_valid_days' => 'required|numeric',
				'expiration_date' => 'required|date'
			];
			$inputs = Input::all();
			$validator = Validator::make($inputs , $rules);
			if($validator->fails()){
				return Response::json(['errors' => $validator->messages()]);
			} else {
		if(null != $coupon = $this->couponRepository->getPendingCouponById($id)){
			$this->couponRepository->updateAndConfirmCoupon($id , $inputs);
			return Response::json(['success'=>'success']);
		} else return 'Unknown Coupon';
	}
	}
}


}