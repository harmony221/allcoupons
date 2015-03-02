<?php namespace Admin;
use Category;
class CategoryRepository
{
	public function __construct(Category $category){
		$this->category = $category;
	}

	public function getAllCategories(){
		return $this->category->orderBy('name' , 'ASC')->get();
	}

	public function storeCategory($inputs){
		return $this->category->create($inputs);
	}

	public function deleteCategory($id){
		return $this->category->find($id)->delete();
	}

	public function updateCategory($id , $inputs){
		return $this->category->find($id)->update(['name' => $inputs['name']]);
	}
}