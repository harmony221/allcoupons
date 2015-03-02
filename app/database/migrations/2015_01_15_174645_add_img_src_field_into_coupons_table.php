<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddImgSrcFieldIntoCouponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('coupons', function(Blueprint $table)
		{
			$table->string('img_src')->after('expiration_date');
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
			$table->dropColumn('img_src');
		});
	}

}
