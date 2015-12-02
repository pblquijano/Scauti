<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRecursosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('recursos', function(Blueprint $table)
		{
			DB::statement('ALTER TABLE `recursos` DROP `tipo`');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('recursos', function(Blueprint $table)
		{
			
		});	
	}

}
