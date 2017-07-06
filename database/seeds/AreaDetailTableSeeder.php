<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areaDetails = array(
            array(
                'id_table'    => '1',
                'detail'      => 'with spacious and good location,(ground Floor), (Ground Floor, First Floor). The space will be ideal for events and promotion activities.Lucky mall would like to inform you information of space for rent.',
                'lang'        => 'en'
            ),
            array(
                'id_table'    => '1',
                'detail'      => 'ដែលមានទីតាំងធំទូលាយនិងល្អ (ជាន់ផ្ទាល់ដី), (ដីជាន់, ជាន់ទីលើកទីមួយ) ។ អវកាសនេះនឹងត្រូវបានល្អសម្រាប់ព្រឹត្តិការណ៍និងការផ្សព្វផ្សាយផ្សារ activities.Lucky សូមជម្រាបជូនពនៃទំហំដែលអ្នកបានសម្រាប់ជួល។',
                'lang'        => 'kh'
            ),
        );

        foreach ($areaDetails as $row){
            DB::table('area_details')->insert([
                'id_table'  =>  $row['id_table'],
                'detail'    =>  $row['detail'],
                'lang'      =>  $row['lang'],
                'created_at'=>  Carbon::now(),
                'updated_at'=>  Carbon::now()
            ]);
        }
    }
}
