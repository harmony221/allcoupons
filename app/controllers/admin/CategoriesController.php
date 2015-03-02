<?php namespace Admin;
use View, Request, Input, Validator, Redirect, Response;

class CategoriesController extends \BaseController {

public function __construct(CategoryRepository $categoryRepository) {
	$this->categoryRepository = $categoryRepository;
}

public function getAllCategories(){
	return View::make('admin.categories.index' , ['categories' => $this->categoryRepository->getAllCategories()]);
}

public function createCategoryForm(){
	return View::make('admin.categories.create');
}

public function storeCategory(){
	$inputs = Input::all();
	return $this->categoryRepository->storeCategory($inputs);
}

public function deleteCategory(){
	$inputs = Input::all();
	$id = $inputs['id'];
	if($this->categoryRepository->deleteCategory($id)){
		return 'true';
	}
}

public function updateCategory(){
	$inputs = Input::all();
	$id = $inputs['id'];
	if($this->categoryRepository->updateCategory($id , $inputs)){
		return 'true';
	}
}



}