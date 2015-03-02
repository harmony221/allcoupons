<?php namespace Admin;
use View;

class HomeController extends \BaseController {

public function __construct(UserRepository $userRepository){
	$this->userRepository = $userRepository;

}

public function index(){
	return View::make('admin.index');
}

public function dashboard(){
	return View::make('admin.dashboard' , [
		'acitveCompanies'  => $this->userRepository->getAllCompanies(),
		'pendingCompanies' => $this->userRepository->getAllPendingCompanies(),
		]);
}

}