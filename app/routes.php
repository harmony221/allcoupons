<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get( '/' , 'CouponsController@getAllConfirmedCoupons' );
Route::get( '/register' , 'UsersController@registerForm');
Route::get( '/login' , 'UsersController@loginForm');
Route::post( '/login' , 'UsersController@authUser');
Route::get( '/logout' , 'UsersController@logout');
Route::get( '/loginadmin' , 'UsersController@adminLoginForm');
Route::get( '/logincompany' , 'UsersController@companyLoginForm');
Route::post( '/loginadmin' , 'UsersController@authAdmin');
Route::post( '/logincompany' , 'UsersController@authCompany');
Route::get( '/register-company' , 'UsersController@registerCompanyForm');
Route::post( '/register' , 'UsersController@registerUser');
Route::post( '/register-company' , 'UsersController@registerCompany');
Route::post( '/categories' , 'CategoriesController@showCategoriesInSubmenu');
Route::get( '/confirm/{confirmation_code}' , 'UsersController@confirmUser');
Route::get( '/facebook' , 'UsersController@loginWithFacebook');
Route::get( '/google' , 'UsersController@loginWithGoogle');
Route::get( '/sale/{id}' , 'CouponsController@showCoupon');


Route::group(['prefix' => 'admin' , 'before' => 'admin'] , function(){

	Route::get('/' , 'Admin\\HomeController@index');
	Route::post('/dashboard' , 'Admin\\HomeController@dashboard');
	Route::post('/allcompanies' , 'Admin\\UsersController@getAllCompanies');
	Route::post('/pendingcompanies' , 'Admin\\UsersController@getAllPendingCompanies');
	Route::post('/confirmcompany' , 'Admin\\UsersController@confirmCompany');
	Route::post('/pendingcoupons' , 'Admin\\CouponsController@getPendingCoupons');
	Route::post('/activecoupons' , 'Admin\\CouponsController@getActiveCoupons');
	Route::post('/rejectedcoupons' , 'Admin\\CouponsController@getRejectedCoupons');
	Route::post('/rejectcoupon' , 'Admin\\CouponsController@rejectCoupon');
	Route::post('/confirmcoupon' , 'Admin\\CouponsController@confirmCoupon');
	Route::post('/allcities' , 'Admin\\CitiesController@getAllCities');
	Route::post('/createcity' , 'Admin\\CitiesController@createCityForm');
	Route::post('/storecity' , 'Admin\\CitiesController@storeCity');
	Route::post('/deletecity' , 'Admin\\CitiesController@deleteCity');
	Route::post('/updatecity' , 'Admin\\CitiesController@updateCity');
	Route::post('/allcategories' , 'Admin\\CategoriesController@getAllCategories');
	Route::post('/createcategory' , 'Admin\\CategoriesController@createCategoryForm');
	Route::post('/storecategory' , 'Admin\\CategoriesController@storeCategory');
	Route::post('/deletecategory' , 'Admin\\CategoriesController@deleteCategory');
	Route::post('/updatecategory' , 'Admin\\CategoriesController@updateCategory');
	Route::post('/activeorders' , 'Admin\\OrdersController@activeOrders');
	Route::post('/expiredorders' , 'Admin\\OrdersController@expiredOrders');
});

Route::group(['prefix' => 'company' , 'before' => 'company'] , function(){

	Route::get('/' , 'Company\\HomeController@index');
	Route::post('/add-coupon' , 'Company\\CouponsController@createCoupon');
	Route::post('/store-coupon' , 'Company\\CouponsController@storeCoupon');
	Route::post('/activecoupons' , 'Company\\CouponsController@activeCoupons');
	Route::post('/checkorderform' , 'Company\\OrdersController@checkOrderForm');
	Route::post('/checkorder' , 'Company\\OrdersController@checkOrder');
	Route::post('/useorder' , 'Company\\OrdersController@useOrder');
});

Route::group(['prefix' => 'user' , 'before' => 'user'] , function(){

	Route::post('/storeorder' , 'OrdersController@storeOrder');
	Route::get('/' , 'UsersController@userProfile');
	Route::post('/buyedcoupons' , 'OrdersController@buyedCoupons');
	Route::post('/usedcoupons' , 'OrdersController@usedCoupons');
	Route::post('/expiredcoupons' , 'OrdersController@expiredCoupons');
});
