<?php

/**
 * Created by PhpStorm.
 * User: hahahehe
 * Date: 8/9/2017
 * Time: 9:30 AM
 */
class UnitsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('unit')->insert(['id' => 1, 'unitcode' => 'PC' , 'unit' => 'PIECE']);
        DB::table('unit')->insert(['id' => 2, 'unitcode' => 'UNIT' , 'unit' => 'UNIT']);
        DB::table('unit')->insert(['id' => 3, 'unitcode' => 'RL' , 'unit' => 'ROLE']);
        DB::table('unit')->insert(['id' => 4, 'unitcode' => 'GL' , 'unit' => 'GALLON']);
        DB::table('unit')->insert(['id' => 5, 'unitcode' => 'PACK' , 'unit' => 'PACK']);
        DB::table('unit')->insert(['id' => 6, 'unitcode' => 'SACK' , 'unit' => 'SACK']);
        DB::table('unit')->insert(['id' => 7, 'unitcode' => 'BOX' , 'unit' => 'BOX']);
        DB::table('unit')->insert(['id' => 8, 'unitcode' => 'LTRS' , 'unit' => 'LITERS']);
        DB::table('unit')->insert(['id' => 9, 'unitcode' => 'SHEET' , 'unit' => 'SHEET']);
        DB::table('unit')->insert(['id' => 10, 'unitcode' => 'CTN' , 'unit' => 'CARTOON']);
        DB::table('unit')->insert(['id' => 11, 'unitcode' => 'KG' , 'unit' => 'KILOGRAM']);
        DB::table('unit')->insert(['id' => 12, 'unitcode' => 'PR' , 'unit' => 'PAIRS']);
        DB::table('unit')->insert(['id' => 13, 'unitcode' => 'SET' , 'unit' => 'SET']);
        DB::table('unit')->insert(['id' => 14, 'unitcode' => 'CAN' , 'unit' => 'CAN']);
        DB::table('unit')->insert(['id' => 15, 'unitcode' => 'm' , 'unit' => 'METERS']);
        DB::table('unit')->insert(['id' => 16, 'unitcode' => 'g' , 'unit' => 'GRAMS']);
        DB::table('unit')->insert(['id' => 17, 'unitcode' => 'ML' , 'unit' => 'MELIMETER']);
        DB::table('unit')->insert(['id' => 18, 'unitcode' => 'BAG' , 'unit' => 'BAG']);
    }
}