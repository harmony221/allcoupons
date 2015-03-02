<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddUsingValidDaysFieldIntoCouponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('coupons', function(Blueprint $table)
		{
			$table->integer('using_valid_days')->after('expiration_date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('coupons', function(Blueprint $table)
		{
			$table->dropColumn('using_valid_days');
		});
	}

}
