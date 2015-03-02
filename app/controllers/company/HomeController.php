<?php namespace Company;
use View;

class HomeController extends \BaseController {

public function index(){
	return View::make('company.index');
}

}