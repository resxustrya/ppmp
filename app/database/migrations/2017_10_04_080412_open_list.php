<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OpenList extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('open_list',function($table){
			//$table->increments('id');
			$table->string('code');
			$table->string("ppcode")->nullable();
			$table->string('item')->nullable();
			$table->string('unit')->nullable();
			$table->integer('quantity')->nullable();
			$table->double('amount',15,2)->nullable();
			$table->string('created_by');
			$table->date('date_added');
			$table->string('all')->default('0');
			$table->string('added_by');
			$table->string('division');
			$table->primary(array('item','created_by','ppcode'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('open_list');
	}

}
