<?php

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section')->insert([ 'id' => '1', 'division' => '3','short' => 'RD', 'description' => 'Regional Director', 'head' => '271', 'code' => 'A' ]);
        DB::table('section')->insert([ 'id' => '2', 'division' => '3','short' => 'ARD', 'description' => 'Asst. Regional Director', 'head' => '64', 'code' => 'A' ]);
        DB::table('section')->insert([ 'id' => '3', 'division' => '7','short' => 'HES', 'description' => 'Hospital Engineering Section', 'head' => '173', 'code' => 'E' ]);
        DB::table('section')->insert([ 'id' => '4', 'division' => '7','short' => 'BMES', 'description' => 'Bio Medical Engineering Section', 'head' => '172', 'code' => 'E' ]);
        DB::table('section')->insert([ 'id' => '5', 'division' => '6','short' => 'Accounting', 'description' => 'Accounting Section', 'head' => '55', 'code' => 'D' ]);
        DB::table('section')->insert([ 'id' => '6', 'division' => '6','short' => 'Budget', 'description' => 'Budget Section', 'head' => '56', 'code' => 'D' ]);
        DB::table('section')->insert([ 'id' => '7', 'division' => '6','short' => 'Cashier', 'description' => 'Cashiering Section', 'head' => '44', 'code' => 'D' ]);
        DB::table('section')->insert([ 'id' => '9', 'division' => '6','short' => 'Personel', 'description' => 'Personnel Section', 'head' => '27', 'code' => 'D' ]);
        DB::table('section')->insert([ 'id' => '10', 'division' => '6','short' => 'Gen. Services', 'description' => 'General Services Section', 'head' => '26', 'code' => 'D' ]);
        DB::table('section')->insert([ 'id' => '11', 'division' => '6','short' => 'Records', 'description' => 'Records Section / ICTU', 'head' => '24', 'code' => 'D' ]);
        DB::table('section')->insert([ 'id' => '12', 'division' => '6','short' => 'Supply', 'description' => 'Supply Section', 'head' => '2', 'code' => 'D' ]);
        DB::table('section')->insert([ 'id' => '13', 'division' => '6','short' => 'Legal', 'description' => 'Legal Section', 'head' => '89', 'code' => 'D' ]);
        DB::table('section')->insert([ 'id' => '14', 'division' => '6','short' => 'Transport', 'description' => 'Transport Section', 'head' => '174', 'code' => 'D' ]);
        DB::table('section')->insert([ 'id' => '15', 'division' => '5','short' => 'Licensing', 'description' => 'Hospital Licensing Section', 'head' => '74', 'code' => 'C' ]);
        DB::table('section')->insert([ 'id' => '16', 'division' => '5','short' => 'FDA', 'description' => 'FDA Section', 'head' => '94', 'code' => 'C' ]);
        DB::table('section')->insert([ 'id' => '17', 'division' => '4','short' => 'HPITHWP&SS', 'description' => 'Health Promotion In The Work Places & School Section', 'head' => '69', 'code' => 'B3' ]);
        DB::table('section')->insert([ 'id' => '18', 'division' => '4','short' => 'HPITCS', 'description' => 'Health Promotion In The Community Section', 'head' => '66', 'code' => 'B2' ]);
        DB::table('section')->insert([ 'id' => '21', 'division' => '4','short' => 'HSDS', 'description' => 'Health System Development Section', 'head' => '275', 'code' => 'B9' ]);
        DB::table('section')->insert([ 'id' => '22', 'division' => '4','short' => 'HFDS', 'description' => 'Health Facility Development SECTION', 'head' => '70', 'code' => 'B4' ]);
        DB::table('section')->insert([ 'id' => '23', 'division' => '4','short' => 'HPPR&HI', 'description' => 'Health Policy Planning, Research & Health Info', 'head' => '75', 'code' => 'B5' ]);
        DB::table('section')->insert([ 'id' => '24', 'division' => '4','short' => 'PDO CEBU', 'description' => 'Provincial Health Team for Cebu Province', 'head' => '113', 'code' => 'B7' ]);
        DB::table('section')->insert([ 'id' => '25', 'division' => '4','short' => 'PDO BOHOL', 'description' => 'Provincial Health Team for Bohol Province', 'head' => '6', 'code' => 'B8' ]);
        DB::table('section')->insert([ 'id' => '26', 'division' => '4','short' => 'PDO NEGROS ORIENTAL', 'description' => 'Provincial Health Team for Negros-Siquijor Province', 'head' => '114', 'code' => 'B10' ]);
        DB::table('section')->insert([ 'id' => '27', 'division' => '4','short' => 'FHS', 'description' => 'Family Health Section', 'head' => '88948', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '28', 'division' => '4','short' => 'NON-COM', 'description' => 'Non-Communicable Disease Section', 'head' => '88948', 'code' => 'B6' ]);
        DB::table('section')->insert([ 'id' => '29', 'division' => '4','short' => 'COM', 'description' => 'Communicable Disease Section', 'head' => '105', 'code' => 'B1' ]);
        DB::table('section')->insert([ 'id' => '30', 'division' => '4','short' => 'HRDIPS', 'description' => 'Health Research and Developement, Information and Education and Promotion Section', 'head' => '88934', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '31', 'division' => '4','short' => 'HHRDU', 'description' => 'Health Human Resource Development Unit', 'head' => '88968', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '32', 'division' => '4','short' => 'HSDS', 'description' => 'Health System Development Section', 'head' => '88959', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '33', 'division' => '5','short' => 'HLS', 'description' => 'Hospital Licensing Section', 'head' => '88911', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '34', 'division' => '3','short' => 'Legal', 'description' => 'Legal Section', 'head' => '88960', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '35', 'division' => '3','short' => 'RD/ARD', 'description' => 'RD/ARD', 'head' => '0', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '36', 'division' => '3','short' => 'HMS', 'description' => 'Hospital Maintenance Service', 'head' => '269', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '37', 'division' => '6','short' => 'Planning', 'description' => 'PLANNING', 'head' => '0', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '38', 'division' => '6','short' => 'MSD Chief', 'description' => 'MSD Chief', 'head' => '0', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '39', 'division' => '4','short' => 'LSHD Chief', 'description' => 'LHSD Chief', 'head' => '0', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '40', 'division' => '3','short' => 'HEMS', 'description' => 'Health Emergency Management Section', 'head' => '71', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '41', 'division' => '6','short' => 'ICTU', 'description' => 'Information and Communication Unit', 'head' => '19', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '42', 'division' => '6','short' => 'Library', 'description' => 'Library', 'head' => '88962', 'code' => '' ]);
        DB::table('section')->insert([ 'id' => '43', 'division' => '6','short' => 'PU', 'description' => 'Procurement Section', 'head' => '26', 'code' => 'D' ]);
        DB::table('section')->insert([ 'id' => '44', 'division' => '3','short' => 'RESU', 'description' => 'Regional Epidemiological and Surveillance Unit', 'head' => '26', 'code' => 'D' ]);
        DB::table('section')->insert([ 'id' => '45', 'division' => '4','short' => 'PDO SIQUIJOR', 'description' => 'Provincial Health Team for Negros-Siquijor Province', 'head' => '114', 'code' => 'B10' ]);
        
        
    }
}
