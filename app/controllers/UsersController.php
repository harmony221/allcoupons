<?php

class UsersController extends \BaseController {

	public function __construct(UserRepository $userRepository , CityRepository $cityRepository) 
	{
		$this->userRepository = $userRepository;
		$this->cityRepository = $cityRepository;
	}

	/**
	 * Display a form for user-registration.
	 * GET /register
	 *
	 * @return Response
	 */
	public function registerForm()
	{
		if(Auth::check() && Auth::user()->role_id == 1){
			return Redirect::to('/');
		} else {
			return View::make('users.register');
		}
	}

	public function loginForm()
	{
		if(Auth::check() && Auth::user()->role_id == 1){
			return Redirect::to('/');
		} else {
			return View::make('users.login');
		}
	}

	public function registerCompanyForm()
	{
		if(false){
			return Redirect::to('/');
		} else {
			return View::make('users.registerCompany' , ['cities' => $this->cityRepository->getAllCitiesInList()]);
		}
	}

	public function registerUser()
	{
		if(Auth::check() && Auth::user()->role_id == 1){
			return Redirect::to('/');
		} else {
			$rules = [
				'email' => 'required|email|unique:users',
				'first_name' => 'required|alpha|min:2|max:20',
				'last_name' => 'required|alpha|min:2|max:20',
				'password' => 'required|min:6',
				'repeat_password' => 'required|same:password'
			];
			$inputs = Input::all();
			$validator = Validator::make($inputs , $rules);
			if($validator->fails()){
				return Redirect::back()->with('messages' , $validator->messages())->withInput();
			} else {
				$inputs['password'] = Hash::make($inputs['password']);
				$inputs['email_confirmation_code'] = str_random(20);
				$inputs['password_reset_code'] = str_random(20);
				$inputs['role_id'] = 1;
				$user = $this->userRepository->registerUser($inputs);
				return Redirect::to('/');
			}
		}
	}

	public function registerCompany()
	{
		if(false){
			return Redirect::to('/');
		} else {
			$companyRules = [
				'email' => 'required|email|unique:users',
				'first_name' => 'required|alpha|min:2|max:20',
				'last_name' => 'required|alpha|min:2|max:20',
				'password' => 'required|min:6',
				'repeat_password' => 'required|same:password',
				'company_name'    => 'required',
				'city_id'         => 'required',
				'phone'           => 'required|numeric'
			];
			$inputs = Input::all();
			$companyValidator = Validator::make($inputs , $companyRules);
			if($companyValidator->fails()){
				return Redirect::back()->with('messages' , $companyValidator->messages())->withInput();
			} else {
				$inputs['password'] = Hash::make($inputs['password']);
				$inputs['email_confirmation_code'] = str_random(20);
				$inputs['password_reset_code'] = str_random(20);
				$inputs['role_id'] = 2;
				$user = $this->userRepository->registerUser($inputs);
				return Redirect::to('/');
			}
		}
	}

	public function confirmUser($confirmation_code){
		if($this->userRepository->confirmUser($confirmation_code)) {
			return Redirect::to('/');
		} else return "Wrong code!!!";
	}

	public function authUser(){
		if(Auth::check() && Auth::user()->role_id == 1){
			return Redirect::back();
		} else {
			$rules = [
				'email' => 'required|email',
				'password' => 'required|min:6',
			];
			$inputs = Input::all();
			$validator = Validator::make($inputs , $rules);
			if($validator->fails()){
				return Redirect::back()->with('messages' , $validator->messages())->withInput();
			} else {
				if(!$this->userRepository->authUser($inputs)){
						return Redirect::back()->with('error' , 'Սխալ մուտքային տվյալներ')->withInput();
					} else {
						return Redirect::back();
					}
		}
	}
	}

	public function authAdmin(){
		if(Auth::check() && Auth::user()->role_id == 3){
			return Redirect::to('/admin');
		} else {
			$rules = [
				'email' => 'required|email',
				'password' => 'required|min:6',
			];
			$inputs = Input::all();
			$validator = Validator::make($inputs , $rules);
			if($validator->fails()){
				return Redirect::back()->with('messages' , $validator->messages())->withInput();
			} else {
				if(!$this->userRepository->authAdmin($inputs)){
						return Redirect::back()->with('error' , 'Սխալ մուտքային տվյալներ')->withInput();
					} else {
						return Redirect::to('admin');
					}
		}
	}
	}

	public function authCompany(){
		if(Auth::check() && Auth::user()->role_id == 2){
			return Redirect::to('/company');
		} else {
			$rules = [
				'email' => 'required|email',
				'password' => 'required|min:6',
			];
			$inputs = Input::all();
			$validator = Validator::make($inputs , $rules);
			if($validator->fails()){
				return Redirect::back()->with('messages' , $validator->messages())->withInput();
			} else {
				if(!$this->userRepository->authCompany($inputs)){
						return Redirect::back()->with('error' , 'Սխալ մուտքային տվյալներ')->withInput();
					} else {
						return Redirect::to('company');
					}
		}
	}
	}

	public function adminLoginForm(){
		return View::make('users.loginAdmin');
	}

	public function companyLoginForm(){
		return View::make('users.loginCompany');
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}

	/**
 * Login user with facebook
 *
 * @return void
 */

public function loginWithFacebook() {

    if(Auth::check()){
    	return Redirect::to('/');
    }
    $code = Input::get( 'code' );
    $fb = OAuth::consumer( 'Facebook' );
    if ( !empty( $code ) ) {

        $token = $fb->requestAccessToken( $code );
        $result = json_decode( $fb->request( '/me' ), true );
        $this->userRepository->registerFBUser($result);
        return Redirect::to('/');

    } else {
        $url = $fb->getAuthorizationUri();
         return Redirect::to( (string)$url );
    }

}

/**
 * Login user with google
 *
 * @return void
 */

public function loginWithGoogle() {
	
	if( Auth::check() ) {
		return Redirect::to('/');
	}

    $code = Input::get( 'code' );
    $googleService = OAuth::consumer( 'Google' , 'http://allcoupons.am/google/');
    if ( !empty( $code ) ) {
        $token = $googleService->requestAccessToken( $code );
        $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );
        $this->userRepository->registerGoogleUser( $result );
        return Redirect::to('/');
    } else {

        $url = $googleService->getAuthorizationUri();
        return Redirect::to( (string)$url );
    }
}

public function userProfile(){
	return View::make('users.profile.index');
}

	
}