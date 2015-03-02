<?php
class CityRepository
{
	public function __construct(City $city) {
		$this->city = $city;
	}

	public function getAllCitiesInList(){
		return $this->city->all()->lists('name' , 'id');
	}
}