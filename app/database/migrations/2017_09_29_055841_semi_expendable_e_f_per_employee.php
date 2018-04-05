<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SemiExpendableEFPerEmployee extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('table_f',function($table){
			$table->increments('id');
			$table->integer('code')->default(00000001);
			$table->string('ppcode')->nullable();
			$table->string('item')->nullable();
			$table->string('unit')->nullable();
			$table->double('amount',15,2)->nullable();
			$table->integer('quantity')->nullable();
			$table->timestamp('date_added');
			$table->string('created_by');
			$table->unique(array('item','ppcode','created_by'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('table_f');
	}
}
