<?php namespace Admin;
use City;
class CityRepository
{
	public function __construct(City $city){
		$this->city = $city;
	}

	public function getAllCities(){
		return $this->city->orderBy('name' , 'ASC')->get();
	}

	public function storeCity($inputs){
		return $this->city->create($inputs);
	}

	public function deleteCity($id){
		return $this->city->find($id)->delete();
	}

	public function updateCity($id , $inputs){
		return $this->city->find($id)->update(['name' => $inputs['name']]);
	}
}