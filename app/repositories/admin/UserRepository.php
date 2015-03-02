<?php namespace Admin;
use User;
class UserRepository
{
	public function __construct(User $user){
		$this->user = $user;
	}

	public function getAllCompanies(){
		return $this->user->where('role_id' , 2)->where('confirmed' , 1)->orderBy('company_name' , 'ASC')->get();
	}

	public function getAllPendingCompanies(){
		return $this->user->where('role_id' , 2)->where('confirmed' , 0)->get();
	}

	public function confirmCompany($id){
		return $this->user->find($id)->update(['confirmed' => 1]);
	}
}