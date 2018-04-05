<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		DB::table('code')->insert(['code' => '100000001']);
		$this->call('SectionSeeder');
		$this->call('ItemsTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('PPMPCodeTableSeeder');
		$this->call('UnitsTableSeeder');
		$this->call('DivisionTableSeeder');
		$this->call('VenuesTableSeeder');
	}
}