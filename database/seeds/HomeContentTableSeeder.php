<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homeCon = array(
            array(
                'id'       => '1',
                'title'    => 'Event Promotion',
                'caption'  => 'A holding company eith a select portfoli o representing meny of the Group\'s non listed Asian businesses,principally in engineering and constaution and IT services.(100%)Hong Kong,Macauand the united kingdom, and with a large and growin',
                'lang'     => 'en'
            ),
            array(
                'id'       => '1',
                'title'    => 'ព្រឹត្តិការណ៍ផ្សព្វផ្សាយ',
                'caption'  => 'អាជីវកម្មនៅតំបន់អាស៊ីដែលបានរាយ Group បានសំខាន់ក្នុងការវិស្វកម្មនិង constaution និងសេវាកម្ម IT ។ (100%) ហុងកុង, Macauand នគររួបរួមនេះហើយដោយមានទំហំធំនិង growin ជាក្រុមហ៊ុនកាន់ eith មួយ ជ្រើស portfoli o តំណាងឱ្យ meny នៃការមិនអាជីវកម្មអាស៊ីដែលបានរាយ Group បានសំខាន់និងវិស្វកម្ម constaution នៅនិងសេវាកម្ម IT ។ (100%) ហុងកុង, Macauand នគររួបរួមនេះហើយដោយមានទំហំធំនិង growin',
                'lang'     => 'kh'
            ),
            array(
                'id'       => '2',
                'title'    => 'Shopping',
                'caption'  => 'A holding company eith a select portfoli o representing meny of the Group\'s non listed Asian businesses,principally in engineering and constaution and IT services.(100%)Hong Kong,Macauand the united kingdom, and with a large and growin',
                'lang'     => 'en'
            ),
            array(
                'id'       => '2',
                'title'    => 'ហាងលក់ឥវ៉ាន់',
                'caption'  => 'អាជីវកម្មនៅតំបន់អាស៊ីដែលបានរាយ Group បានសំខាន់ក្នុងការវិស្វកម្មនិង constaution និងសេវាកម្ម IT ។ (100%) ហុងកុង, Macauand នគររួបរួមនេះហើយដោយមានទំហំធំនិង growin ជាក្រុមហ៊ុនកាន់ eith មួយ ជ្រើស portfoli o តំណាងឱ្យ meny នៃការមិនអាជីវកម្មអាស៊ីដែលបានរាយ Group បានសំខាន់និងវិស្វកម្ម constaution នៅនិងសេវាកម្ម IT ។ (100%) ហុងកុង, Macauand នគររួបរួមនេះហើយដោយមានទំហំធំនិង growin',
                'lang'     => 'kh'
            ),
            array(
                'id'       => '3',
                'title'    => 'Food',
                'caption'  => 'A holding company eith a select portfoli o representing meny of the Group\'s non listed Asian businesses,principally in engineering and constaution and IT services.(100%)Hong Kong,Macauand the united kingdom, and with a large and growin',
                'lang'     => 'en'
            ),
            array(
                'id'       => '3',
                'title'    => 'អាហារ',
                'caption'  => 'អាជីវកម្មនៅតំបន់អាស៊ីដែលបានរាយ Group បានសំខាន់ក្នុងការវិស្វកម្មនិង constaution និងសេវាកម្ម IT ។ (100%) ហុងកុង, Macauand នគររួបរួមនេះហើយដោយមានទំហំធំនិង growin ជាក្រុមហ៊ុនកាន់ eith មួយ ជ្រើស portfoli o តំណាងឱ្យ meny នៃការមិនអាជីវកម្មអាស៊ីដែលបានរាយ Group បានសំខាន់និងវិស្វកម្ម constaution នៅនិងសេវាកម្ម IT ។ (100%) ហុងកុង, Macauand នគររួបរួមនេះហើយដោយមានទំហំធំនិង growin',
                'lang'     => 'kh'
            ),

        );

        foreach ($homeCon as $row) {
            DB::table('home_contents')->insert([
                'id_table'   => $row['id'],
                'title'      => $row['title'],
                'caption'    => $row['caption'],
                'lang'       => $row['lang'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
