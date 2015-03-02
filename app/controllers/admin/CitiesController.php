<?php namespace Admin;
use View, CategoryRepository, Request, Input, Validator, Redirect, Response;

class CitiesController extends \BaseController {

public function __construct(CityRepository $cityRepository) {
	$this->cityRepository = $cityRepository;
}

public function getAllCities(){
	return View::make('admin.cities.index' , ['cities' => $this->cityRepository->getAllCities()]);
}

public function createCityForm(){
	return View::make('admin.cities.create');
}

public function storeCity(){
	$inputs = Input::all();
	return $this->cityRepository->storeCity($inputs);
}

public function deleteCity(){
	$inputs = Input::all();
	$id = $inputs['id'];
	if($this->cityRepository->deleteCity($id)){
		return 'true';
	}
}

public function updateCity(){
	$inputs = Input::all();
	$id = $inputs['id'];
	if($this->cityRepository->updateCity($id , $inputs)){
		return 'true';
	}
}



}