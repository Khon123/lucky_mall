<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = array(
            array(
                'name' => 'Home',
                'alias' => 'home',
                'id_table' => '1',
                'lang' => 'en',
            ),
            array(
                'name' => 'ទំព័រដើម',
                'alias' => 'home',
                'id_table' => '1',
                'lang' => 'kh',
            ),
            array(
                'name' => 'Store Directory',
                'alias' => 'store-directory',
                'id_table' => '2',
                'lang' => 'en',
            ),
            array(
                'name' => 'ពត៏មានហាង',
                'alias' => 'store-directory',
                'id_table' => '2',
                'lang' => 'kh',
            ),
            array(
                'name' => 'Event & Promotion',
                'alias' => 'event-promotion',
                'id_table' => '3',
                'lang' => 'en',
            ),
            array(
                'name' => 'ព្រឹត្តិការណ៏ និង កម្មវិធីពិសេស',
                'alias' => 'event-promotion',
                'id_table' => '3',
                'lang' => 'kh',
            ),
            array(
                'name' => 'Common Area Information',
                'alias' => 'common-area-information',
                'id_table' => '4',
                'lang' => 'en',
            ),
            array(
                'name' => 'កន្លែងសំរាប់ជួល',
                'alias' => 'common-area-information',
                'id_table' => '4',
                'lang' => 'kh',
            ),
            array(
                'name' => 'Career',
                'alias' => 'career',
                'id_table' => '5',
                'lang' => 'en',
            ),
            array(
                'name' => 'ឱកាសការងារ',
                'alias' => 'career',
                'id_table' => '5',
                'lang' => 'kh',
            ),
            array(
                'name' => 'About Us',
                'alias' => 'about-us',
                'id_table' => '6',
                'lang' => 'en',
            ),
            array(
                'name' => 'អំពីយើងខ្ញុំ',
                'alias' => 'about-us',
                'id_table' => '6',
                'lang' => 'kh',
            ),
            array(
                'name' => 'Contact Us',
                'alias' => 'contact-us',
                'id_table' => '7',
                'lang' => 'en',
            ),
            array(
                'name' => 'ទំនាក់ទំនង',
                'alias' => 'contact-us',
                'id_table' => '7',
                'lang' => 'kh',
            )
        );

        foreach ($menus as $row){
            DB::table('menus')->insert([
               'id_table'   =>  $row['id_table'],
                'name'      =>  $row['name'],
                'alias'     =>  $row['alias'],
                'lang'      =>  $row['lang'],
                'created_at'=>  Carbon::now(),
                'updated_at'=>  Carbon::now()
            ]);
        }
    }
}
