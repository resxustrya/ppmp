<?php

/**
 * Created by PhpStorm.
 * User: hahahehe
 * Date: 9/13/2017
 * Time: 10:21 AM
 */
class DivisionTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('division')->insert([ 'id' => '3', 'description' => 'RD / ARD Office', 'head' => 155 ]);
        DB::table('division')->insert([ 'id' => '4', 'description' => 'LHSD - Local Health Support Division', 'head' => 72 ]);
        DB::table('division')->insert([ 'id' => '5', 'description' => 'RLED - Licensing Regulations & Enforcement Divsion', 'head' => 255 ]);
        DB::table('division')->insert([ 'id' => '6', 'description' => 'MSD - Management Support Division', 'head' => 36 ]);

    }
}