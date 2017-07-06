<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class HomeDescriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homeDes = array(
            array(
                'id_table'    => '1',
                'des'         => 'A holding company eith a select portfoli o representing meny of the Group\'s non listed Asian businesses,principally in engineering and constaution and IT services.(100%)Hong Kong,Macauand the united kingdom, and with a large and growin A holding company eith a select portfoli o representing meny of the Group\'s non listed Asian businesses,principally in engineering and constaution and IT services.(100%)Hong Kong,Macauand the united kingdom, and with a large and growin .',
                'lang'        => 'en',
            ),

            array(
                'id_table'    => '1',
                'des'         => 'ក្រុមហ៊ុនកាន់ eith ជ្រើស portfoli o តំណាងឱ្យ meny នៃការមិនអាជីវកម្មនៅតំបន់អាស៊ីដែលបានរាយ Group បានសំខាន់ក្នុងការវិស្វកម្មនិង constaution និងសេវាកម្ម IT ។ (100%) ហុងកុង, Macauand នគររួបរួមនេះហើយដោយមានទំហំធំនិង growin ជាក្រុមហ៊ុនកាន់ eith មួយ ជ្រើស portfoli o តំណាងឱ្យ meny នៃការមិនអាជីវកម្មអាស៊ីដែលបានរាយ Group បានសំខាន់និងវិស្វកម្ម constaution នៅនិងសេវាកម្ម IT ។ (100%) ហុងកុង, Macauand នគររួបរួមនេះហើយដោយមានទំហំធំនិង growin ។',
                'lang'        => 'kh',
            ),
        );

        foreach ($homeDes as $key => $row){
            DB::table('home_descriptions')->insert([
                'id_table'    => $row['id_table'],
                'description' => $row['des'],
                'lang'        => $row['lang'],
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ]);
        }
    }
}
