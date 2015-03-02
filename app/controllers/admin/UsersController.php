<?php namespace Admin;
use View,Input;

class UsersController extends \BaseController {

public function __construct(UserRepository $userRepository) {
	$this->userRepository = $userRepository;
}

public function getAllCompanies(){
	return View::make('admin.companies.index' , ['companies' => $this->userRepository->getAllCompanies()]);
}

public function getAllPendingCompanies(){
	return View::make('admin.companies.pending' , ['companies' => $this->userRepository->getAllPendingCompanies()]);
}

public function confirmCompany(){
	$inputs = Input::all();
	$id = $inputs['id'];
	if($this->userRepository->confirmCompany($id)){
		return 'true';
	}
}


}