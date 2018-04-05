<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OfficeSuppliesAAPerEmpployee extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('table_a',function($table){
			$table->increments('id');
			$table->integer('code')->default(00000001);
			$table->string('ppcode')->nullable();
			$table->string('item')->nullable();
			$table->string('unit')->nullable();
			$table->double('amount',15,2)->nullable();
			$table->integer('quantity')->nullable();
			$table->string('created_by');
			$table->timestamp('date_added');
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
		Schema::drop('table_a');
	}
}
