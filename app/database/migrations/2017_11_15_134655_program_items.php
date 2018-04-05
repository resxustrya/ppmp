<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProgramItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('program_items',function($table){
			
			$table->string('venue_id');
			$table->string('program_id');
			$table->string('code');
			$table->string('ppcode')->nullable();
			$table->string('item')->nullable();
			$table->string('unit')->nullable();
			$table->double('amount',15,2)->nullable();
			$table->integer('quantity')->nullable();
			$table->timestamp('date_added');
			$table->string('created_by');
			$table->string('added_by');
			$table->string('division');
			$table->primary(array('item','created_by','venue_id','program_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('program_items');
	}

}
