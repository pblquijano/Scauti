<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecursosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recursos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre', 140);
			$table->text('descripcion');
			$table->string('URL', 140);
			$table->smallInteger('activo');
			$table->smallInteger('tipo');
			$table->integer('id_curso');
			$table->integer('id_user');
			$table->integer('vistas');
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
		Schema::drop('recursos');
	}

}
