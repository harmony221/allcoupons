<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = [ 'first_name' , 'last_name' , 'password' , 'email' , 'role_id' , 'email_confirmation_code' , 'password_reset_code' , 'confirmed' , 'company_name' , 'city_id' , 'phone' , 'company_adress'];

	public function city(){
		return $this->belongsTo('City');
	}

}
