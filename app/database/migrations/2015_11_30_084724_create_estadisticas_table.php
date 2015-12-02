<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadisticasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estadisticas', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->text('observaciones');
			$table->double('creatividad', 50);			
			$table->double('conocimiento', 50);s			
			$table->double('equipo', 50);
			$table->double('desempeño', 50);
			$table->integer('user_id');
			$table->integer('mes');
			$table->integer('año');
			$table->timestamps();
		});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estadisticas');	}

}
