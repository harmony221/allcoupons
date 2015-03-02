<?php

class CategoriesController extends \BaseController {

	public function __construct(CategoryRepository $categoryRepository)
	{
		$this->categoryRepository = $categoryRepository;
	}

	public function showCategoriesInSubmenu(){
		if ( Request::ajax() ) {
			$categories = $this->categoryRepository->getAllCategories();
			return Response::json($categories);
		}
	}

}