<?php

/**
 * Created by PhpStorm.
 * User: hahahehe
 * Date: 8/24/2017
 * Time: 2:07 PM
 */
class PPMPCodeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ppmp_code')->insert(['expense_name' => 'OFFICE SUPPLIES']);
        DB::table('ppmp_code')->insert(['id' => 2, 'expense_name' => 'SEMI-EXPENDABLE EQUIMENT EQUIPMENT AND FURNITURE','oneline' => 0]);
        DB::table('ppmp_code')->insert(['id' => 3, 'expense_name' => 'FUEL, OIL AND LUBRICANTS EXPENSE','oneline' => 1]);
        DB::table('ppmp_code')->insert(['id' => 4, 'expense_name' => 'POSTAGE AND DELIVERY EXPENSE','oneline' => 1]);
        DB::table('ppmp_code')->insert(['id' => 5, 'expense_name' => 'INTERNET SUBSCRIPTION EXPENSE EXPENSE','oneline' => 1]);
        DB::table('ppmp_code')->insert(['id' => 6, 'expense_name' => 'RENT-BUILDING AND STRUCTURE EXPENSE','oneline' => 1]);
        DB::table('ppmp_code')->insert(['id' => 7, 'expense_name' => 'RENT-LAND EXPENSE','oneline' => 1]);
        DB::table('ppmp_code')->insert(['id' => 8, 'expense_name' => 'RENT-EQUIPMENT EXPENSE','oneline' => 1]);
        DB::table('ppmp_code')->insert(['id' => 9, 'expense_name' => 'RENT-MOTOR VEHICLE EXPENSE','oneline' => 0 ]);
        DB::table('ppmp_code')->insert(['id' => 10, 'expense_name' => 'REPRESENTATION EXPENSE','oneline' => 1]);
        DB::table('ppmp_code')->insert(['id' => 11, 'expense_name' => 'TRANSPORTATION AND DELIVERY','oneline' => 1]);
        DB::table('ppmp_code')->insert(['id' => 12, 'expense_name' => 'SUBSCRIPTION EXPENSE','oneline' => 1]);
        DB::table('ppmp_code')->insert(['id' => 13, 'expense_name' => 'OTHER GENERAL SERVICES','oneline' => 0]);
        DB::table('ppmp_code')->insert(['id' => 14, 'expense_name' => 'JANITORIAL SERVICES EXPENSE','oneline' => 1]);
        DB::table('ppmp_code')->insert(['id' => 15, 'expense_name' => 'SECURITY SERVICES EXPENSE','oneline' => 1]);
        DB::table('ppmp_code')->insert(['id' => 16, 'expense_name' => 'REPAIR AND MAINTENANCE-BUILDING', 'oneline' => 0]);
        DB::table('ppmp_code')->insert(['id' => 17, 'expense_name' => 'REPAIR AND MAINTENANCE-FURNITURE AND FIXTURE', 'oneline' => 0]);
        DB::table('ppmp_code')->insert(['id' => 18, 'expense_name' => 'REPAIR AND MAINTENANCE-OTHER MACHINERIES AND EQUIPMENT', 'oneline' => 0]);
        DB::table('ppmp_code')->insert(['id' => 19, 'expense_name' => 'REPAIR AND MAINTENANCE-MOTOR VEHICLE', 'oneline' => 0]);
        DB::table('ppmp_code')->insert(['id' => 20, 'expense_name' => 'DRUGS AND MEDICINES', 'oneline' => 0]);
        DB::table('ppmp_code')->insert(['id' => 21, 'expense_name' => 'MEDICAL, DENTAL AND LABORATORY SUPPLIES', 'oneline' => 0]);
        DB::table('ppmp_code')->insert(['id' => 22, 'expense_name' => 'ADVERTISING EXPENSE','oneline' => 0]);
        DB::table('ppmp_code')->insert(['id' => 23, 'expense_name' => 'PRINTING AND BINDING EXPENSE','oneline' => 0]);
        DB::table('ppmp_code')->insert(['id' => 24, 'expense_name' => 'TRAINING EXPENSE','oneline' => 0]);

        
    }
}