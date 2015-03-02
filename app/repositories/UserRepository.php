<?php
class UserRepository
{
	public function __construct(User $user) {
		$this->user = $user;
	}

	public function registerUser( $inputs ){
		return $this->user->create($inputs);
	}

	public function confirmUser($confirmation_code) {
		if(null != $user =$this->user->where('email_confirmation_code' , $confirmation_code)->first()) {
			$user->confirmed = true;
			$user->email_confirmation_code = null;
			$user->save();
			Auth::login($user);
			return true;
		} else {
			return false;
		}
	}

	public function authUser($inputs) {
		if(null != $user = $this->user->where('email' , $inputs['email'])->first()){
			if($user->role_id != 1) {
				return false;
			} else {
				if(Auth::attempt(['email' => $inputs['email'] , 'password' => $inputs['password']])) {
					return true;
				} else {
					return true;
				}
			}
		}
	}

	public function authAdmin($inputs) {
		if(null != $user = $this->user->where('email' , $inputs['email'])->first()){
			if($user->role_id != 3) {
				return false;
			} else {
				if(Auth::attempt(['email' => $inputs['email'] , 'password' => $inputs['password']])) {
					return true;
				} else {
					return true;
				}
			}
		}
	}

	public function authCompany($inputs) {
		if(null != $user = $this->user->where('email' , $inputs['email'])->first()){
			if($user->role_id != 2) {
				return false;
			} else {
				if(Auth::attempt(['email' => $inputs['email'] , 'password' => $inputs['password']])) {
					return true;
				} else {
					return true;
				}
			}
		}
	}

	public function registerFBUser($result){
			if(null != $user = $this->user->where('fb_id' , $result['id'])->first()){
				if($user->role_id == '1'){
					return Auth::login($user);
				} else return Redirect::to('/');
				
			} elseif(isset($result['email'])){
				if(null != $user = $this->user->where('email' , $result['email'])->first()){
					if($user->role_id == '1'){
						$user->fb_id = $result['id'];
						return Auth::login($user);
					} else return Redirect::to('/');
				} else{
					$this->user->role_id = '1';
					$this->user->email = $result['email'];
					$this->user->first_name = $result['first_name'];
					$this->user->last_name = $result['last_name'];
					$this->user->fb_id = $result['id'];
					$this->user->save();
					$user = $this->user->where('fb_id' , $result['id'])->first();
					return Auth::login($user);
				}
			} else {
					$this->user->role_id = '1';
					$this->user->first_name = $result['first_name'];
					$this->user->last_name = $result['last_name'];
					$this->user->avatar = $avatar_name;
					$this->user->fb_id = $result['id'];
					$this->user->save();
					$user = $this->user->where('fb_id' , $result['id'])->first();
					return Auth::login($user);

			}
			
			
		}

		public function registerGoogleUser($result){
			if(null != $user = $this->user->where('google_id' , $result['id'])->first()){
				if($user->role_id == '1'){
					return Auth::login($user);
				} else return Redirect::to('/');
			} elseif(isset($result['email'])){
				if(null != $user = $this->user->where('email' , $result['email'])->first()){
					if($user->role_id == '1'){
						$user->google_id = $result['id'];
					return Auth::login($user);
					} else return Redirect::to('/');
				} else{
					$this->user->role_id = '1';
					$this->user->email = $result['email'];
					$this->user->first_name = $result['given_name'];
					$this->user->last_name = $result['family_name'];
					$this->user->google_id = $result['id'];
					$this->user->save();
					$user = $this->user->where('google_id' , $result['id'])->first();
					return Auth::login($user);
				}
			} else {
					$this->user->role_id = '1';
					$this->user->first_name = $result['given_name'];
					$this->user->last_name = $result['family_name'];
					$this->user->google_id = $result['id'];
					$this->user->save();
					$user = $this->user->where('google_id' , $result['id'])->first();
					return Auth::login($user);

			}
			
			
		}
	

	
}