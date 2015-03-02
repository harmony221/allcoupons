<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('price');
			$table->string('name');
			$table->text('discription');
			$table->integer('user_id');
			$table->integer('category_id');
			$table->string('service_address');
			$table->integer('sale_percent');
			$table->date('expiration_date');
			$table->integer('confirmed')->default(0);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coupons');
	}

}
