<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username', 140)->unique();
			$table->text('password');
			$table->string('nombres', 140);
			$table->string('apellido_p', 140);
			$table->string('apellido_m', 140);
			$table->string('email', 140);
			$table->string('celular', 140);
			$table->smallInteger('sexo');
			$table->smallInteger('tipo');	
			$table->smallInteger('activo');
			$table->text('img');
			$table->text('remember_token');						
			$table->timestamps();
		});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
