<?php
class CategoryRepository
{
	public function __construct(Category $category) {
		$this->category = $category;
	}

	public function getAllCategories(){
		return $this->category->all();
	}

	public function getAllCategoriesList(){
		return $this->category->all()->lists('name' , 'id');
	}
}