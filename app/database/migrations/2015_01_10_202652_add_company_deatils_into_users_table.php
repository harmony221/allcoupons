<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCompanyDeatilsIntoUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('company_name');
			$table->integer('city_id');
			$table->string('company_adress');
			$table->integer('phone');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('company_name');
			$table->dropColumn('city_id');
			$table->dropColumn('company_adress');
			$table->dropColumn('phone');
			
		});
	}

}
