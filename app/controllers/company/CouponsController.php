<?php namespace Company;
use Validator;
use View,CategoryRepository,Input,Request,Response,Auth,Croppa;

class CouponsController extends \BaseController {

public function __construct(CategoryRepository $categoryRepository , CouponRepository $couponRepository){
	$this->categoryRepository = $categoryRepository;
	$this->couponRepository = $couponRepository;
}

public function createCoupon(){
	return View::make('company.coupons.create' , ['categories' => $this->categoryRepository->getAllCategoriesList()]);
}

public function storeCoupon(){
	if(Request::ajax()){
		$inputs = Input::all();
		//dd($inputs);
		$rules = [
				'price' 		   => 'required|numeric',
				'name' 			   => 'required',
				'discription'      => 'required',
				'category_id'      => 'required',
				'service_address'  => 'required',
				'sale_percent'     => 'required|numeric',
				'using_valid_days' => 'required|numeric',
				'expiration_date'  => 'required|date',
				'image'			   => 'required|mimes:jpg,jpeg,png',
			];
		$validator = Validator::make( $inputs , $rules);
		if( $validator->fails() ) {
			$messages = $validator->messages();
			return Response::json( [ 'error' => $messages ] );
		}
		$filename = time().Input::file('image')->getClientOriginalName();
		$destination = public_path().'/photos/';
		Input::file('image')->move($destination , $filename);
		Croppa::url(public_path()."/photos/".$filename, 10, 10, ['resize']);
		$inputs['user_id'] = Auth::user()->id;
		$inputs['confirmed'] = 0;
		$inputs['img_src'] = $filename;
		if($this->couponRepository->createCoupon($inputs)){
			return Response::json(['success' => 'success']);
		} else {
			return Response::json(['fail' => 'fail']);
		}
	}
}

public function activeCoupons(){
	$id = Auth::user()->id;
	return View::make('company.coupons.active' , ['coupons' => $this->couponRepository->getCompanyActiveCoupons($id)] );
} 

}