<?php
    class VenuesTableSeeder extends Seeder {
        public function run()
        {
            DB::table('training_venue')->insert(['venue' => 'Regionwide','order' => 'F']);
            DB::table('training_venue')->insert(['venue' => 'Bohol Province','order' => 'B']);
            DB::table('training_venue')->insert(['venue' => 'Cebu Province','order' => 'A']);
            DB::table('training_venue')->insert(['venue' => 'Negros Oriental Province','order' => 'C']);
            DB::table('training_venue')->insert(['venue' => 'Siquijor Province','order' => 'D']);
            DB::table('training_venue')->insert(['venue' => 'Tri-Cities','order' => 'E']);
            DB::table('training_venue')->insert(['venue' => 'Others','order' => 'H']);
            DB::table('training_venue')->insert(['venue' => 'Regional','order' => 'G']);
        }
    }
?>